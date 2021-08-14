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
                <h4>ประเภทสินค้า</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> ประเภทสินค้า
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="categoriesTable" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ประเภทสินค้า</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php require_once('../../services/categories/categories.php')  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>ประเภทสินค้า</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <?php
                if (isset($_GET['categories']) && $_GET['categories'] == "update") {
                    require_once('../../services/categories/edit.php');
                } elseif (isset($_GET['categories']) && $_GET['categories'] == "delete") {

                } else {
                ?>
                    <div class="card">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-plus-circle-fill"></i></span>
                            เพิ่มประเภทสินค้า
                        </div>
                        <div class="card-body">
                            <form action="../../services/categories/insert.php" method="post">
                                <div class="input-group mb-3">
                                    <label for="" class="input-group-text">ประเภทสินค้า</label>
                                    <input type="text" name="category" class="form-control" placeholder="ประเภทสินค้า" required>
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
        $('#categoriesTable').DataTable();
    })
</script>