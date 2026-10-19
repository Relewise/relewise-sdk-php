"""Offline tests for bounded package readiness and exact-version verification."""
import importlib.util
import subprocess
import unittest
from unittest.mock import patch, Mock
from pathlib import Path

spec = importlib.util.spec_from_file_location("restore_generator", Path(__file__).with_name("restore-generator.py"))
module = importlib.util.module_from_spec(spec)
spec.loader.exec_module(module)


class RestoreTests(unittest.TestCase):
    def setUp(self):
        self.now = 0
        self.clock = patch.object(module.time, "monotonic", side_effect=lambda: self.now)
        self.sleep = patch.object(module.time, "sleep", side_effect=self.advance)
        self.run = patch.object(module.subprocess, "run")
        self.assets = patch.object(module.Path, "read_text", return_value='{"libraries":{"Relewise.Client/1.320.0":{}}}')
        for item in (self.clock, self.sleep, self.run, self.assets):
            item.start()
            self.addCleanup(item.stop)

    def advance(self, seconds):
        self.now += seconds

    def test_exact_restore_succeeds(self):
        module.subprocess.run.return_value = Mock(returncode=0)
        module.restore("1.320.0", 3600)
        args, kwargs = module.subprocess.run.call_args
        self.assertIn('-p:RelewiseClientVersion=[1.320.0]', args[0])
        self.assertIn('--no-http-cache', args[0])
        self.assertEqual(kwargs['timeout'], 120)
        module.time.sleep.assert_not_called()

    def test_retries_then_succeeds(self):
        module.subprocess.run.side_effect = [Mock(returncode=1), Mock(returncode=0)]
        module.restore("1.320.0", 3600)
        self.assertEqual(module.subprocess.run.call_count, 2)
        self.assertEqual(self.now, 30)

    def test_deadline_stops_polling(self):
        module.subprocess.run.return_value = Mock(returncode=1)
        with self.assertRaises(TimeoutError):
            module.restore("1.320.0", 35)
        self.assertEqual(self.now, 35)
        self.assertEqual(module.subprocess.run.call_args.kwargs['timeout'], 5)
        self.assertEqual(module.subprocess.run.call_count, 2)

    def test_hanging_attempt_is_bounded(self):
        def hang(command, timeout, check):
            self.advance(timeout)
            raise subprocess.TimeoutExpired(command, timeout)
        module.subprocess.run.side_effect = hang
        with self.assertRaises(TimeoutError):
            module.restore("1.320.0", 35)
        self.assertEqual(self.now, 35)
        self.assertEqual(module.subprocess.run.call_count, 1)

    def test_version_mismatch_fails_without_retry(self):
        module.subprocess.run.return_value = Mock(returncode=0)
        module.Path.read_text.return_value = '{"libraries":{"Relewise.Client/1.308.0":{}}}'
        with self.assertRaisesRegex(RuntimeError, 'Refusing generation'):
            module.restore("1.320.0", 3600)
        self.assertEqual(module.subprocess.run.call_count, 1)

    def test_missing_package_fails(self):
        module.subprocess.run.return_value = Mock(returncode=0)
        module.Path.read_text.return_value = '{"libraries":{}}'
        with self.assertRaisesRegex(RuntimeError, 'Refusing generation'):
            module.restore("1.320.0")

    def test_generation_restore_does_not_retry(self):
        module.subprocess.run.return_value = Mock(returncode=1)
        with self.assertRaises(RuntimeError):
            module.restore("1.320.0")
        module.time.sleep.assert_not_called()

    def test_invalid_version_and_unbounded_wait_rejected(self):
        for version, wait in [('*', 3600), ('', 3600), ('1.320.0;Other=evil', 3600), ('1.320.0', 3601)]:
            with self.assertRaises(ValueError):
                module.restore(version, wait)
        module.subprocess.run.assert_not_called()


if __name__ == '__main__':
    unittest.main()
