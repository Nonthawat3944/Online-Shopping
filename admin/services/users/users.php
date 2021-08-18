<?php
try {
    $stmt = $connect->prepare("SELECT * FROM users WHERE admin != 1 ORDER BY created_at ASC");
    $stmt->execute();
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
$i = 0;
foreach ($result as $user) {
    $i++;
?>
    <tr>
        <td><?= $i ?></td>
        <td style='white-space:nowrap;'><?= $user['username'] ?></td>
        <td style='white-space:nowrap;'><?= $user['firstname'] . " " . $user['lastname'] ?></td>
        <td style='white-space:nowrap;'><?= $user['email'] ?></td>
        <td style='white-space:nowrap;'><?= date("d / m / Y / เวลา H:i น.", strtotime($user['created_at'])) ?></td>
        <td style='white-space:nowrap;'>
            <a href="?users=update&id=<?= $user['id'] ?>" class='btn btn-sm btn-warning'><i class='bi bi-pencil-square me-2'></i>แก้ไข</a>
            <a href="?users=delete&id=<?= $user['id'] ?>" class='btn btn-sm btn-danger' onclick="return confirm('ต้องการลบบัญชีสมาชิกนี้ ? ')"><i class='bi bi-trash-fill me-2'></i>ลบ</a>
        </td>
    </tr>
<?php
}
?>