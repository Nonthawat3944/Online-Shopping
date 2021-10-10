<!-- Header -->
<?php include_once('../includes/header.php') ?>
<!-- Navbar  -->
<?php include_once('../includes/navbar.php') ?>
<main class="auth-main">
    <div class="auth-box card shadow text-center">
        <div class="card-body">
            <div class="auth-title">
                <h3><b><?= $shop_db[1]['title'] ?></b></h3>
                <strong>ลงทะเบียน</strong>
            </div>
            <hr>
            <div class="auth-body">
                <form action="../../services/auth/register.php" method="POST">
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
                    <div class="input-group mb-3">
                        <label for="password" class="input-group-text">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control" minlength="8" placeholder="รหัสผ่าน..." required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="password" class="input-group-text">ยืนยันรหัสผ่าน</label>
                        <input type="password" name="confirm_password" class="form-control" minlength="8" placeholder="ยืนยันรหัสผ่าน..." required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" name="register" value="ลงทะเบียน" class="btn btn-primary w-100">
                    </div>
                </form>
                <span>ลงทะเบียนแล้ว ? <a href="login.php">เข้าสู่ระบบ ตอนนี้</a></span>
            </div>
        </div>
    </div>
</main>
<!-- Script  -->
<?php include_once('../includes/script.php') ?>
