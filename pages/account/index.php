<?php
if (!isset($_SESSION['U_ID'])) {
    ?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
    <?php
    exit();
}
?>
<div class="row account-display mb-5">
    <div class="col-md-3 px-1 mb-lg-0 mb-2">
        <?php include_once('../account/navbar.php') ?>
    </div>
    <div class="col-md-9 px-1">
        <?php
        if ($_GET['account'] === "password_change") {
            include_once('../account/password_change.php');
        } elseif ($_GET['account'] === "wishlist") {
            include_once('../account/wishlist.php');
        } elseif ($_GET['account'] === "order") {
            include_once('../account/order.php');
        } else {
        ?>
            <div class="card card-body shadow-sm">
                <h4 style="color: #0b2d38;">ข้อมูลส่วนตัว</h4>
                <hr class="my-2">
                <form action="">
                    <div class="input-group mb-3">
                        <label for="username" class="input-group-text">ชื่อผู้ใช้</label>
                        <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้..." required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="fullname" class="input-group-text">ชื่อ - นามสกุล</label>
                        <input type="text" name="firstname" class="form-control" placeholder="ชื่อ..." required>
                        <input type="text" name="lastname" class="form-control" placeholder="นามสกุล..." required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="email" class="input-group-text">อีเมลล์</label>
                        <input type="email" name="email" class="form-control" placeholder="อีเมลล์..." required>
                    </div>
                    <input type="submit" value="บันทึก" class="btn btn-primary">
                </form>
            </div>
        <?php
        }
        ?>
    </div>
</div>