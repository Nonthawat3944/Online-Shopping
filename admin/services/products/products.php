<?php
try {
    $stmt = $connect->prepare("SELECT products.*, categories.category FROM products LEFT JOIN categories ON products.category_id = categories.id ORDER BY products.product ASC");
    $stmt->execute();
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}

foreach ($result as $value) {
?>
    <tr>
        <td style='white-space:nowrap;'><?= $value['code'] ?></td>
        <td style='white-space:nowrap;'><?= $value['category'] ?></td>
        <td style='white-space:nowrap;'><?= $value['product'] ?></td>
        <td style='white-space:nowrap;'>฿<?= number_format($value['price'], 2) ?></td>
        <td style='white-space:nowrap;'><?= $value['created_at'] ?></td>
        <td style='white-space:nowrap;'>
            <a href="?products=view&id=<?= $value['id'] ?>" class='btn btn-sm btn-info'><i class="bi bi-eye-fill me-2"></i>ดูสินค้า</a>
            <a href="?products=update&id=<?= $value['id'] ?>" class='btn btn-sm btn-warning'><i class='bi bi-pencil-square me-2'></i>แก้ไข</a>
            <a href="?products=delete&id=<?= $value['id'] ?>&image=<?= $value['image'] ?>" class='btn btn-sm btn-danger' onclick="return confirm('คุณต้องการที่จะลบรายการนี้ ?')"><i class='bi bi-trash-fill me-2'></i>ลบ</a>
        </td>
    </tr>
    <?php
    ?>
<?php
}
?>