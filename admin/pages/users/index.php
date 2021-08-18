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
                <h4>รายชื่อสมาชิก<a href="?users=insert" class="btn btn-sm btn-primary ms-3">เพิ่มข้อมูล</a></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['users']) && $_GET['users'] == "insert") {
                    include_once('./form_insert.php');
                } elseif (isset($_GET['users']) && $_GET['users'] == "update") {
                    include_once('./form_update.php');
                } elseif (isset($_GET['users']) && $_GET['users'] == "delete") {
                    try {
                        $stmt_delete = $connect->prepare("DELETE FROM users WHERE id = :id");
                        $stmt_delete->execute(array(':id' => $_GET['id']));
                        $stmt_delete_wishlist = $connect->prepare("DELETE FROM wishlist WHERE user_id = :id");
                        $stmt_delete_wishlist->execute(array(':id' => $_GET['id']));
                        $stmt_delete_cart = $connect->prepare("DELETE FROM cart WHERE user_id = :id");
                        $stmt_delete_cart->execute(array(':id' => $_GET['id']));
                ?>
                        <script>
                            alert('ลบบัญชีสมาชิกเรียบร้อย');
                            window.location = '../users/';
                        </script>
                    <?php
                    } catch (PDOException $e) {
                        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                        exit();
                    }
                } else {
                    ?>
                    <div class="card h-100">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> รายชื่อสมาชิก
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="usersTable" class="table table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style='white-space:nowrap;'>ชื่อผู้ใช้</th>
                                            <th style='white-space:nowrap;'>ชื่อ - นามสกุล</th>
                                            <th style='white-space:nowrap;'>อีเมลล์</th>
                                            <th style='white-space:nowrap;'>วันที่สมัคร</th>
                                            <th style='white-space:nowrap;'>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require_once('../../services/users/users.php') ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th style='white-space:nowrap;'>ชื่อผู้ใช้</th>
                                            <th style='white-space:nowrap;'>ชื่อ - นามสกุล</th>
                                            <th style='white-space:nowrap;'>อีเมลล์</th>
                                            <th style='white-space:nowrap;'>วันที่สมัคร</th>
                                            <th style='white-space:nowrap;'>จัดการ</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
</main>

<?php include_once('../includes/script.php') ?>
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable();
    })
</script>