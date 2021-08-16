<?php
try {
    $stmt_categories = $connect->prepare("SELECT * FROM categories ORDER BY category ASC");
    $stmt_categories->execute();
    $categories = $stmt_categories->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
$i = 0;
foreach ($categories as $value) {
    $i++;
?>
    <tr>
        <th><?= $i ?></th>
        <td style='white-space:nowrap;'><?= $value['category'] ?></td>
        <td style='white-space:nowrap;'>
            <a href="?categories=update&id=<?= $value['id'] ?>" class="btn btn-warning btn-sm"><i class='bi bi-pencil-square me-2'></i>แก้ไข</a>
            <a href="?categories=delete&id=<?= $value['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการที่จะลบรายการนี้ ?')"><i class='bi bi-trash-fill me-2'></i>ลบ</a>
        </td>
    </tr>
<?php
}
?>