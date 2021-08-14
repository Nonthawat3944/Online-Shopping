<?php
try {
    $stmt_categories = $connect->prepare("SELECT * FROM categories ORDER BY id ASC");
    $stmt_categories->execute();
    $categories = $stmt_categories->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}

foreach ($categories as $c) {
?>
    <a href="?c=<?= $c['id'] ?>&category=<?= $c['category'] ?>" class="list-group-item list-group-item-action"><?= $c['category'] ?></a>
<?php
}
?>