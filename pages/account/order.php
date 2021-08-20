<?php
if (!isset($_SESSION['U_ID'])) {
?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
<?php
    exit();
}
?>
<?php

if (isset($_GET['order_details'])) {
    include_once('../account/order_details.php');
} else {
?>
    <div class="card card-body shadow-sm">
        <h4 style="color: #0b2d38;">การซื้อของฉัน</h4>
        <hr class="my-2">
        <?php
        try {
            $stmt = $connect->prepare("SELECT * FROM orders  WHERE user_id = :user_id ORDER BY created_at DESC");
            $stmt->execute(array(':user_id' => $_SESSION['U_ID']));
            $orders = $stmt->fetchAll();
            $row_o = $stmt->rowCount();
        } catch (PDOException $e) {
            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
            exit();
        }
        ?>
        <div class="order-list">
            <div class="table-responsive">
                <table id="ordersTable" class="table">
                    <thead>
                        <tr>
                            <th>รหัสคำสั่งซื้อ</th>
                            <th>รายการสินค้า</th>
                            <th>ราคาทั้งหมด</th>
                            <th>วันที่สั่งซื้อ</th>
                            <th>สถานะ</th>
                            <th>ดูรายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($orders as $order) {
                        ?>
                            <tr>
                                <th style="white-space:nowrap;"><?= $order['code'] ?></th>
                                <td style="white-space:nowrap;">
                                    <?php
                                    try {
                                        $stmt_order = $connect->prepare("SELECT * FROM pre_order WHERE code = :code");
                                        $stmt_order->execute(array(':code' => $order['code']));
                                        $pre_order = $stmt_order->fetchAll();
                                        $row_pre_order = $stmt_order->rowCount();
                                    } catch (PDOException $e) {
                                        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                                        exit();
                                    }

                                    $total_price = 0;
                                    foreach ($pre_order as $price) {
                                        $total_price += $price['total_price'];
                                    }
                                    echo $row_pre_order;
                                    ?>
                                </td>
                                <td style="white-space:nowrap;">฿<?= number_format($total_price  + $order['shippingCost'], 2) ?></td>
                                <td style="white-space:nowrap;"><?= date("d/m/Y/เวลา H:i น.", strtotime($order['created_at'])) ?></td>
                                <td style="white-space:nowrap;">
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
                                </td>
                                <td style="white-space:nowrap;" class="text-center"><a href="?account=order&order_details&code=<?= $order['code'] ?>" class="btn btn-info btn-sm">ดูรายละเอียด</a></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="order-list-app">
            <?php
            foreach ($orders as $order) {
            ?>
                <div class="card card-body shadow-sm mb-1">
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between align-items-center">รหัสคำสั่งซื้อ : <?= $order['code'] ?> <a href="?account=order&order_details&code=<?= $order['code'] ?>" class="btn btn-sm btn-info">ดูรายละเอียด</a></li>
                        <hr class="my-1">
                        <li>รายการสินค้า :
                            <?php
                            try {
                                $stmt_order = $connect->prepare("SELECT * FROM pre_order WHERE code = :code");
                                $stmt_order->execute(array(':code' => $order['code']));
                                $pre_order = $stmt_order->fetchAll();
                                $row_pre_order = $stmt_order->rowCount();
                            } catch (PDOException $e) {
                                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                                exit();
                            }

                            $total_price = 0;
                            foreach ($pre_order as $price) {
                                $total_price += $price['total_price'];
                            }
                            echo $row_pre_order;
                            ?>
                        </li>
                        <li>ราคาทั้งหมด : ฿<?= number_format($total_price  + $order['shippingCost'], 2) ?></li>
                        <li>วันที่สั่งซื้อ : <?= date("d/m/Y/เวลา H:i น.", strtotime($order['created_at'])) ?></li>
                        <li>สถานะ :
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
                        </li>
                    </ul>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
<?php
}

?>