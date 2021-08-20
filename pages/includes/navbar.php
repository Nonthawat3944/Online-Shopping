<header class="fixed-top">
    <nav class="navbar navbar-expand-sm shadow-sm py-0">
        <div class="container-xxl">
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item d-flex">
                    <a class="text-white nav-link nav-hover active me-2" aria-current="page" href="../../">หน้าแรก</a>
                    <a class="text-white nav-link nav-hover" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">ติดต่อเรา</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-lg-0 justify-content-end">
                <?php
                if (isset($_SESSION['U_ID'])) {
                ?>
                    <li class="nav-item d-flex">
                        <a class="user-menu-app text-white nav-link nav-hover me-2" href="#" data-bs-toggle="modal" data-bs-target="#userMenuModal"><?= $_SESSION['U_USERNAME'] ?></a>
                        <div class="user-menu dropdown me-2">
                            <a class="nav-link nav-hover dropdown-toggle text-white" href="#" id="user_data" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['U_USERNAME'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="user_data">
                                <?= $_SESSION['U_ROLE'] === true ? '<li><a class="dropdown-item" href="../../admin/">จัดการร้านค้า</a></li>' : '' ?>
                                <li><a class="dropdown-item" href="?account">บัญชีผู้ใช้</a></li>
                                <li><a class="dropdown-item" href="?account=order">การซื้อของฉัน</a></li>
                                <li><a class="dropdown-item" href="?cart">ตะกร้าสินค้า</a></li>
                                <li><a class="dropdown-item" href="?account=wishlist">สินค้าที่ถูกใจ</a></li>
                                <li><a class="dropdown-item text-danger" href="?logout" onclick="return confirm('ต้องการออกจากระบบ ?')">ออกจากระบบ</a></li>
                            </ul>
                        </div>
                        <span class="nav-link me-2 text-white">|</span>
                        <a class="nav-link nav-hover text-white" href="?logout" onclick="return confirm('ต้องการออกจากระบบ ?')">ออกจากระบบ</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item d-flex">
                        <a class="nav-link nav-hover me-2 text-white" href="../../pages/auth/register.php">ลงทะเบียน</a>
                        <span class="nav-link me-2 text-white">|</span>
                        <a class="nav-link nav-hover text-white" href="../../pages/auth/login.php">เข้าสู่ระบบ</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>
    <?php
    function removeNavMain($data)
    {
        $array = explode('/', $_SERVER['REQUEST_URI']);
        $key = array_search("pages", $array);
        $name = $array[$key + 1];
        return $name === $data ? true : false;
    }
    if (removeNavMain('auth') == false) {
    ?>
        <!-- Responsive Navbar Top for mobile  -->
        <section class="shadow navbar-app">
            <div class="container-xxl py-1">
                <div class="row">
                    <div class="col-9 text-start my-auto">
                        <h6 class="mb-0"><a class="text-decoration-none text-white" href="../../"><?= $shop_db[1]['title'] ?></a></h6>
                    </div>
                    <div class="col-3 px-0">
                        <button class="btn btn-sm btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
                            <i class="bi bi-search me-2"></i>ค้นหา
                        </button>
                    </div>
                    <div class="collapse my-3" id="collapseSearch">
                        <div class="card card-body p-1">
                            <form method="GET" class="d-flex w-100">
                                <input class="form-control me-2" name="search" type="search" placeholder="ค้นหาสินค้า" aria-label="Search">
                                <button class="btn btn-success" type="submit">ค้นหา</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="shadow navbar-main">
            <div class="container-xxl py-3">
                <div class="row">
                    <div class="col-lg-3 text-lg-start text-center">
                        <h3><a class="text-decoration-none text-white" href="../../"><?= $shop_db[1]['title'] ?></a></h3>
                    </div>
                    <div class="col-lg-5">
                        <form method="GET" class="d-flex w-100">
                            <input class="form-control me-2" name="search" type="search" placeholder="ค้นหาสินค้า" aria-label="Search">
                            <button class="btn btn-success" type="submit">ค้นหา</button>
                        </form>
                    </div>
                    <div class="col-lg-4 text-lg-end text-center">
                        <div class="dropdown me-2 d-inline">
                            <a class="btn btn-info dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                ประเภทสินค้า
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php require_once('../../services/categories/categories_navbar.php') ?>
                            </ul>
                        </div>
                        <a href="?account=wishlist" class="btn btn-danger me-2"><i class="bi bi-heart-fill me-2"></i>ถูกใจ</a>
                        <a href="?cart" class="btn btn-warning"><i class="bi bi-basket2-fill me-2"></i>ตะกร้า</a>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>
</header>
<?php
if (removeNavMain('auth') == false) {
?>
    <!-- Responsive Navbar Bottom for mobile  -->
    <section class="navbar-bottom shadow p-2">
        <div class="d-flex justify-content-center">
            <a href="?account=wishlist" class="btn btn-sm btn-danger me-2"><i class="bi bi-heart-fill me-2"></i>ถูกใจ</a>
            <a href="?cart" class="btn btn-sm btn-warning me-2"><i class="bi bi-basket2-fill me-2"></i>ตะกร้า</a>
            <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#categoriesModal">ประเภทสินค้า</a>
        </div>
    </section>
<?php
}
?>
<div class="modal fade" id="categoriesModal" tabindex="-1" aria-labelledby="categoriesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoriesModalLabel">ประเภทสินค้า</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="list-item">
                    <?php require_once('../../services/categories/categories_navbar_bottom.php') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="userMenuModal" tabindex="-1" aria-labelledby="userMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userMenuModalLabel"><?= $_SESSION['U_USERNAME'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-body">
                    <?= $_SESSION['U_ROLE'] === true ? '<a class="btn btn-info w-100 mb-2" href="../../admin/">จัดการร้านค้า</a>' : '' ?>
                    <a class="btn btn-info w-100 mb-2" href="?account">บัญชีผู้ใช้</a>
                    <a class="btn btn-info w-100 mb-2" href="?account=order">การซื้อของฉัน</a>
                    <a class="btn btn-info w-100 mb-2" href="?cart">ตะกร้าสินค้า</a>
                    <a class="btn btn-info w-100 mb-2" href="?account=wishlist">สินค้าที่ถูกใจ</a>
                    <a class="btn btn-danger w-100" href="?logout" onclick="return confirm('ต้องการออกจากระบบ ?')">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">ติดต่อเรา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                try {
                    $stmt_contact = $connect->prepare("SELECT * FROM contacts ORDER BY id ASC");
                    $stmt_contact->execute();
                    $contacts = $stmt_contact->fetchAll();
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                    exit();
                }
                ?>
                <ul>
                    <?php
                    foreach ($contacts as $value) {
                    ?>
                        <li><?= $value['title'] ?> : <?= $value['contact'] ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>