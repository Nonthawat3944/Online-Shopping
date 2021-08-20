<?php
try {
    $stmt_view = $connect->prepare("SELECT views FROM products WHERE id = :id");
    $stmt_view->execute(array(":id" => $_GET['pd']));
    $views = $stmt_view->fetch();
    $view = $views['views'] === NULL ? 1 : (int)$views['views'] + 1;
    try {
        $stmt_view_db = $connect->prepare("UPDATE products SET views = :views WHERE id = :id");
        $stmt_view_db->execute(array(':views' => $view, ':id' => $_GET['pd']));
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
        exit();
    }
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
?>
