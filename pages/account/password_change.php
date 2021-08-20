<?php
if (!isset($_SESSION['U_ID'])) {
    ?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
    <?php
    exit();
}
?>
<div class="card card-body shadow-sm">
    <h4 style="color: #0b2d38;">เปลี่ยนรหัสผ่าน</h4>
    <hr class="my-2">
    <form action="../../services/account/password.php" method="POST">
        <div class="input-group mb-3">
            <label for="password" class="input-group-text">รหัสผ่านปัจจุบัน</label>
            <input type="password" name="password" class="form-control" placeholder="รหัสผ่านปัจจุบัน..." required>
        </div>
        <div class="input-group mb-3">
            <label for="password" class="input-group-text">รหัสผ่าน</label>
            <input type="password" name="new_password" class="form-control" placeholder="รหัสผ่าน..." required>
        </div>
        <div class="input-group mb-3">
            <label for="password" class="input-group-text">ยืนยันรหัสผ่าน</label>
            <input type="password" name="confirm_new_password" class="form-control" placeholder="ยืนยันรหัสผ่าน..." required>
        </div>
        <input type="submit" value="บันทึก" class="btn btn-primary">
    </form>
</div>