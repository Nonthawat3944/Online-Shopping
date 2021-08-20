<!-- Header -->
<?php include_once('../includes/header.php') ?>
<!-- Navbar  -->
<?php include_once('../includes/navbar.php') ?>
<main class="container-xxl py-3">
    <?php
    if (isset($_GET['cart'])) {
        include_once('../cart/index.php');
    } elseif (isset($_GET['submit'])) {
        include_once('../cart/form_order.php');
    } elseif (isset($_GET['pd'])) {
        include_once('../products/product_details.php');
    } elseif (isset($_GET['search'])) {
        include_once('../products/product_search.php');
    } elseif (isset($_GET['category'])) {
        include_once('../products/product_category.php');
    } elseif (isset($_GET['account'])) {
        include_once('../account/index.php');
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#ordersTable').DataTable();
    })
    $(function() {
        $(".checkbox_input").click(function() { // เมื่อคลิก checkbox  ใดๆ  
            if ($(this).prop("checked") == true) { // ตรวจสอบ property  การ ของ   
                var indexObj = $(this).index(".checkbox_input"); //   
                $(".checkbox_input").not(":eq(" + indexObj + ")").prop("checked", false); // ยกเลิกการคลิก รายการอื่น  
            }
        });

        $("#form_checkbox").submit(function() { // เมื่อมีการส่งข้อมูลฟอร์ม  
            if ($(".checkbox_input:checked").length == 0) { // ถ้าไม่มีการเลือก checkbox ใดๆ เลย  
                alert("ยังไม่ได้เลือกธนาคารที่ใช้ชำระเงิน");
                return false;
            }
        });

    });
</script>
<?php
if (isset($row_s) && $row_s <= 4) {
?>
    <script>
        let rowS = <?= $row_s == "" ? 0 : $row_s ?>;
        let w = window.innerWidth;
        let footer = document.querySelector('.footer');
        if (w < 401 && rowS <= 2) {
            footer.style.position = 'fixed';
            footer.style.bottom = '0';
            footer.style.width = '100%';
        }
        if (w > 400 && rowS <= 4) {
            footer.style.position = 'fixed';
            footer.style.bottom = '0';
            footer.style.width = '100%';
        }
    </script>
<?php
}

if (isset($row_c) && $row_c <= 4) {
?>
    <script>
        let rowC = <?= $row_c == "" ? 0 : $row_c ?>;
        let w = window.innerWidth;
        let footer = document.querySelector('.footer');

        if (w < 401 && rowC <= 2) {
            footer.style.position = 'fixed';
            footer.style.bottom = '0';
            footer.style.width = '100%';
        }
        if (w > 400 && rowC <= 4) {
            footer.style.position = 'fixed';
            footer.style.bottom = '0';
            footer.style.width = '100%';
        }
    </script>
<?php
}
