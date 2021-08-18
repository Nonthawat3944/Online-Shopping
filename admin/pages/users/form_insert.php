<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                เพิ่มบัญชีสมาชิก
            </div>
            <div class="card-body">
                <form action="../../services/users/insert.php" method="POST">
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
                        <input type="submit" name="insert" value="เพิ่มข้อมูล" class="btn btn-success w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>