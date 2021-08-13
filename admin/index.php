<?php
require_once('./services/connect.php');
require_once('./services/session.php');

if (isset($_GET['logout'])) {
    session_destroy();
    ?>
    <meta http-equiv="refresh" content="0; url=../">
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>Welcome to Admin Portal.</H1>
    <a href="?logout">Logout</a>
</body>
</html>