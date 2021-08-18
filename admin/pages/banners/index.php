<?php
require_once('../../services/connect.php');
require_once('../../services/session.php');

?>
<?php include_once('../includes/header.php') ?>
<?php include_once('../includes/navbar.php') ?>
<?php include_once('../includes/sidebar.php') ?>

<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>การโฆษณา</h4>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($_GET['banners']) && $_GET['banners'] == "update") {
                include_once('./form_update.php');
            } else {
                require_once('../../services/banners/banners.php');
            }
            ?>
        </div>
    </div>
</main>

<?php include_once('../includes/script.php') ?>