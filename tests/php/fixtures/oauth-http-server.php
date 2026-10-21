<?php declare(strict_types=1);

// Loopback HTTP transport fixture. All credentials in these tests are dummy values.
$mode = $argv[1] ?? 'headers';
$server = stream_socket_server('tcp://127.0.0.1:0', $code, $message);
if ($server === false) { throw new RuntimeException($message, $code); }
$target = $mode === 'redirect' ? stream_socket_server('tcp://127.0.0.1:0') : null;
echo stream_socket_get_name($server, false), PHP_EOL;
flush();
for ($request = 0; $request < ($mode === 'delay' ? 1 : 2); $request++)
{
    $connection = stream_socket_accept($server, 10);
    if ($connection === false) { throw new RuntimeException('No fixture connection'); }
    stream_set_timeout($connection, 5);
    $length = 0;
    while (($line = fgets($connection)) !== false && trim($line) !== '')
    {
        if (stripos($line, 'Content-Length:') === 0) { $length = (int) trim(substr($line, 15)); }
    }
    while ($length > 0)
    {
        $chunk = fread($connection, $length);
        if ($chunk === false || $chunk === '') { break; }
        $length -= strlen($chunk);
    }
    if ($mode === 'delay')
    {
        usleep(800000);
        @fwrite($connection, "HTTP/1.1 200 OK\r\nContent-Length: 2\r\nConnection: close\r\n\r\n{}");
    }
    elseif ($mode === 'redirect')
    {
        fwrite($connection, "HTTP/1.1 302 Found\r\nLocation: http://" . stream_socket_get_name($target, false)
            . "/target\r\nContent-Length: 0\r\nConnection: close\r\n\r\n");
    }
    elseif ($request === 0)
    {
        fwrite($connection, "HTTP/1.1 100 Continue\r\nX-Interim: discard\r\n\r\n"
            . "HTTP/1.1 401 Unauthorized\r\nWWW-Authenticate: Basic realm=\"test\"\r\n"
            . "www-authenticate: Bearer error=\"invalid_token\"\r\n"
            . "Content-Type: application/json\r\nContent-Length: 2\r\nConnection: close\r\n\r\n{}");
    }
    else
    {
        fwrite($connection, "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n"
            . "Content-Length: 2\r\nConnection: close\r\n\r\n{}");
    }
    fclose($connection);
}
fclose($server);
if ($target !== null)
{
    $received = @stream_socket_accept($target, 0);
    echo $received === false ? "no redirect\n" : "unexpected redirect\n";
    if ($received !== false) { fclose($received); }
    fclose($target);
}
