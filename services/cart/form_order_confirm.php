<?php
require_once('../../admin/services/connect.php');
if (isset($_POST['confirm'])) {
    // Order Code 
    try {
        $text_code = "OR";
        $yearMonth = substr(date("Y") + 543, -2) . date("m");
        $stmt_code = $connect->prepare("SELECT MAX(id) AS lastId FROM orders");
        $stmt_code->execute();
        $data = $stmt_code->fetch();
        $maxId = substr($data['lastId'], -5);
        $maxId = (int)$maxId + 1;
        $maxId = substr("00000" . $maxId, -5);
        $code = $text_code . $yearMonth . $maxId;
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
        exit();
    }

    $_POST['customer'] = $_POST['firstname'] . " " . $_POST['lastname'];
    $_POST['address'] = $_POST['address'] . "/" . $_POST['sub_area'] . "/" . $_POST['area'] . "/" . $_POST['province'] . "/" . $_POST['zipcode'];

    if ($_POST['payment'] == 2) {
        $_POST['status'] = "2";
    } else {
        $_POST['status'] = "1";
    }

    try {
        $sql = "INSERT INTO orders (
                code,
                user_id,
                customer,
                phone,
                address,
                status,
                payment,
                shippingCost,
                total
            ) VALUES (
                :code,
                :user_id,
                :customer,
                :phone,
                :address,
                :status,
                :payment,
                :shippingCost,
                :total
            )";
        $stmt = $connect->prepare($sql);

        if ($stmt->execute(array(
            ":code" => $code,
            ":user_id" => $_SESSION['U_ID'],
            ":customer" => $_POST['customer'],
            ":phone" => $_POST['phone'],
            ":address" => $_POST['address'],
            ":status" => $_POST['status'],
            ":payment" => $_POST['payment'],
            ":shippingCost" => $_POST['shippingCost'],
            ":total" => $_POST['total']
        ))) {
            $sql_cart = "SELECT cart.*, products.product, products.price, products.image ,products.quantity FROM cart
                    LEFT JOIN products ON cart.product_id = products.id 
                    WHERE cart.user_id = :user_id ";
            $stmt_cart = $connect->prepare($sql_cart);
            $stmt_cart->execute(array(':user_id' => $_SESSION['U_ID']));
            $data_cart = $stmt_cart->fetchAll();

            foreach ($data_cart as $add) {
                $sql_add = "INSERT INTO pre_order (
                            code,
                            product,
                            image,
                            quantity,
                            price,
                            total_price
                        ) VALUES (
                            :code,
                            :product,
                            :image,
                            :quantity,
                            :price,
                            :total_price
                        )";
                $stmt_add = $connect->prepare($sql_add);
                $stmt_add->execute(array(
                    ':code' => $code,
                    ':product' => $add['product'],
                    ':image' => $add['image'],
                    ':quantity' => $add['cart_quantity'],
                    ':price' => $add['price'],
                    ':total_price' => $add['price'] * $add['cart_quantity']
                ));

                $qty_total = (int)$add['quantity'] - (int)$add['cart_quantity'];
                $sql_qty = "UPDATE products SET quantity = :qty_total WHERE id = :id";
                $stmt_qty = $connect->prepare($sql_qty);
                $stmt_qty->execute(array(':qty_total' => $qty_total, ':id' => $add['product_id']));

                $Order_Dir = "../../admin/uploads/orders/";
                copy("../../admin/uploads/" . $add['image'], $Order_Dir . "/" . $add['image']);

                $sql_delete = "DELETE FROM cart WHERE user_id = :user_id";
                $stmt_delete = $connect->prepare($sql_delete);
                $stmt_delete->execute(array(':user_id' => $_SESSION['U_ID']));
            }

            try {
                $stmt_line = $connect->prepare("SELECT * FROM shop");
                $stmt_line->execute();
                $line_db = $stmt_line->fetchAll();
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                exit();
            }

            $url        = 'https://notify-api.line.me/api/notify';
            $token      = $line_db[4]['title'];
            $headers    = [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $token
            ];
            $fields     = 'message=มีรายการใหม่ รหัสคำสั่งซื้อ : ' . $code;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);

?>
            <script>
                alert("สั่งซื้อสำเร็จ");
                window.location = "../../pages/main/?account=order&order_details&code=<?= $code ?>";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert(" เกิดข้อผิดพลาด");
                window.location = "../../pages/main/?submit";
            </script>
<?php
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
        exit();
    }
}
?>