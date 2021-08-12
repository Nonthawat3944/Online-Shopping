<!-- Header -->
<?php include_once('../includes/header.php') ?>
<!-- Navbar  -->
<?php include_once('../includes/navbar.php') ?>
<main class="container-xxl py-3">
    <?php
    if($_GET['a']){
        ?>
        <meta http-equiv="refresh" content="0; url=../cart/">
        <?php
    } else
    if ($_GET['pd']) {
        include_once('../products/product_details.php');
    } elseif ($_GET['search']) {
        include_once('../products/product_search.php');
    } else {
    ?>
        <div class="row mb-4">
            <!-- Categories List  -->
            <?php include_once('../includes/categories.php') ?>
            <!-- Banners  -->
            <?php include_once('../includes/banners.php') ?>
        </div>
        <!-- Products Display -->
    <?php
        include_once('../products/products_all.php');
    }

    ?>
</main>
<!-- Footer  -->
<?php include_once('../includes/footer.php') ?>
<!-- Script  -->
<?php include_once('../includes/script.php') ?>