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
                <h4>รายการสินค้า<a href="?products=insert" class="btn btn-sm btn-primary ms-3">เพิ่มข้อมูล</a></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <?php
                if (isset($_GET['products']) && $_GET['products'] == "insert") {
                    include_once('./form_insert.php');
                } elseif (isset($_GET['products']) && $_GET['products'] == "view") {
                    include_once('./product_view.php');
                } elseif (isset($_GET['products']) && $_GET['products'] == "update") {
                    include_once('./form_update.php');
                    include_once('./product_view.php');
                } elseif (isset($_GET['products']) && $_GET['products'] == "delete") {
                    unlink('../../uploads/' . "/" . $_GET['image']);
                    try {
                        $sql = "DELETE FROM products WHERE id = :id";
                        $stmt = $connect->prepare($sql);
                        $stmt->execute(array(':id' => $_GET['id']));
                ?>
                        <script>
                            alert('ลบสินค้าเรียบร้อย')
                            location.href = '../products/'
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
                            <span><i class="bi bi-table me-2"></i></span> รายการสินค้า
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="categoriesTable" class="table table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th style='white-space:nowrap;'>รหัสสินค้า</th>
                                            <th style='white-space:nowrap;'>ประเภทสินค้า</th>
                                            <th style='white-space:nowrap;'>สินค้า</th>
                                            <th style='white-space:nowrap;'>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require_once('../../services/products/products.php') ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style='white-space:nowrap;'>รหัสสินค้า</th>
                                            <th style='white-space:nowrap;'>ประเภทสินค้า</th>
                                            <th style='white-space:nowrap;'>สินค้า</th>
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
        $('#categoriesTable').DataTable();
    });
    CKEDITOR.replace('details');
</script>