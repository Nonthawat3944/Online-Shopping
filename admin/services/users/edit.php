<?php
try {
    $stmt = $connect->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(array(':id' => $_GET['id']));
    $user = $stmt->fetch();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
?>
