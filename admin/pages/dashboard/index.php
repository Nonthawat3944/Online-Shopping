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
                        <h1><strong>รายการสั่งซื้อ</strong></h1>
                    </div>
                    <div class="card-footer">
                        <span>ยอดขายวันนี้</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 ">
                <div class="card bg-light text-dark h-100 shadow-sm">
                    <div class="card-body py-5">
                        <h1><strong>รายการสั่งซื้อ</strong></h1>
                    </div>
                    <div class="card-footer">
                        <span>ยอดขายเดือนนี้</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 ">
                <div class="card bg-light text-dark h-100 shadow-sm">
                    <div class="card-body py-5">
                        <h1><strong>รายการสั่งซื้อวันนี้</strong></h1>
                    </div>
                    <div class="card-footer">
                        <span>รายการสั่งซื้อวันนี้</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 ">
                <div class="card bg-light text-dark h-100 shadow-sm">
                    <div class="card-body py-5">
                        <h1><strong>รายการสั่งซื้อวันนี้</strong></h1>
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
                        <span><i class="bi bi-table me-2"></i></span> Data Table
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 1; $i <= 100; $i++) {
                                    ?>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
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