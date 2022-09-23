<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat Client</title>
</head>
<body>
<div style="align-items: center"></div>
<form method="post">
    <table>
        <tr>
            <td>
                <label for="txtMessage">Enter Message</label>
                <input type="text" id="txtMessage" name="txtMessage">
                <input type="submit" name="btnSend" value="Send">
            </td>
        </tr>
        <?php
        $host = '127.0.0.1';
        $port = 20205;

        if (isset($_POST['btnSend'])) {
            $msg = $_POST['txtMessage'];
            $sock = socket_create(AF_INET, SOCK_STREAM, 0);
            socket_connect($sock, $host, $port);
            socket_write($sock, $msg, strlen($msg));
            $reply = socket_read($sock, 1024);
            $reply = trim($reply);
            $reply = "Server Says:\t$reply";
        }
        ?>
        <tr>
            <td>
                <label for="reply"></label><textarea name="reply" id="reply" cols="30" rows="10"><?php
                    echo $reply ?? '' ?></textarea>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
