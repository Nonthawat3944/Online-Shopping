<?php
try {
    $stmt_categories = $connect->prepare("SELECT * FROM categories ORDER BY id ASC");
    $stmt_categories->execute();
    $categories = $stmt_categories->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
?>
<div class="category-list col-12 col-md-3 px-1">
    <div class="card shadow-sm">
        <div class="card-header">
            <strong>ประเภทสินค้า</strong>
        </div>
        <div class="category-list-item card-body">
            <?php
            foreach ($categories as $c) {
            ?>
                <a href="?c=<?= $c['id'] ?>&category=<?= $c['category'] ?>" class="category-item list-group-item list-group-item-action"><?= $c['category'] ?></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>