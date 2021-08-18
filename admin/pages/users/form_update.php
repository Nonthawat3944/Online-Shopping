<?php require_once('../../services/users/edit.php') ?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                แก้ไขข้อมูลบัญชีสมาชิก
            </div>
            <div class="card-body">
                <form action="../../services/users/update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="input-group mb-3">
                        <label for="username" class="input-group-text">ชื่อผู้ใช้</label>
                        <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="firstname" class="input-group-text">ชื่อ</label>
                        <input type="text" name="firstname" class="form-control" value="<?= $user['firstname'] ?>" value="<?= $user['firstname'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="lastname" class="input-group-text">นามสกุล</label>
                        <input type="text" name="lastname" class="form-control" value="<?= $user['lastname'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="email" class="input-group-text">อีเมลล์</label>
                        <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" name="update" value="บันทึกข้อมูล" class="btn btn-success w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
