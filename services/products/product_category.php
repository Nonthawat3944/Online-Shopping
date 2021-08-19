<?php
try {
    $stmt_page = $connect->prepare("SELECT * FROM products WHERE category_id = :category_id");
    $stmt_page->execute(array(':category_id' => $_GET['c']));
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
    WHERE products.category_id = :category_id
    ORDER BY created_at DESC LIMIT $offset, $record_show");
    $stmt_products->execute(array(':category_id' => $_GET['c']));
    $products = $stmt_products->fetchAll();
    $row_c = $stmt_products->rowCount();

} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
?>
<div class="row">
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
                    <a class="page-link" href="?c=<?= $_GET['c'] ?>&category=<?= $_GET['category'] ?>&page=1" tabindex="-1" aria-disabled="true">First</a>
                </li>
                <li class="page-item <?= $page > 1 ? '' : 'disabled' ?>">
                    <a class="page-link" href="?c=<?= $_GET['c'] ?>&category=<?= $_GET['category'] ?>&page=<?= $page - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($i = 1; $i <= $page_total; $i++) {

                    if ($page <= 2) {
                        if ($i <= 5) {
                ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="?c=<?= $_GET['c'] ?>&category=<?= $_GET['category'] ?>&page=<?= $i ?>"><?= $i ?></a></li>
                        <?php
                        }
                    } else if ($page > 2) {
                        if ($i <= $page + 2 && $i >= $page - 2) {
                        ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="?c=<?= $_GET['c'] ?>&category=<?= $_GET['category'] ?>&page=<?= $i ?>"><?= $i ?></a></li>
                <?php
                        }
                    }
                }
                ?>
                <li class="page-item <?= $page < $page_total ? '' : 'disabled' ?>">
                    <a class="page-link" href="?c=<?= $_GET['c'] ?>&category=<?= $_GET['category'] ?>&page=<?= $page + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="?c=<?= $_GET['c'] ?>&category=<?= $_GET['category'] ?>&page=<?= $page_total ?>">Last</a>
                </li>
            </ul>
        </nav>
    </div>
</div>