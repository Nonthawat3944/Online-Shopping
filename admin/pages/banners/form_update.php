<div class="col-md-3"></div>
<div class="col-md-6 my-5">
    <div class="card h-100">
        <div class="card-header">
            เปลี่ยนรูปภาพการโฆษณา
        </div>
        <div class="card-body">
            <form action="../../services/banners/update.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-4">
                    <label class="input-group-text">รูปภาพ</label>
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>" required>
                    <input type="hidden" name="banner_db" value="<?= $_GET['banner'] ?>" required>
                    <input type="file" name="banner" class="form-control" required>
                </div>
                <input type="submit" class="btn btn-success w-100" name="update" value="บันทึกข้อมูล">
            </form>
        </div>
    </div>
</div>
<div class="col-md-3"></div>