<?php
try {
    $sql = "SELECT cart.*, products.product, products.price, products.image FROM cart
                        LEFT JOIN products ON cart.product_id = products.id 
                        WHERE cart.user_id = :user_id 
                        ORDER BY products.product ASC ";
    $stmt = $connect->prepare($sql);
    $stmt->execute(array(':user_id' => $_SESSION['U_ID']));
    $carts = $stmt->fetchAll();
    $row = $stmt->rowCount();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
?>
<div class="row">
    <div class="col-md-7">
        <div class="cart-list-form-order">
            <?php
            $total_price = 0;
            foreach ($carts as $cart) {
                $sum_price =  $cart['price'] * $cart['cart_quantity'];
            ?>
                <div class="cart-item card card-body shadow-sm mb-1">
                    <div class="d-flex">
                        <div class="col-sm-2 cart-item-image">
                            <img src="../../admin/uploads/<?= $cart['image'] ?>" class="d-block mx-auto rounded">
                        </div>
                        <div class="col-sm-10 cart-item-details">
                            <div class="cart-item-title">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <strong>
                                            <?= $cart['product'] ?>
                                        </strong>
                                    </li>
                                    <hr>
                                    <li class="mb-2 row">
                                        <div class="col-12 col-md-6">
                                            <strong>
                                                <h4 class="text-primary">฿<?= number_format($cart['price'], 2) ?></h4>
                                            </strong>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <span>จำนวน : <?= $cart['cart_quantity'] ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $total_price += $sum_price;
            }
            ?>
        </div>
        <div class="cart-list-app">
            <?php
            foreach ($carts as $cart) {
            ?>
                <div class="cart-item-app card card-body shadow-sm mb-1">
                    <div class="row">
                        <div class="cart-item-image-app col-3">
                            <img src="../../admin/uploads/<?= $cart['image'] ?>" class="d-block mx-auto rounded w-100">
                        </div>
                        <div class="cart-item-details-app col-9">
                            <div class="w-100" style="line-height: 12px;"><small class="text-dark"><?= $cart['product'] ?></small></div>
                            <b class="text-primary">฿<?= number_format($cart['price'], 2) ?></b>
                            <span>จำนวน : <?= $cart['cart_quantity'] ?></span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card-address mb-1">
            <div class="card card-body">
                <h5>ที่อยู่ในการจัดส่ง</h5>
                <hr class="my-2">
                <form action="../../services/cart/form_order_confirm.php" method="post">
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control me-3" placeholder="ขื่อ..." value="<?= $_SESSION['U_FIRSTNAME'] ?>" name="firstname" required>
                        <input type="text" class="form-control me-3" placeholder="นามสกุล..." value="<?= $_SESSION['U_LASTNAME'] ?>" name="lastname" required>
                    </div>
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control me-3" placeholder="เบอร์โทรศัพท์.." name="phone" required>
                    </div>
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control me-3" placeholder="ที่อยู่..." name="address" required>
                    </div>
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control me-3" placeholder="ตำบล..." name="sub_area" required>
                        <input type="text" class="form-control me-3" placeholder="อำเภอ..." name="area" required>
                    </div>
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control me-3" placeholder="จังหวัด..." name="province" required>
                        <input type="text" class="form-control me-3" placeholder="รหัสไปรษณีย์..." name="zipcode" required>
                    </div>
            </div>
        </div>
        <div class="card-total">
            <div class="card card-body">
                <table class="table">
                    <?php
                    try {
                        $stmt_shop = $connect->prepare("SELECT * FROM shop WHERE id = 1");
                        $stmt_shop->execute();
                        $shippingCost = $stmt_shop->fetch();
                    } catch (PDOException $e) {
                        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                        exit();
                    }
                    $shipping_cost = (int)$shippingCost['title'];
                    ?>
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">ยอดรวมทั้งสิ้น</th>
                        </tr>
                    </thead>
                    <tr>
                        <td style="white-space:nowrap;">จำนวนสินค้า</td>
                        <td style="white-space:nowrap;" class="text-end"><?= count($carts) ?></td>
                    </tr>
                    <tr>
                        <td style="white-space:nowrap;">ค่าจัดส่ง</td>
                        <td style="white-space:nowrap;" class="text-end">฿<?= number_format($shipping_cost, 2) ?></td>
                        <input type="hidden" name="shippingCost" value="<?= $shipping_cost ?>">
                    </tr>
                    <tr>
                        <td style="white-space:nowrap;">ราคาสินค้าทั้งหมด</td>
                        <td style="white-space:nowrap;" class="text-end">฿<?= number_format($total_price, 2) ?></td>
                    </tr>
                    <tr>
                        <th style="white-space:nowrap;">ยอดรวมทั้งสิ้น</th>
                        <th style="white-space:nowrap;" class="text-end">฿<?= number_format($total_price + $shipping_cost, 2) ?></th>
                        <input type="hidden" name="total" value="<?= $total_price + $shipping_cost ?>">
                    </tr>
                    <tr>
                        <th style="white-space:nowrap;">วิธีการชำระเงิน</th>
                        <th style="white-space:nowrap;">
                            <select name="payment" id="payment" class="form-select" required>
                                <option value="" selected disabled>เลือกช่องทางการชำระเงิน
                                </option>
                                <option value="1">ชำระเงินปลายทาง</option>
                                <option value="2">ชำระเงินผ่านบัญชีธนาคาร</option>
                            </select>
                        </th>
                    </tr>
                </table>
                <input type="submit" name="confirm" class="btn btn-success" value="ยืนยันการสั่งซื้อ">
            </div>
        </div>
        </form>
    </div>
</div>