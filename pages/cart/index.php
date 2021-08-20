<?php
if (!isset($_SESSION['U_ID'])) {
?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
<?php
    exit();
}
require_once('../../services/cart/cart_quantity.php')
?>
<div class="row">
    <div class="col-12 px-1">
        <div class="card card-body shadow-sm">
            <div class="cart-title d-flex justify-content-between">
                <h2 class="py-0 my-0">ตะกร้าสินค้า</h2>
                <a href="?cart=empty" class="btn btn-outline-danger" onclick="return confirm('ต้องการนำสินค้าทั้งหมดออกจากตะกร้า ? ')">ล้างตะกร้า</a>
            </div>
            <hr>
            <div class="cart-body">
                <?php require_once('../../services/cart/cart.php') ?>
            </div>
        </div>
    </div>
</div>