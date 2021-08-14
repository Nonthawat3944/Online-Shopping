<div class="card h-100">
    <div class="card-header">
        เพิ่มรายการสินค้า
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
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
                                echo "<option value='{$value['id']}'>{$value['category']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-4">
                        <label for="product" class="input-group-text">ชื่อสินค้า</label>
                        <input type="text" name="product" class="form-control" placeholder="ชื่อสินค้า" required>
                    </div>
                    <div class="input-group mb-4">
                        <label for="price" class="input-group-text">ราคาสินค้า</label>
                        <input type="text" name="price" class="form-control" placeholder="ราคาสินค้า" required>
                    </div>
                    <div class="input-group mb-4">
                        <label for="quantity" class="input-group-text">จำนวนสินค้า</label>
                        <input type="text" name="quantity" class="form-control" placeholder="จำนวนสินค้า" required>
                    </div>
                    <div class="input-group mb-4">
                        <label for="image" class="input-group-text">รูปภาพ</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <div class="input-group">
                            <label for="details" class="input-group-text w-100">รายละเอียดสินค้า</label>
                        </div>
                        <textarea name="details" id="form_insert_details" class="form-control" placeholder="รายละเอียดสินค้า" required></textarea>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <input type="submit" class="btn btn-success w-50" name="insert" value="เพิ่มข้อมูล">
                </div>
            </div>
        </form>
    </div>
</div>