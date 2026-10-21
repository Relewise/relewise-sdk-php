<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\TestCase;

class OAuthCacheProcessTest extends TestCase
{
    public function testConcurrentColdProcessesShareOneAcquisitionAndOriginalExpiry(): void
    {
        if (!function_exists('proc_open')) { self::markTestSkipped('proc_open is needed for the cache coordination fixture.'); }
        $directory = sys_get_temp_dir() . '/relewise-oauth-' . bin2hex(random_bytes(8));
        mkdir($directory);
        $workers = [];
        try
        {
            for ($i = 0; $i < 3; $i++)
            {
                $process = proc_open([PHP_BINARY, __DIR__ . '/../fixtures/oauth-cache-worker.php', $directory],
                    [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
                self::assertIsResource($process);
                stream_set_timeout($pipes[1], 10);
                $workers[] = [$process, $pipes];
            }
            foreach ($workers as [$process, $pipes])
            {
                fwrite($pipes[0], "start\n");
                fflush($pipes[0]);
            }
            $results = [];
            foreach ($workers as [$process, $pipes])
            {
                $line = fgets($pipes[1]);
                self::assertNotFalse($line, 'Worker must return a token.');
                $results[] = json_decode($line, true, flags: JSON_THROW_ON_ERROR);
            }
            self::assertSame('shared-token', $results[0][0]);
            self::assertSame($results[0], $results[1]);
            self::assertSame($results[0], $results[2]);
            self::assertSame("acquired\n", file_get_contents($directory . '/acquisitions'));
        }
        finally
        {
            foreach ($workers as [$process, $pipes])
            {
                foreach ($pipes as $pipe) { fclose($pipe); }
                proc_terminate($process);
                proc_close($process);
            }
            foreach (glob($directory . '/*') as $path) { unlink($path); }
            rmdir($directory);
        }
    }
}
