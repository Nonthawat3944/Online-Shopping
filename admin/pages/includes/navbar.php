<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#"><?= $shop_db[1]['title'] ?></a>
        <div class="collapse navbar-collapse" id="topNavBar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><?= $_SESSION['U_USERNAME'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2">|</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger" href="?logout" onclick="return confirm('ต้องการออกจากระบบ ?')">ออกจากระบบ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>