<div class="card card-body shadow-sm">
    <h4 style="color: #0b2d38;">Username</h4>
    <hr class="my-2">
    <nav class="account-list-menu">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item mb-2 <?= $_GET['account'] === "" ? 'account-active' : '' ?>">
                <a class="nav-link account-menu-text" href="?account">ข้อมูลส่วนตัว</a>
            </li>
            <li class="nav-item mb-2 <?= $_GET['account'] === "password_change" ? 'account-active' : '' ?>">
                <a class="nav-link account-menu-text" href="?account=password_change">เปลี่ยนรหัสผ่าน</a>
            </li>
            <li class="nav-item mb-2 <?= $_GET['account'] === "wishlist" ? 'account-active' : '' ?>">
                <a class="nav-link account-menu-text" href="?account=wishlist">สินค้าที่ถูกใจ</a>
            </li>
            <li class="nav-item mb-2 <?= $_GET['account'] === "order" ? 'account-active' : '' ?>">
                <a class="nav-link account-menu-text" href="?account=order">การซื้อของฉัน</a>
            </li>
        </ul>
    </nav>
</div>