<?php
$search = "%{$_GET['search']}%";
try {
    $stmt_page = $connect->prepare("SELECT products.*, categories.category FROM products 
    LEFT JOIN categories 
    ON products.category_id = categories.id
    WHERE product LIKE :search OR category LIKE :search");
    $stmt_page->execute(array(':search' => $search));
    $row = $stmt_page->rowCount();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$record_show = 12;
$offset = ($page - 1) * $record_show;
$page_total = ceil($row / $record_show);
try {
    $stmt_products = $connect->prepare("SELECT products.*, categories.category FROM products 
    LEFT JOIN categories 
    ON products.category_id = categories.id
    WHERE product LIKE :search OR category LIKE :search
    ORDER BY product ASC LIMIT $offset, $record_show");
    $stmt_products->execute(array(':search' => $search));
    $products = $stmt_products->fetchAll();
    $row_s = $stmt_products->rowCount();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
if ($row_s < 1) {
?>
    <div class="row">
        <div class="col-12 px-1">
            <div class="error alert alert-danger text-center">
                <strong>ไม่มีสินค้าที่คุณค้นหา</strong>
                <hr>
                <a href="../../" class="btn btn-warning">กลับไปหน้าแรก</a>
            </div>
        </div>
    </div>

<?php
} else {
?>
    <div class="row mx-0 px-0">
        <?php
        foreach ($products as $p) {
        ?>
            <div class="product-display col-12 col-md-6 col-lg-3 col-sm-6 mb-4 px-1">
                <div class="list-group-item rounded px-2 product-item position-realtive">
                    <a href="?pd=<?= $p['id'] ?>" class="product-btn btn btn-outline-danger">ดูสินค้า</a>
                    <img src="../../admin/uploads/<?= $p['image'] ?>" class="thumbnail d-block mx-auto w-100" height="250px">
                    <div class="product-text mt-2">
                        <small class="d-block  text-secondary"><?= $p['category'] ?></small>
                        <div class="text-truncate">
                            <strong><?= $p['product'] ?></strong>
                        </div>
                        <hr class="my-1">
                        <h3 class="text-primary">฿<?= number_format($p['price'], 2) ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="product-display-app col-6 mb-4 px-1">
                <a href="?pd=<?= $p['id'] ?>" class="text-decoration-none">
                    <div class="list-group-item rounded px-2 product-item position-realtive">
                        <img src="../../admin/uploads/<?= $p['image'] ?>" class="thumbnail d-block mx-auto w-100" height="150px">
                        <div class="product-text mt-2">
                            <small class="d-block  text-secondary"><?= $p['category'] ?></small>
                            <div class="text-truncate">
                                <strong><?= $p['product'] ?></strong>
                            </div>
                            <hr class="my-1">
                            <h3 class="text-primary">฿<?= number_format($p['price'], 2) ?>
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
        <div class="col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="?search=<?= $_GET['search'] ?>&page=1" tabindex="-1" aria-disabled="true">First</a>
                    </li>
                    <li class="page-item <?= $page > 1 ? '' : 'disabled' ?>">
                        <a class="page-link" href="?search=<?= $_GET['search'] ?>&page=<?= $page - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $page_total; $i++) {

                        if ($page <= 2) {
                            if ($i <= 5) {
                    ?>
                                <li class="page-item <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="?search=<?= $_GET['search'] ?>&page=<?= $i ?>"><?= $i ?></a></li>
                            <?php
                            }
                        } else if ($page > 2) {
                            if ($i <= $page + 2 && $i >= $page - 2) {
                            ?>
                                <li class="page-item <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="?search=<?= $_GET['search'] ?>&page=<?= $i ?>"><?= $i ?></a></li>
                    <?php
                            }
                        }
                    }
                    ?>
                    <li class="page-item <?= $page < $page_total ? '' : 'disabled' ?>">
                        <a class="page-link" href="?search=<?= $_GET['search'] ?>&page=<?= $page + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?search=<?= $_GET['search'] ?>&page=<?= $page_total ?>">Last</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
<?php
}
?>
