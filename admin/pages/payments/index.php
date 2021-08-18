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
                <h4>การชำระเงิน</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> บัญชีธนาคาร
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="banksTable" class="table table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th tyle='white-space:nowrap;'>ธนาคาร</th>
                                        <th tyle='white-space:nowrap;'>สาขา</th>
                                        <th tyle='white-space:nowrap;'>ชื่อบัญชี</th>
                                        <th tyle='white-space:nowrap;'>เลขบัญชี</th>
                                        <th tyle='white-space:nowrap;'>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php require_once('../../services/payments/banks.php')  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th tyle='white-space:nowrap;'>ธนาคาร</th>
                                        <th tyle='white-space:nowrap;'>สาขา</th>
                                        <th tyle='white-space:nowrap;'>ชื่อบัญชี</th>
                                        <th tyle='white-space:nowrap;'>เลขบัญชี</th>
                                        <th tyle='white-space:nowrap;'>จัดการ</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <?php
                if (isset($_GET['payments']) && $_GET['payments'] == "update") {
                    require_once('../../services/payments/edit.php');
                } elseif (isset($_GET['payments']) && $_GET['payments'] == "delete") {
                    try {
                        $sql = "DELETE FROM banks WHERE id = :id";
                        $stmt = $connect->prepare($sql);
                        $stmt->execute(array(':id' => $_GET['id']));
                ?>
                        <script>
                            alert('ลบบัญชีธนาคารเรียบร้อย')
                            location.href = '../payments/'
                        </script>
                    <?php
                    } catch (PDOException $e) {
                        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                        exit();
                    }
                } else {
                    ?>
                    <div class="card">
                        <div class="card-header">
                            เพิ่มบัญชีธนาคาร
                        </div>
                        <div class="card-body">
                            <form action="../../services/payments/insert.php" method="post">
                                <div class="input-group mb-4">
                                    <label for="" class="input-group-text">ธนาคาร</label>
                                    <input type="text" name="bank" class="form-control" placeholder="ธนาคาร" required>
                                </div>
                                <div class="input-group mb-4">
                                    <label for="" class="input-group-text">สาขา</label>
                                    <input type="text" name="office" class="form-control" placeholder="สาขา" required>
                                </div>
                                <div class="input-group mb-4">
                                    <label for="" class="input-group-text">ชื่อบัญชี</label>
                                    <input type="text" name="fullname" class="form-control" placeholder="ชื่อบัญชี" required>
                                </div>
                                <div class="input-group mb-4">
                                    <label for="" class="input-group-text">เลขบัญชี</label>
                                    <input type="text" name="bank_number" class="form-control" placeholder="เลขบัญชี" required>
                                </div>
                                <input type="submit" class="btn btn-success w-100" name="insert" value="เพิ่มข้อมูล">
                            </form>
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
        $('#banksTable').DataTable();
    })
</script>