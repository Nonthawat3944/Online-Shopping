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
                <h4>การตั้งค่า</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <strong>ข้อมูลส่วนตัว</strong>
                    </div>
                    <div class="card-body">
                        <form action="../../services/settings/profile.php" method="POST">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="username">ชื่อผู้ใช้</label>
                                <input type="text" name="username" id="username" class="form-control" value="<?= $_SESSION['U_USERNAME'] ?>" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="fullname">ชื่อ - นามสุกล</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $_SESSION['U_FIRSTNAME'] ?>" required>
                                <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $_SESSION['U_LASTNAME'] ?>" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="email">อีเมลล์</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= $_SESSION['U_EMAIL'] ?>" required>
                            </div>
                            <hr class="my-2">
                            <input type="submit" class="btn btn-success" name="update" value="บันทึกข้อมูล">

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>เปลี่ยนรหัสผ่าน</strong>
                    </div>
                    <div class="card-body">
                        <form action="../../services/settings/password.php" method="POST">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="current_password">รหัสผ่านปัจจุบัน</label>
                                <input type="password" name="password" id="current_password" class="form-control" placeholder="รหัสผ่านปัจจุบัน" minlength="8" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="new_password">รหัสผ่านใหม่</label>
                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="รหัสผ่านใหม่" minlength="8" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="confirm_new_password">ยืนยันรหัสผ่านใหม่</label>
                                <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" placeholder="ยืนยันรหัสผ่านใหม่" minlength="8" required>
                            </div>
                            <hr class="my-2">
                            <input type="submit" class="btn btn-success" name="update" value="บันทึกข้อมูล">

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <?php

                try {
                    $stmt_shop = $connect->prepare("SELECT * FROM shop ORDER BY id ASC");
                    $stmt_shop->execute();
                    $shop = $stmt_shop->fetchAll();
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                    exit();
                }

                ?>
                <div class="card">
                    <div class="card-header">
                        <strong>ข้อมูลร้านค้า</strong>
                    </div>
                    <div class="card-body">
                        <form action="../../services/settings/shop.php" method="POST">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="name_shop">ชื่อร้านค้า</label>
                                <input type="hidden" name="name_shop[0]" value="<?= $shop[1]['id'] ?>" required>
                                <input type="text" name="name_shop[1]" id="name_shop" class="form-control" value="<?= $shop[1]['title'] ?>" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="name_web">ชื่อเว็บไซต์</label>
                                <input type="hidden" name="name_web[0]" value="<?= $shop[2]['id'] ?>" required>
                                <input type="text" name="name_web[1]" id="name_web" class="form-control" value="<?= $shop[2]['title'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="input-group-text" for="shop_details">รายละเอียดเว็บไซต์</label>
                                <input type="hidden" name="shop_details[0]" value="<?= $shop[3]['id'] ?>" required>
                                <textarea name="shop_details[1]" id="shop_details" class="form-control" rows="5" cols="10" required><?= $shop[3]['title'] ?></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="shopping_cost">ราคาค่าจัดส่งสินค้า</label>
                                <input type="hidden" name="shopping_cost[0]" value="<?= $shop[0]['id'] ?>" required>
                                <input type="text" name="shopping_cost[1]" id="shopping_cost" class="form-control" value="<?= $shop[0]['title'] ?>" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="line_token">LINE TOKEN</label>
                                <input type="hidden" name="line_token[0]" value="<?= $shop[4]['id'] ?>" required>
                                <input type="text" name="line_token[1]" id="line_token" class="form-control" value="<?= $shop[4]['title'] ?>" required>
                            </div>
                            <hr class="my-2">
                            <input type="submit" class="btn btn-success" name="update" value="บันทึกข้อมูล">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <?php

                try {
                    $stmt_contact = $connect->prepare("SELECT * FROM contacts ORDER BY id ASC");
                    $stmt_contact->execute();
                    $contacts = $stmt_contact->fetchAll();
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                    exit();
                }

                ?>
                <div class="card">
                    <div class="card-header">
                        <strong>ช่องทางการติดต่อ</strong>
                    </div>
                    <div class="card-body">
                        <form action="../../services/settings/contact.php" method="POST">
                            <?php
                            foreach ($contacts as $value) {
                            ?>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="<?= $value['title'] ?>"><?= $value['title'] ?></label>
                                    <input type="hidden" name="<?= $value['title'] ?>[0]" value="<?= $value['id'] ?>">
                                    <input type="text" name="<?= $value['title'] ?>[1]" id="<?= $value['title'] ?>" class="form-control" value="<?= $value['contact'] ?>" required>
                                </div>
                            <?php
                            }
                            ?>
                            <hr class="my-2">
                            <input type="submit" class="btn btn-success" name="update" value="บันทึกข้อมูล">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once('../includes/script.php') ?>