<?php
if (!isset($_SESSION['U_ID'])) {
?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
    <?php
    exit();
}

if (isset($_GET['wishlist']) && $_GET['wishlist'] == "out") {
    try {
        $stmt = $connect->prepare("DELETE FROM wishlist WHERE id = :id");
        $stmt->execute(array(':id' => $_GET['id']));
    ?>
        <script>
            alert('ลบออกจากสินค้าที่ถูกใจเรียบร้อย');
            window.location = '?account=wishlist';
        </script>
<?php
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
        exit();
    }
}
?>
<div class="card card-body shadow-sm">
    <h4 style="color: #0b2d38;">สินค้าที่ถูกใจ</h4>
    <hr class="my-2">
    <?php require_once('../../services/account/wishlist.php') ?>
</div>