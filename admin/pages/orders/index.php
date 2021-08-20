<?php
require_once('../../services/connect.php');
require_once('../../services/session.php');

?>
<?php include_once('../includes/header.php') ?>
<?php include_once('../includes/navbar.php') ?>
<?php include_once('../includes/sidebar.php') ?>

<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>รายการสั่งซื้อ</h4>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($_GET['order']) && $_GET['order'] == "view") {
                include_once('./order_details.php');
            } else if (isset($_GET['status'])) {
                switch ($_GET['status']) {
                    case 'submit':
                        try {
                            $sql = "UPDATE orders SET status = 4 WHERE id = :id";
                            $stmt = $connect->prepare($sql);
                            $stmt->execute(array(':id' => $_GET['id']));
            ?>
                            <script>
                                alert('เปลี่ยนสถานะเป็นกำลังจัดส่งเรียบร้อย');
                                location.href = './?order=view&id=<?= $_GET['id'] ?>'
                            </script>
                        <?php
                        } catch (PDOException $e) {
                            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                            exit();
                        }
                        break;
                    case 'confirm':
                        try {
                            $sql = "UPDATE orders SET status = 6 WHERE id = :id";
                            $stmt = $connect->prepare($sql);
                            $stmt->execute(array(':id' => $_GET['id']));
                        ?>
                            <script>
                                alert('ยืนยันการจัดส่งเรียบร้อย');
                                location.href = './?order=view&id=<?= $_GET['id'] ?>'
                            </script>
                <?php
                        } catch (PDOException $e) {
                            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                            exit();
                        }
                        break;
                }
            } else {
                ?>
                <div class="col-md-12">
                    <div class="card h-100">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> รายการสั่งซื้อ
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="ordersTable" class="table table-striped data-table">
                                    <thead>
                                        <th style="white-space:nowrap;">รหัสคำสั่งซื้อ</th>
                                        <th style="white-space:nowrap;">ชื่อผู้รับ</th>
                                        <th style="white-space:nowrap;">จำนวนรายการสินค้า</th>
                                        <th style="white-space:nowrap;">ราคาทั้งหมด</th>
                                        <th style="white-space:nowrap;">สถานะ</th>
                                        <th style="white-space:nowrap;">วันที่</th>
                                        <th style="white-space:nowrap;">ดูรายละเอียด</th>
                                    </thead>
                                    <tbody>
                                        <?php require_once('../../services/orders/orders.php') ?>
                                    </tbody>
                                    <thead>
                                        <th style="white-space:nowrap;">รหัสคำสั่งซื้อ</th>
                                        <th style="white-space:nowrap;">ชื่อผู้รับ</th>
                                        <th style="white-space:nowrap;">จำนวนรายการสินค้า</th>
                                        <th style="white-space:nowrap;">ราคาทั้งหมด</th>
                                        <th style="white-space:nowrap;">สถานะ</th>
                                        <th style="white-space:nowrap;">วันที่</th>
                                        <th style="white-space:nowrap;">ดูรายละเอียด</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ?>

        </div>
    </div>
</main>
<?php include_once('../includes/script.php') ?>
<script src="../../assets/js/script.js"></script>
<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable();
    })
</script>