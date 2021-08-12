<!-- Header -->
<?php include_once('../includes/header.php') ?>
<!-- Navbar  -->
<?php include_once('../includes/navbar.php') ?>
<main class="auth-main">
    <div class="auth-box card shadow text-center">
        <div class="card-body">
            <div class="auth-title">
                <h3><b>CSEMN | Shopping Online</b></h3>
                <strong>เข้าสู่ระบบ</strong>
            </div>
            <hr>
            <div class="auth-body">
                <form action="">
                    <div class="input-group mb-3">
                        <label for="username" class="input-group-text">ชื่อผู้ใช้</label>
                        <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้..." required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="password" class="input-group-text">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน..." required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" value="เข้าสู่ระบบ" class="btn btn-primary w-100">
                    </div>
                </form>
                <span>ยังไม่ได้ลงทะเบียน ? <a href="register.php">ลงทะเบียน ตอนนี้</a></span>
            </div>
        </div>
    </div>
</main>
<!-- Script  -->
<?php include_once('../includes/script.php') ?>