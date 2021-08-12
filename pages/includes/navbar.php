<header class="fixed-top">
    <nav class="navbar navbar-expand-sm shadow-sm py-0">
        <div class="container-xxl">
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item d-flex">
                    <a class="text-white nav-link nav-hover active me-2" aria-current="page" href="#">หน้าแรก</a>
                    <a class="text-white nav-link nav-hover" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">ติดต่อเรา</a>
                </li>
            </ul>

            <ul class="navbar-nav mb-lg-0 justify-content-end">
                <li class="nav-item d-flex">
                    <a class="nav-link nav-hover me-2 text-white" href="../../pages/auth/register.php">ลงทะเบียน</a>
                    <span class="nav-link me-2 text-white">|</span>
                    <a class="nav-link nav-hover text-white" href="../../pages/auth/login.php">เข้าสู่ระบบ</a>
                </li>
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
                    <div class="col-6 text-start">
                        <h3 class="mb-0"><a class="text-decoration-none text-white" href="#">CSEMN</a></h3>
                    </div>
                    <div class="col-6 text-end">
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
                    <div class="mb-2 col-lg-3 text-lg-start text-center">
                        <h3><a class="text-decoration-none text-white" href="#">CSEMN</a></h3>
                    </div>
                    <div class="mb-2 col-lg-5">
                        <form method="GET" class="d-flex w-100">
                            <input class="form-control me-2" name="search" type="search" placeholder="ค้นหาสินค้า" aria-label="Search">
                            <button class="btn btn-success" type="submit">ค้นหา</button>
                        </form>
                    </div>
                    <div class="mb-2 col-lg-4 text-lg-end text-center">
                        <div class="dropdown me-2 d-inline">
                            <a class="btn btn-info dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                ประเภทสินค้า
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li class="dropdown-item">Category</li>
                                <li class="dropdown-item">Category</li>
                                <li class="dropdown-item">Category</li>
                                <li class="dropdown-item">Category</li>
                                <li class="dropdown-item">Category</li>
                                <li class="dropdown-item">Category</li>
                                <li class="dropdown-item">Category</li>
                                <li class="dropdown-item">Category</li>
                                <li class="dropdown-item">Category</li>
                                <li class="dropdown-item">Category</li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-danger me-2"><i class="bi bi-heart-fill me-2"></i>ถูกใจ</a>
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
            <a href="" class="btn btn-sm btn-danger me-2"><i class="bi bi-heart-fill me-2"></i>ถูกใจ</a>
            <a href="?cart" class="btn btn-sm btn-warning me-2"><i class="bi bi-basket2-fill me-2"></i>ตะกร้า</a>
            <div class="dropup">
                <button class="btn btn-sm btn-info dropdown-toggle shadow" type="button" id="dropupCategory" data-bs-toggle="dropdown" aria-expanded="false">
                    ประเภทสินค้า
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropupCategory">
                    <li class="dropdown-item">Category</li>
                    <li class="dropdown-item">Category</li>
                    <li class="dropdown-item">Category</li>
                    <li class="dropdown-item">Category</li>
                    <li class="dropdown-item">Category</li>
                    <li class="dropdown-item">Category</li>
                    <li class="dropdown-item">Category</li>
                    <li class="dropdown-item">Category</li>
                    <li class="dropdown-item">Category</li>
                    <li class="dropdown-item">Category</li>
                </ul>
            </div>
        </div>
    </section>
<?php
}
?>