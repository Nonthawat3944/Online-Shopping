<?php
require_once('../../services/connect.php');
require_once('../../services/session.php');

if (isset($_GET['logout'])) {
    session_destroy();
?>
    <meta http-equiv="refresh" content="0; url=../">
<?php
}
?>
<?php include_once('../includes/header.php') ?>
<?php include_once('../includes/navbar.php') ?>
<?php include_once('../includes/sidebar.php') ?>


<?php include_once('../includes/script.php') ?>