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
                <h4>หน้าหลัก</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body py-5">
                        <h1><strong>รายการสั่งซื้อ</strong></h1>
                    </div>
                    <div class="card-footer">
                        <a href="../orders/" class="d-flex text-decoration-none text-white">
                            คลิกจัดการระบบ
                            <span class="ms-auto">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-warning text-dark h-100">
                    <div class="card-body py-5">
                        <h1><strong>รายชื่อสมาชิก</strong></h1>
                    </div>
                    <div class="card-footer">
                        <a href="../users/" class="d-flex text-decoration-none text-dark">
                            คลิกจัดการระบบ
                            <span class="ms-auto">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-success text-white h-100">
                    <div class="card-body py-5">
                        <h1><strong>รายการสินค้า</strong></h1>
                    </div>
                    <div class="card-footer">
                        <a href="../products/" class="d-flex text-decoration-none text-white">
                            คลิกจัดการระบบ
                            <span class="ms-auto">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body py-5">
                        <h1><strong>ประเภทสินค้า</strong></h1>
                    </div>
                    <div class="card-footer">
                        <a href="../categories/" class="d-flex text-decoration-none text-white">
                            คลิกจัดการระบบ
                            <span class="ms-auto">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3 ">
                <div class="card bg-light text-dark h-100 shadow-sm">
                    <div class="card-body py-5">
                        <?php
                        try {
                            $sql_sale_days = "SELECT SUM(total) AS sum_totol, DATE_FORMAT(created_at, '%d / %M / %Y') AS created_at, DATE_FORMAT(created_at, '%d%m%Y') AS sale_day
                                FROM orders WHERE status IN (3,6)
                                GROUP BY DATE_FORMAT(created_at, '%d%-%M-%Y')
                                ORDER BY DATE_FORMAT(created_at, '%Y-%m-%d') DESC ";
                            $stmt_sale_days = $connect->prepare($sql_sale_days);
                            $stmt_sale_days->execute();
                            $sale_days = $stmt_sale_days->fetchAll();
                        } catch (PDOException $e) {
                            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                            exit();
                        }
                        ?>
                        <h1>
                            <strong>
                                <?php
                                $i = 0;
                                foreach ($sale_days as $sale) {
                                    $i++;
                                    if ($sale['sale_day'] == date('dmY')) {
                                        echo '฿' .  number_format($sale['sum_totol'], 2);
                                        break;
                                    } else {
                                        echo '฿' .  number_format(0, 2);
                                        if ($i == 1) {
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </strong>
                        </h1>
                    </div>
                    <div class="card-footer">
                        <span>ยอดขายวันนี้</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 ">
                <div class="card bg-light text-dark h-100 shadow-sm">
                    <div class="card-body py-5">
                        <?php
                        try {
                            $sql_sale_mouths = "SELECT total, SUM(total) AS sum_totol,DATE_FORMAT(created_at, '%m/%Y') AS created_at, DATE_FORMAT(created_at, '%m%Y') AS sale_mouth
                                FROM orders WHERE status IN (3,6)
                                GROUP BY DATE_FORMAT(created_at, '%M%-%Y%')
                                ORDER BY DATE_FORMAT(created_at, '%Y-%m-%d') DESC ";
                            $stmt_sale_mouths = $connect->prepare($sql_sale_mouths);
                            $stmt_sale_mouths->execute();
                            $sale_mouths = $stmt_sale_mouths->fetchAll();
                        } catch (PDOException $e) {
                            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                            exit();
                        }
                        ?>
                        <h1>
                            <strong>
                                <?php
                                $i = 0;
                                foreach ($sale_mouths as $sale) {
                                    $i++;
                                    if ($sale['sale_mouth'] == date('mY')) {
                                        echo '฿' .  number_format($sale['sum_totol'], 2);
                                        break;
                                    } else {
                                        echo '฿' .  number_format(0, 2);
                                        if ($i == 1) {
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </strong>
                        </h1>
                    </div>
                    <div class="card-footer">
                        <span>ยอดขายเดือนนี้</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 ">
                <div class="card bg-light text-dark h-100 shadow-sm">
                    <div class="card-body py-5">
                        <?php
                        try {
                            $stmt_orders = $connect->prepare("SELECT COUNT(*) as total_row, DATE_FORMAT(created_at, '%d / %M / %Y') AS created_at, DATE_FORMAT(created_at, '%d%m%Y') AS order_day
                                FROM orders GROUP BY DATE_FORMAT(created_at, '%d%-%M-%Y') ORDER BY DATE_FORMAT(created_at, '%Y-%m-%d') DESC ");
                            $stmt_orders->execute();
                            $orders = $stmt_orders->fetchAll();
                        } catch (PDOException $e) {
                            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                            exit();
                        }
                        ?>
                        <h1>
                            <strong>
                                <?php
                                $i = 0;
                                foreach ($orders as $order) {
                                    $i++;
                                    if ($order['order_day'] == date('dmY')) {
                                        echo $order['total_row'] . ' รายการ';
                                        break;
                                    } else {
                                        echo '0 รายการ';
                                        if ($i == 1) {
                                            break;
                                        }
                                    }
                                }
                                ?>
                                </h2>
                            </strong>
                        </h1>
                    </div>
                    <div class="card-footer">
                        <span>รายการสั่งซื้อวันนี้</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-light text-dark h-100 shadow-sm">
                    <div class="card-body py-5">
                        <?php
                        try {
                            $stmt_users = $connect->prepare("SELECT COUNT(*) as total_row, DATE_FORMAT(created_at, '%M / %Y') AS created_at, DATE_FORMAT(created_at, '%m%Y') AS user_regis
                                FROM users WHERE admin != 1 GROUP BY DATE_FORMAT(created_at, '%M-%Y') ORDER BY DATE_FORMAT(created_at, '%Y-%m-%d') DESC ");
                            $stmt_users->execute();
                            $users = $stmt_users->fetchAll();
                        } catch (PDOException $e) {
                            echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                            exit();
                        }
                        ?>
                        <h1>
                            <strong>
                                <?php
                                $i = 0;
                                foreach ($users as $user) {
                                    $i++;
                                    if ($user['user_regis'] == date('mY')) {
                                        echo $user['total_row'] . ' บัญชี';
                                        break;
                                    } else {
                                        echo '0 บัญชี';
                                        if ($i == 1) {
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </strong>
                        </h1>
                    </div>
                    <div class="card-footer">
                        <span>สมาชิกใหม่เดือนนี้</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> รายงานยอดรายเดือน
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>รายงานยอดรายเดือน</th>
                                        <th>รายงานยอดยอดขาย</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($sale_mouths as $value) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                $m = explode('/', $value['created_at']);
                                                switch($m[0]){
                                                    case "01":
                                                        echo "มกราคม/" . $m[1]; 
                                                        break;
                                                    case "02":
                                                        echo "กุมภาพันธ์/" . $m[1]; 
                                                        break;
                                                    case "03":
                                                        echo "มีนาคม/" . $m[1]; 
                                                        break;
                                                    case "04":
                                                        echo "เมษายน/" . $m[1]; 
                                                        break;
                                                    case "05":
                                                        echo "พฤษภาคม/" . $m[1]; 
                                                        break;
                                                    case "06":
                                                        echo "มิถุนายน/" . $m[1]; 
                                                        break;
                                                    case "07":
                                                        echo "กรกฎาคม/" . $m[1]; 
                                                        break;
                                                    case "08":
                                                        echo "สิงหาคม/" . $m[1]; 
                                                        break;
                                                    case "09":
                                                        echo "กันยายน/" . $m[1]; 
                                                        break;
                                                    case "10":
                                                        echo "ตุลาคม/" . $m[1]; 
                                                        break;
                                                    case "11":
                                                        echo "พฤศจิกายน/" . $m[1]; 
                                                        break;
                                                    case "12":
                                                        echo "ธันวาคม/" . $m[1]; 
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td><?= number_format($value['sum_totol'], 2) ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>รายงานยอดรายเดือน</th>
                                        <th>รายงานยอดยอดขาย</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once('../includes/script.php') ?>
<script src="../../assets/js/script.js"></script>
