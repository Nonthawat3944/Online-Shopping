<?php
try {
    $stmt = $connect->prepare(" SELECT products.*,categories.category FROM products LEFT JOIN categories ON products.category_id = categories.id WHERE products.id = :id");
    $stmt->execute(array(":id" => $_GET['id']));
    $result = $stmt->fetch();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
?>