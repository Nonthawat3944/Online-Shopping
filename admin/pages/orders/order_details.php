<?php
try {
    $stmt = $connect->prepare("SELECT * FROM  orders WHERE id = :id");
    $stmt->execute(array(':id' => $_GET['id']));
    $order = $stmt->fetch();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
?>
<div class="col-md-12">
    <div class="card card-body shadow-sm">
        <div class="order-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 style="color: #0b2d38;">รหัสคำสั่งซื้อ : <?= $order['code'] ?></h4>
                <div class="status-action d-flex justify-content-between align-items-center">
                    <div class="text-status-date text-end pe-3" style="border-right: 2px solid gray;">
                        <strong class="d-block">สถานะ :
                            <?php
                            if ($order['status'] == 2) {
                                echo '<span class="text-danger">รอชำระเงิน</span>';
                            } else if ($order['status'] == 1) {
                                echo '<span class="text-warning">รอการตรวจสอบ</span>';
                            } else if ($order['status'] == 3) {
                                echo '<span class="text-success">ชำระเงินแล้ว</span>';
                            } else if ($order['status'] == 4) {
                                echo '<span class="text-info">กำลังจัดส่ง</span>';
                            } else if ($order['status'] == 5) {
                                echo '<span class="text-danger">ยกเลิกแล้ว</span>';
                            } else if ($order['status'] == 6) {
                                echo '<span class="text-success">จัดส่งสินค้าแล้ว</span>';
                            }
                            ?>
                        </strong>
                        <span>วันที่สั่งซื้อ : <?= date("d / m / Y / เวลา H:i น.", strtotime($order['created_at'])) ?></span>
                    </div>
                    <div class="status-btn ps-3">
                        <?php
                        if ($order['status'] == 4) {
                        ?>
                            <a href="?status=confirm&id=<?= $order['id'] ?>" class="btn btn-success" onclick="return confirm('จัดส่งสินค้าแล้วใช่มั้ย ? ')">ยืนยันการจัดส่ง</a>
                        <?php
                        } else {
                        ?>
                            <a href="?status=submit&id=<?= $order['id'] ?>" class="btn btn-info <?= $order['status'] == 5 || $order['status'] == 4 || $order['status'] == 6 ? 'disabled' : '' ?>">จัดส่งสินค้า</a>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-header-app">
            <h4 style="color: #0b2d38;" class="mb-0">รหัสคำสั่งซื้อ : <?= $order['code'] ?></h4>
            <div class="text-status-date">
                <strong class="d-block">สถานะ :
                    <?php
                    if ($order['status'] == 2) {
                        echo '<span class="text-danger">รอชำระเงิน</span>';
                    } else if ($order['status'] == 1) {
                        echo '<span class="text-warning">รอการตรวจสอบ</span>';
                    } else if ($order['status'] == 3) {
                        echo '<span class="text-success">ชำระเงินแล้ว</span>';
                    } else if ($order['status'] == 4) {
                        echo '<span class="text-info">กำลังจัดส่ง</span>';
                    } else if ($order['status'] == 5) {
                        echo '<span class="text-danger">ยกเลิกแล้ว</span>';
                    } else if ($order['status'] == 6) {
                        echo '<span class="text-success">จัดส่งสินค้าแล้ว</span>';
                    }
                    ?>
                </strong>
                <span>วันที่สั่งซื้อ : <?= date("d / m / Y / เวลา H:i น.", strtotime($order['created_at'])) ?></span>
                <?php
                if ($order['status'] == 4) {
                ?>
                    <a href="?status=confirm&id=<?= $order['id'] ?>" class="btn btn-success" onclick="return confirm('จัดส่งสินค้าแล้วใช่มั้ย ? ')">ยืนยันการจัดส่ง</a>
                <?php
                } else {
                ?>
                    <a href="?status=submit&id=<?= $order['id'] ?>" class="btn btn-info <?= $order['status'] == 5 || $order['status'] == 4 || $order['status'] == 6 ? 'disabled' : '' ?>">จัดส่งสินค้า</a>
                <?php
                }

                ?>
            </div>
        </div>
        <hr class="my-2">
        <div class="row">
            <div class="col-12">
                <div class="card card-body mb-1">
                    <h5>ที่อยู่ในการจัดส่ง</h5>
                    <hr class="my-2">
                    <ul>
                        <li>ผู้รับ : <?= $order['customer'] ?></li>
                        <li>เบอร์โทรศัพท์ : <?= $order['phone'] ?></li>
                        <li>ที่อยู่ : <?= $order['address'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="cart-list">
                    <?php
                    try {
                        $stmt_pre_order = $connect->prepare("SELECT * FROM  pre_order WHERE code = :code");
                        $stmt_pre_order->execute(array(':code' => $order['code']));
                        $pre_order = $stmt_pre_order->fetchAll();
                    } catch (PDOException $e) {
                        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                        exit();
                    }
                    $total_price = 0;
                    foreach ($pre_order as $value) {
                    ?>
                        <div class="cart-item card card-body shadow-sm mb-1">
                            <div class="d-flex">
                                <div class="col-sm-2 cart-item-image">
                                    <img src="../../uploads/<?= $value['image'] ?>" class="d-block mx-auto rounded">
                                </div>
                                <div class="col-sm-10 cart-item-details pe-2">
                                    <div class="cart-item-title">
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <strong>
                                                    <?= $value['product'] ?>
                                                </strong>
                                            </li>
                                            <hr>
                                            <li class="mb-2 row">
                                                <div class="col-12 col-md-6">
                                                    <strong>
                                                        <h4 class="text-primary">฿<?= number_format($value['price'], 2) ?></h4>
                                                    </strong>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <span>จำนวน : <?= $value['quantity'] ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $total_price += (int)$value['total_price'];
                    }
                    ?>
                </div>
                <div class="cart-list-app">
                    <?php
                    foreach ($pre_order as $value) {
                    ?>
                        <div class="cart-item-app card card-body shadow-sm mb-1">
                            <div class="row">
                                <div class="cart-item-image-app col-3">
                                    <img src="../../uploads/<?= $value['image'] ?>" class="d-block mx-auto rounded w-100">
                                </div>
                                <div class="cart-item-details-app col-9">
                                    <div class="w-100" style="line-height: 12px;"><small class="text-dark"><?= $value['product'] ?></small></div>
                                    <b class="text-primary">฿<?= number_format($value['price'], 2) ?></b>
                                    <span>จำนวน : <?= $value['quantity'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card-total mb-1">
                    <div class="card card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">ยอดรวมทั้งสิ้น</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="white-space:nowrap;">จำนวนสินค้า</td>
                                    <td style="white-space:nowrap;" class="text-end"><?= count($pre_order) ?></td>
                                </tr>
                                <tr>
                                    <td style="white-space:nowrap;">ค่าจัดส่ง</td>
                                    <td style="white-space:nowrap;" class="text-end">฿<?= number_format($order['shippingCost'], 2) ?></td>
                                </tr>
                                <tr>
                                    <td style="white-space:nowrap;">ราคาสินค้าทั้งหมด</td>
                                    <td style="white-space:nowrap;" class="text-end">฿<?= number_format($total_price, 2) ?></td>
                                </tr>
                                <tr>
                                    <th style="white-space:nowrap;">ยอดรวมทั้งสิ้น</th>
                                    <th style="white-space:nowrap;" class="text-end">฿<?= number_format($total_price + $order['shippingCost'], 2) ?></th>
                                </tr>
                                <tr>
                                    <th>วิธีการชำระเงิน</th>
                                    <th class="text-end"><span class="text-success"><?= $order['payment'] == 2 ? 'ชำระเงินผ่านบัญชีธนาคาร' : 'ชำระเงินปลายทาง' ?></span></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                if ($order['payment'] == 2) {
                ?>
                    <div class="card-payment">
                        <div class="card card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>
                                    หลักฐานการชำระเงิน
                                </strong>
                            </div>
                            <hr class="my-2">
                            <?php
                            if ($order['image_payment'] == NULL) {
                            ?>
                                <div class="error alert alert-danger text-center mb-0">
                                    <span>ยังไม่ได้อัพโหลดหลักฐานการชำระเงิน</span>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="payment-image">
                                    <img src="../../uploads/payment/<?= $order['image_payment'] ?>" class="d-block mx-auto rounded w-100">
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>