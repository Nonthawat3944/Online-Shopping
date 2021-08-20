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
            $stmt = $connect->prepare("SELECT * FROM orders  WHERE user_id = :user_id ORDER BY code ASC");
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
                        for ($i = 1; $i <= 1; $i++) {
                        ?>
                            <tr>
                                <th>OR640800001</th>
                                <td>2</td>
                                <td>฿80,050.00</td>
                                <td>2021-08-11 08:11:17</td>
                                <td>
                                    <span class="text-warning">รอการตรวจสอบ</span>
                                </td>
                                <td>
                                    <a href="?account=order&order_details=1" class="btn btn-sm btn-info">ดูรายละเอียด</a>
                                </td>
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
            for ($i = 1; $i <= 12; $i++) {
            ?>
                <div class="card card-body shadow-sm mb-1">
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between align-items-center">รหัสคำสั่งซื้อ : OR640800001 <a href="?account=order&order_details=1" class="btn btn-sm btn-info">ดูรายละเอียด</a></li>
                        <hr class="my-1">
                        <li>รายการสินค้า : 2</li>
                        <li>ราคาทั้งหมด : ฿80,050.00</li>
                        <li>วันที่สั่งซื้อ : 2021-08-11 08:11:17</li>
                        <li>สถานะ : <span class="text-warning">รอการตรวจสอบ</span></li>
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