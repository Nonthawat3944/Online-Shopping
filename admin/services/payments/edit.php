<?php
try {
    $sql = "SELECT * FROM banks WHERE id = :id";
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
        แก้ไขข้อมูลบัญชีธนาคาร
    </div>
    <div class="card-body">
        <form action="../../services/payments/update.php" method="post">
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
            <div class="input-group mb-4">
                <label for="" class="input-group-text">ธนาคาร</label>
                <input type="text" name="bank" class="form-control" value="<?= $result['bank'] ?>" required>
            </div>
            <div class="input-group mb-4">
                <label for="" class="input-group-text">สาขา</label>
                <input type="text" name="office" class="form-control" value="<?= $result['office'] ?>" required>
            </div>
            <div class="input-group mb-4">
                <label for="" class="input-group-text">ชื่อบัญชี</label>
                <input type="text" name="fullname" class="form-control" value="<?= $result['fullname'] ?>" required>
            </div>
            <div class="input-group mb-4">
                <label for="" class="input-group-text">เลขบัญชี</label>
                <input type="text" name="bank_number" class="form-control" value="<?= $result['bank_number'] ?>" required>
            </div>
            <input type="submit" class="btn btn-success w-100" name="update" value="บันทึกข้อมูล">
        </form>
    </div>
</div>