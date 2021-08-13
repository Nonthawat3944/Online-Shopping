<?php
try {
    $stmt_banners = $connect->prepare("SELECT * FROM banners ORDER BY id ASC");
    $stmt_banners->execute();
    $banners = $stmt_banners->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
?>
<div class="col-12 col-md-9 px-1">
    <div id="bannerPage" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../admin/uploads/banners/<?= $banners[0]['banner'] ?>" class="d-block w-100 rounded">
            </div>
            <div class="carousel-item">
                <img src="../../admin/uploads/banners/<?= $banners[1]['banner'] ?>" class="d-block w-100 rounded">
            </div>
            <div class="carousel-item">
                <img src="../../admin/uploads/banners/<?= $banners[2]['banner'] ?>" class="d-block w-100 rounded">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerPage" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerPage" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
