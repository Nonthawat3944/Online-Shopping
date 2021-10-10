<?php
require_once('../../admin/services/connect.php');
if (isset($_SESSION['U_ID'])) {
    try {
        $stmt_check = $connect->prepare("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id");
        $stmt_check->execute(array('user_id' => $_SESSION['U_ID'], 'product_id' => $_POST['id']));
        $data = $stmt_check->fetch();
        if ($stmt_check->rowCount() <= 0) {
            $sql = "INSERT INTO cart (
                user_id,
                product_id,
                cart_quantity
            ) VALUES (
                :user_id,
                :product_id,
                :quantity
            )";
            $stmt = $connect->prepare($sql);
            $stmt->execute(array('user_id' => $_SESSION['U_ID'], 'product_id' => $_POST['id'], ':quantity' => $_POST['quantity']));
?>
            <script>
                alert('เพิ่มไปยังตะกร้าสินค้าเรียบร้อย');
                window.location = '../../pages/main/?pd=<?= $_POST['id'] ?>';
            </script>
            <?php
        } else {
            $qty = (int)$data['cart_quantity'] + (int)$_POST['quantity'];
    
            if ($qty <= 10) {
                try {
                    $sql_qty = "UPDATE cart SET
                            cart_quantity = :quantity
                            WHERE user_id = :user_id AND product_id = :product_id";
                    $stmt_qty = $connect->prepare($sql_qty);
                    $stmt_qty->execute(array('user_id' => $_SESSION['U_ID'], 'product_id' => $_POST['id'], ':quantity' => $qty));
            ?>
                    <script>
                        alert('เพิ่มไปยังตะกร้าสินค้าเรียบร้อย');
                        window.location = '../../pages/main/?pd=<?= $_POST['id'] ?>';
                    </script>
                <?php
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                    exit();
                }
            } else {
                ?>
                <script>
                    alert('จำกัดการสั่งสินค้าสูงสุด 10 รายการ');
                    window.location = '?id=<?= $_POST['id'] ?>';
                </script>
    <?php
            }
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
        exit();
    }
} else {
    ?>
    <meta http-equiv="refresh" content="0; url=../../pages/auth/login.php">
<?php
}
?>
