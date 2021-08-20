<?php

if (isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            try {
                $sql_check = "SELECT * FROM cart LEFT JOIN products ON cart.product_id = products.id WHERE cart.id = :id";
                $stmt_check = $connect->prepare($sql_check);
                $stmt_check->execute(array(':id' => $_GET['id']));
                $data = $stmt_check->fetch();
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                exit();
            }
            $quantity = (int)$data['cart_quantity'] + 1;
            if ($quantity > (int)$data['quantity']) {
?>
                <script>
                    alert('สินค้ามีจำนวนไม่พอ');
                    window.location = '?cart';
                </script>
                <?php
            } else {
                try {
                    $sql = "UPDATE cart SET
                    cart_quantity = :quantity
                    WHERE id = :id";
                    $stmt = $connect->prepare($sql);
                    $stmt->execute(array(':quantity' => $quantity, ':id' => $_GET['id']));
                ?>
                    <script>
                        window.location = '?cart';
                    </script>
                <?php
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                    exit();
                }
            }
            break;
        case 'del':
            try {
                $sql_check = "SELECT * FROM cart WHERE id = :id";
                $stmt_check = $connect->prepare($sql_check);
                $stmt_check->execute(array(':id' => $_GET['id']));
                $data = $stmt_check->fetch();
                $quantity = (int)$data['cart_quantity'] - 1;
                $sql = "UPDATE cart SET
                 cart_quantity = :quantity
                WHERE id = :id";
                $stmt = $connect->prepare($sql);
                $stmt->execute(array(':quantity' => $quantity, ':id' => $_GET['id']));
                ?>
                <script>
                    window.location = '?cart';
                </script>
            <?php
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                exit();
            }
            break;
        case 'remove':
            try {
                $stmt = $connect->prepare("DELETE FROM cart WHERE id = :id");
                $stmt->execute(array(':id' => $_GET['id']));
            ?>
                <script>
                    window.location = '?cart';
                </script>
<?php
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                exit();
            }
            break;
        case 'empty':
            try {
                $stmt = $connect->prepare("DELETE FROM cart WHERE user_id = :user_id");
                $stmt->execute(array(':user_id' => $_SESSION['U_ID']));
            ?>
                <script>
                    window.location = '?cart';
                </script>
<?php
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                exit();
            }
            break;
    }
}