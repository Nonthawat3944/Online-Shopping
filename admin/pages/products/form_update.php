<?php require_once('../../services/products/edit.php') ?>
<div class="card h-100">
    <div class="card-header">
        แก้ไขข้อมูลรายการสินค้า
    </div>
    <div class="card-body">
        <form action="../../services/products/update.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="id" value="<?= $result['id'] ?>">
                    <input type="hidden" name="code" value="<?= $result['code'] ?>">
                    <div class="input-group mb-4">
                        <label for="categories" class="input-group-text">ประเภทสินค้า</label>
                        <select name="category_id" class="form-select" required>
                            <option value="" selected disabled>เลือกประเภทสินค้า</option>
                            <?php
                            try {
                                $stmt_categories = $connect->prepare("SELECT * FROM categories ORDER BY id ASC");
                                $stmt_categories->execute();
                                $categories = $stmt_categories->fetchAll();
                            } catch (PDOException $e) {
                                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                                exit();
                            }
                            foreach ($categories as $value) {
                            ?>
                                <option value="<?= $value['id'] ?>" <?= $value['id'] == $result['category_id'] ? 'selected' : '' ?>><?= $value['category'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-4">
                        <label for="product" class="input-group-text">ชื่อสินค้า</label>
                        <input type="text" name="product" class="form-control w-100" value="<?= $result['product'] ?>" required>
                    </div>
                    <div class="input-group mb-4">
                        <label for="price" class="input-group-text">ราคาสินค้า</label>
                        <input type="text" name="price" class="form-control" value="<?= $result['price'] ?>" required>
                    </div>
                    <div class="input-group mb-4">
                        <label for="quantity" class="input-group-text">จำนวนสินค้า</label>
                        <input type="text" name="quantity" class="form-control" value="<?= $result['quantity'] ?>" required>
                    </div>
                    <div class="input-group mb-4">
                        <label for="image" class="input-group-text">รูปภาพ</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-4">
                        <img src="../../uploads/<?= $result['image'] ?>" class="w-50 mx-auto d-block rounded">
                        <input type="hidden" name="image_db" value="<?= $result['image'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <div class="input-group">
                            <label for="details" class="input-group-text w-100">รายละเอียดสินค้า</label>
                        </div>
                        <textarea name="details" class="form-control" cols="30" rows="10" required><?= $result['details'] ?></textarea>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <input type="submit" class="btn btn-success w-50" name="update" value="บันทึกข้อมูล">
                </div>
            </div>
        </form>
    </div>
</div>