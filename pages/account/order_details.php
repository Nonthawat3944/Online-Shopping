<?php
if (!isset($_SESSION['U_ID'])) {
?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
<?php
    exit();
}
?>
<?php
try {
    $stmt = $connect->prepare("SELECT * FROM  orders WHERE code = :code");
    $stmt->execute(array(':code' => $_GET['code']));
    $order = $stmt->fetch();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
?>
<div class="card card-body shadow-sm">
    <div class="order-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4 style="color: #0b2d38;">รหัสคำสั่งซื้อ : <?= $order['code'] ?></h4>
            <div class="text-status-date text-end">
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
                    <a href="?order=cancel&id=<?= $order['id'] ?>&code=<?= $order['code'] ?>" class="ms-2 btn btn-sm btn-danger <?= $order['status'] == 5 || $order['status'] == 3 || $order['status'] == 4 || $order['status'] == 6 ? 'disabled' : '' ?>" onclick="return confirm('ต้องการยกเลือกคำสั่งซื้อนี้ ? ')">ยกเลิกคำสั่งซื้อ</a>
                </strong>
                <span>วันที่สั่งซื้อ : <?= date("d / m / Y / เวลา H:i น.", strtotime($order['created_at'])) ?></span>
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
            <a href="?order=cancel&id=<?= $order['id'] ?>&code=<?= $order['code'] ?>" class="btn btn-sm btn-danger <?= $order['status'] == 5 || $order['status'] == 3 || $order['status'] == 4 || $order['status'] == 6 ? 'disabled' : '' ?>" onclick="return confirm('ต้องการยกเลือกคำสั่งซื้อนี้ ? ')">ยกเลิกคำสั่งซื้อ</a>
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
                                <img src="../../admin/uploads/<?= $value['image'] ?>" class="d-block mx-auto rounded">
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
                                <img src="../../admin/uploads/<?= $value['image'] ?>" class="d-block mx-auto rounded w-100">
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
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#paymentModal">อัพโหลด</a>
                            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="../../services/account/order_details_upload.php" method="POST" id="form_checkbox" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                            <input type="hidden" name="code" value="<?= $order['code'] ?>">
                                            <input type="hidden" name="image_db" value="<?= $order['image_payment'] ?>">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="paymentModalLabel">อัพโหลดหลักฐานการชำระเงิน</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                try {
                                                    $stmt_banks = $connect->prepare("SELECT * FROM  banks ORDER BY id ASC");
                                                    $stmt_banks->execute();
                                                    $banks = $stmt_banks->fetchAll();
                                                } catch (PDOException $e) {
                                                    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                                                    exit();
                                                }
                                                ?>
                                                <ul class="payment-upload">
                                                    <li>
                                                        <label for="bank">เลือกบัญชีธนาคารที่คุณชำระเงิน</label>
                                                        <br>
                                                        <?php
                                                        foreach ($banks as $bank) {
                                                        ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input checkbox_input" type="checkbox" name="bank_id" value="<?= $bank['id'] ?>" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    ธนาคาร<?= $bank['bank'] ?> / สาขา <?= $bank['office'] ?> / เลขบัญชี : <?= $bank['bank_number'] ?> / ชื่อบัญชี : <?= $bank['fullname'] ?>
                                                                </label>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </li>

                                                    <li>
                                                        <span class="text-success">ชำระเงินผ่านบัญชีธนาคารที่คุณเลือกและทำการอัพโหลดหลักฐานการโอนที่ด้านล่างนี้</span>
                                                    </li>
                                                    <li>
                                                        <label for="image_payment">หลักฐานการชำระเงิน</label>
                                                        <input type="file" name="image_payment" class="form-control" required>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                <button type="submit" class="btn btn-primary" name="upload">อัพโหลด</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                <img src="../../admin/uploads/payment/<?= $order['image_payment'] ?>" class="d-block mx-auto rounded w-100">
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