<?php
try {
    $sql = "SELECT * FROM categories WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->execute(array('id' => $_GET['id']));
    $result = $stmt->fetch();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
?>
<div class="card">
    <div class="card-header">
        แก้ไขประเภทสินค้า
    </div>
    <div class="card-body">
        <form action="../../services/categories/update.php" method="post">
            <div class="input-group mb-3">
                <label class="input-group-text">ประเภทสินค้า</label>
                <input type="hidden" name="id" value="<?= $result['id'] ?>" required>
                <input type="text" name="category" class="form-control" value="<?= $result['category'] ?>" required>
            </div>
            <input type="submit" class="btn btn-success w-100" name="update" value="บันทึกข้อมูล">
        </form>
    </div>
</div>