<?php 
try {
    $stmt = $connect->prepare(" SELECT * FROM products WHERE products.id = :id");
    $stmt->execute(array(":id" => $_GET['id']));
    $result = $stmt->fetch();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
