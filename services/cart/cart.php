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
    <div class="col-md-8">
        <?php
        if ($row < 1) {
        ?>
            <div class="alert alert-danger text-center" role="alert">
                <strong>ยังไม่มีสินค้าในตะกร้า</strong>
            </div>
        <?php
        } else {
        ?>
            <div class="cart-list">
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
                                                <a href="?pd=<?= $cart['product_id'] ?>" class="text-decoration-none text-dark"><?= $cart['product'] ?></a>
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
                                                <div class="input-group input-group-sm w-50">
                                                    <a href="?cart=del&id=<?= $cart['id'] ?>" style="width: 30%;" type="button" class="btn btn-danger <?= $cart['cart_quantity'] <= 1 ? 'disabled' : '' ?>">-</a>
                                                    <input style="width: 40%;" type="text" name="quantity" class="form-control px-0 text-center" value="<?= $cart['cart_quantity'] ?>" readonly>
                                                    <a href="?cart=add&id=<?= $cart['id'] ?>" style="width: 30%;" type="button" class="btn btn-success <?= $cart['cart_quantity'] >= 10  ? 'disabled' : '' ?>">+</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="?cart=remove&id=<?= $cart['id'] ?>" onclick="return confirm('ต้องการลบออกจากตะกร้าสินค้า ? ')" class="btn btn-danger">
                                                <i class="bi bi-trash"></i> นำออก</a>
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
                        <a href="?pd=<?= $cart['product_id'] ?>" class="text-decoration-none">
                            <div class="row mb-2">
                                <div class="cart-item-image-app col-3">
                                    <img src="../../admin/uploads/<?= $cart['image'] ?>" class="d-block mx-auto rounded w-100">
                                </div>
                                <div class="cart-item-details-app col-9">
                                    <div class="w-100" style="line-height: 12px;"><small class="text-dark"><?= $cart['product'] ?></small></div>
                                    <b class="text-primary">฿<?= number_format($cart['price'], 2) ?></b>
                                </div>
                            </div>
                        </a>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group input-group-sm w-100">
                                    <a href="?cart=del&id=<?= $cart['id'] ?>" style="width: 30%;" type="button" class="btn btn-danger <?= $cart['cart_quantity'] <= 1 ? 'disabled' : '' ?>">-</a>
                                    <input style="width: 40%;" type="text" name="quantity" class="form-control px-0 text-center" value="<?= $cart['cart_quantity'] ?>" readonly>
                                    <a href="?cart=add&id=<?= $cart['id'] ?>" style="width: 30%;" type="button" class="btn btn-success <?= $cart['cart_quantity'] >= 10  ? 'disabled' : '' ?>">+</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <a href="?cart=remove&id=<?= $cart['id'] ?>" onclick="return confirm('ต้องการลบออกจากตะกร้าสินค้า ? ')" class="btn btn-sm btn-outline-danger w-100"><i class="bi bi-trash"></i> นำออก</a></a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="col-md-4">
        <div class="card-total">
            <div class="card card-body shadow-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">ยอดรวมทั้งสิ้น</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>รายการสินค้า</td>
                        <td class="text-end"><?= count($carts) ?></td>
                    </tr>
                    <tr>
                        <td>ราคาทั้งหมด</td>
                        <td class="text-end">฿<?= number_format($total_price, 2) ?></td>
                    </tr>
                </table>
                <a href="?submit" class="btn btn-success">สั่งซื้อสินค้า</a>
            </div>
        </div>
    </div>
    <hr class="my-3">
    <div class="col">
        <a href="../main/" class="btn btn-warning">กลับไปซื้อสินค้า</a>
    </div>
</div>
