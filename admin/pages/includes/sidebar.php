<?php
function isActive($data)
{
    $array = explode('/', $_SERVER['REQUEST_URI']);
    $key = array_search("pages", $array);
    $name = $array[$key + 1];
    return $name === $data ? 'active' : '';
}
?>
<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body px-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link px-3" href="/">
                        <span class="me-2"><i class="bi bi-house-fill"></i></span>
                        <span>หน้าร้านค้า</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3  <?php echo isActive('dashboard') ?>" href="../dashboard/">
                        <span class="me-2"><i class="bi bi-palette-fill"></i></span>
                        <span>หน้าหลัก</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 <?php echo isActive('orders') ?>" href="../orders/">
                        <span class="me-2"><i class="bi bi-card-list"></i></span>
                        <span>รายการสั่งซื้อ</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 <?php echo isActive('users') ?>" href="../users/">
                        <span class="me-2"><i class="bi bi-people-fill"></i></span>
                        <span>รายชื่อสมาชิก</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 <?php echo isActive('categories') ?>" href="../categories/">
                        <span class="me-2"><i class="bi bi-list-ul"></i></span>
                        <span>ประเภทสินค้า</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 <?php echo isActive('products') ?>" href="../products/">
                        <span class="me-2"><i class="bi bi-box"></i></span>
                        <span>รายการสินค้า</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 <?php echo isActive('banners') ?>" href="../banners/">
                        <span class="me-2"><i class="bi bi-badge-ad-fill"></i></span>
                        <span>การโฆษณา</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 <?php echo isActive('payments') ?>" href="../payments/">
                        <span class="me-2"><i class="bi bi-credit-card"></i></span>
                        <span>การชำระเงิน</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 <?php echo isActive('settings') ?>" href="../settings/">
                        <span class="me-2"><i class="bi bi-gear"></i></span>
                        <span>การตั้งค่า</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider bg-light">
                </li>
                <li class="px-3">
                    <a href="?logout" class="btn btn-outline-danger w-100">ออกจากระบบ</a>
                </li>
            </ul>
        </nav>
    </div>
</div>