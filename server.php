<?php

if (!extension_loaded('sockets')) {
    die('The sockets extension is not loaded.');
}
require_once 'Chat.php';
$host = '127.0.0.1';
$port = 20205;
set_time_limit(0);


$sock = socket_create(AF_INET, SOCK_STREAM, 0);
$result = socket_bind($sock, $host, $port);

$listen = socket_listen($sock, 3);

do {
    $accept = socket_accept($sock);
    $msg = socket_read($accept, 1024);

    $msg = trim($msg);

    echo "Client says: \t" . $msg . "\n\n";

    $line = new Chat();
    echo "Enter Reply:\t";
    $reply = $line->readline();

    socket_write($accept, $reply, strlen($reply));

} while (true);

socket_close($sock);
