<?php
try {
    $stmt = $connect->prepare("SELECT * FROM orders");
    $stmt->execute();
    $orders = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}

foreach ($orders as $order) {
?>
    <tr>
        <th style="white-space:nowrap;" ><?= $order['code'] ?></th>
        <td style="white-space:nowrap;" ><?= $order['customer'] ?></td>
        <td style="white-space:nowrap;" >
            <?php
            try {
                $stmt_order = $connect->prepare("SELECT * FROM pre_order  WHERE code = :code");
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
        <td style="white-space:nowrap;"><?= date("d/m/Y/เวลา H:i น.", strtotime($order['created_at'])) ?></td>
        <td style="white-space:nowrap;"><a href="?order=view&id=<?= $order['id'] ?>" class="btn btn-info btn-sm">ดูรายละเอียด</a></td>
    </tr>
<?php
}
?>