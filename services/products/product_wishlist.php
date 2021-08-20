<?php
if (isset($_SESSION['U_ID'])) {
    switch ($_GET['wishlist']) {
        case 'in':
            try {
                $stmt = $connect->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (:user_id, :product_id)");
                $stmt->execute(array(':user_id' => $_SESSION['U_ID'], ':product_id' => $_GET['pd']));
?>
                <script>
                    alert('เพิ่มไปยังสินค้าที่ถูกใจเรียบร้อย');
                    window.location = '?pd=<?= $_GET['pd'] ?>';
                </script>
            <?php
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                exit();
            }
            break;
        case 'out':
            try {
                $stmt = $connect->prepare("DELETE FROM wishlist WHERE user_id = :user_id AND product_id = :product_id");
                $stmt->execute(array(':user_id' => $_SESSION['U_ID'], ':product_id' => $_GET['pd']));
            ?>
                <script>
                    alert('ลบออกจากสินค้าที่ถูกใจเรียบร้อย');
                    window.location = '?pd=<?= $_GET['pd'] ?>';
                </script>
    <?php
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                exit();
            }
            break;
    }
} else {
    ?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
<?php
}
