<?php

require_once('../connect.php');


if (isset($_POST['insert'])) {
    try {
        $stmt_check = $connect->prepare("SELECT * FROM categories WHERE category = :category");
        $stmt_check->execute(array(':category' => $_POST['category']));
        if ($stmt_check->rowCount() > 0) {
?>
            <script>
                alert('มีประเภทสินค้านี้แล้ว')
                location.href = '../../pages/categories/'
            </script>
        <?php
        } else {
            $sql = "INSERT INTO categories (category) VALUES (:category)";
            $stmt = $connect->prepare($sql);
            $stmt->execute(array(':category' => $_POST['category']));
        ?>
            <script>
                alert('เพิ่มประเภทสินค้าเรียบร้อย')
                location.href = '../../pages/categories/'
            </script>
<?php
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
        exit();
    }
    exit();
}

?>