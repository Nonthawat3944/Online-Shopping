<?php

require_once('../connect.php');

if (isset($_POST['update'])) {
    try {
        $stmt_check = $connect->prepare("SELECT * FROM categories WHERE category = :category AND id != :id");
        $stmt_check->execute(array(':category' => $_POST['category'], ':id' => $_POST['id']));
        if ($stmt_check->rowCount() > 0) {
?>
            <script>
                alert('มีประเภทสินค้านี้แล้ว')
                location.href = '../../pages/categories/?categories=update&id=<?= $_POST['id'] ?>'
            </script>
        <?php
        } else {
            $sql = "UPDATE categories SET category = :category WHERE id = :id";
            $stmt = $connect->prepare($sql);
            $stmt->execute(array(':category' => $_POST['category'], ':id' => $_POST['id']));
        ?>
            <script>
                alert('แก้ไขข้อมูลประเภทสินค้าเรียบร้อย')
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