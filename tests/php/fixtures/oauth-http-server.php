<?php declare(strict_types=1);

// Loopback fixture for CurlClient's response-header handling. No API credentials.
$server = stream_socket_server('tcp://127.0.0.1:0', $code, $message);
if ($server === false) { throw new RuntimeException($message, $code); }
echo stream_socket_get_name($server, false), PHP_EOL;
flush();
for ($request = 0; $request < 2; $request++)
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
    if ($request === 0)
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
