<?php

try {
    $sql = "SELECT * FROM banks ORDER BY id ASC";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
$i = 0;
foreach ($result as $value) {
    $i++;
?>
    <tr>
        <th><?= $i ?></th>
        <td tyle='white-space:nowrap;'><?= $value['bank'] ?></td>
        <td tyle='white-space:nowrap;'><?= $value['office'] ?></td>
        <td tyle='white-space:nowrap;'><?= $value['fullname'] ?></td>
        <td tyle='white-space:nowrap;'><?= $value['bank_number'] ?></td>
        <td tyle='white-space:nowrap;'>
            <a href="?payments=update&id=<?= $value['id'] ?>" class="btn btn-warning btn-sm"><i class='bi bi-pencil-square me-2'></i>แก้ไข</a>
            <a href="?payments=delete&id=<?= $value['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการที่จะลบรายการนี้ ?')"><i class='bi bi-trash-fill me-2'></i>ลบ</a>
        </td>
    </tr>
<?php
}
?>