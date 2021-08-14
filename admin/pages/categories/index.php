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

<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</main>
<?php include_once('../includes/script.php') ?>