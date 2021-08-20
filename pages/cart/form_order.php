<?php
if (!isset($_SESSION['U_ID'])) {
?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
<?php
    exit();
}
?>
<div class="row">
    <div class="col-12 px-1">
        <div class="card card-body shadow-sm">
            <div class="cart-title">
                <h2 class="py-0 my-0">ยืนยันการสั่งซื้อ</h2>
            </div>
            <hr>
            <div class="cart-body">
                <?php require_once('../../services/cart/form_order.php') ?>
            </div>
        </div>
    </div>
</div>