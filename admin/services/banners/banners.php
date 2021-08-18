<?php
try {
    $sql = "SELECT * FROM banners ORDER BY id ASC";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
foreach ($result as $value) {
?>
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header px-2">
                <a href="?banners=update&id=<?= $value['id'] ?>&banner=<?= $value['banner'] ?>" class="btn btn-sm btn-warning">
                    <i class='bi bi-pencil-square me-2'></i>เปลี่ยนรูปภาพ
                </a>
            </div>
            <div class="card-body">
                <img src="../../uploads/banners/<?= $value['banner'] ?>" class="w-100 mx-auto d-block rounded">
            </div>
        </div>
    </div>
<?php } ?>