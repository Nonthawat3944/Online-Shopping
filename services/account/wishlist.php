<?php
try {
    $stmt = $connect->prepare("SELECT wishlist.*, products.product, products.image, products.price FROM wishlist LEFT JOIN products ON wishlist.product_id = products.id WHERE wishlist.user_id = :user_id ORDER BY wishlist.id ASC");
    $stmt->execute(array(':user_id' => $_SESSION['U_ID']));
    $data = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
if ($stmt->rowCount() < 1) {
?>
    <div class="alert alert-danger text-center" role="alert">
        <strong>ยังไม่มีสินค้าที่ถูกใจ</strong>
    </div>
<?php
} else {
?>
    <div class="wishlist-list">
        <?php
        foreach ($data as $value) {
        ?>
            <div class="wishlist-item card card-body shadow-sm mb-1">
                <div class="row">
                    <div class="col-4 wishlist-item-image">
                        <img src="../../admin/uploads/<?= $value['image'] ?>" class="d-block mx-auto rounded w-50">
                    </div>
                    <div class="col-6 wishlist-item-details">
                        <div class="wishlist-item-title">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <strong>
                                        <a href="?pd=<?= $value['product_id'] ?>" class="text-decoration-none text-dark">
                                            <?= $value['product'] ?>
                                        </a>
                                    </strong>
                                </li>
                                <hr>
                                <li class="mb-2 row">
                                    <div class="col-12 col-md-6">
                                        <strong>
                                            <h4 class="text-primary">฿<?= number_format($value['price'], 2) ?></h4>
                                        </strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="?account=wishlist&wishlist=out&id=<?= $value['id'] ?>" class="btn btn-danger" onclick="return confirm('ต้องการลบออกจากสินค้าที่ถูกใจ ?')">
                                            <i class="bi bi-trash"></i> นำออก</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="wishlist-list-app">
        <?php
        foreach ($data as $value) {
        ?>
            <div class="wishlist-item-app card card-body shadow-sm mb-1">
                <a href="?pd=<?= $value['product_id'] ?>" class="text-decoration-none">
                    <div class="row mb-2">
                        <div class="wishlist-item-image-app col-3">
                            <img src="../../admin/uploads/<?= $value['image'] ?>" class="d-block mx-auto rounded w-100">
                        </div>
                        <div class="wishlist-item-details-app col-9">
                            <div class="w-100 text-truncate"><span class="text-dark"><?= $value['product'] ?></span></div>
                            <b class="text-primary">฿<?= number_format($value['price'], 2) ?></b>
                        </div>
                    </div>
                </a>
                <div class="row">
                    <div class="col-12">

                        <a href="?account=wishlist&wishlist=out&id=<?= $value['id'] ?>" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('ต้องการลบออกจากสินค้าที่ถูกใจ ?')">
                            <i class="bi bi-trash"></i> นำออก
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>
