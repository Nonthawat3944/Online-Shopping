<?php
if (!isset($_SESSION['U_ID'])) {
    ?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
    <?php
    exit();
}
?>
<div class="card card-body shadow-sm">
    <div class="order-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4 style="color: #0b2d38;">รหัสคำสั่งซื้อ : OR640800001</h4>
            <div class="text-status-date text-end">
                <strong class="d-block">สถานะ : <span class="text-warning">รอการตรวจสอบ</span></strong>
                <span>วันที่สั่งซื้อ : 2021-08-11 08:11:17</span>
            </div>
        </div>
    </div>
    <div class="order-header-app">
        <h4 style="color: #0b2d38;" class="mb-0">รหัสคำสั่งซื้อ : OR640800001</h4>
        <div class="text-status-date">
            <strong class="d-block">สถานะ : <span class="text-warning">รอการตรวจสอบ</span></strong>
            <span>วันที่สั่งซื้อ : 2021-08-11 08:11:17</span>
        </div>
    </div>
    <hr class="my-2">
    <div class="row">
        <div class="col-12 ps-1">
            <div class="card card-body mb-1">
                <h5>ที่อยู่ในการจัดส่ง</h5>
                <hr class="my-2">
                <ul>
                    <li>ชื่อผู้รับ : นนทวัฒน์ แหล่พั่ว</li>
                    <li>เบอร์โทรศัพท์ : 0631014897</li>
                    <li>ที่อยู่ : 60 หมู่12 / บ้านเลน / บางปะอิน / อยุธยา / 13160</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 ps-1">
            <div class="cart-list-order">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                ?>
                    <div class="cart-item card card-body mb-1">
                        <div class="d-flex">
                            <div class="cart-item-image">
                                <img src="../../assets/images/product.jpg" class="d-block mx-auto rounded">
                            </div>
                            <div class="cart-item-details">
                                <div class="cart-item-title">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <strong>
                                                Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit.
                                                Atquibusdam magni sit sed architecto molestias quasi
                                                nisi
                                                quaerat
                                            </strong>
                                        </li>
                                        <hr>
                                        <li class="mb-2 row">
                                            <div class="col-12 col-md-6">
                                                <strong>
                                                    <h4 class="text-primary">฿20,000.00</h4>
                                                </strong>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <span>จำนวน : 2</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="cart-list-app">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                ?>
                    <div class="cart-item-app card card-body shadow-sm mb-1">
                        <div class="row mb-2">
                            <div class="cart-item-image-app col-3">
                                <img src="../../assets/images/product.jpg" class="d-block mx-auto rounded w-100">
                            </div>
                            <div class="cart-item-details-app col-9">
                                <div class="w-100 text-truncate"><span class="text-dark">Huawei
                                        Smartphone Y6p Midnight Black (HMS) </span></div>
                                <b class="text-primary">฿20,000.00</b>
                                <span class="d-block">จำนวน :</span>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-5 ps-1">
            <div class="card-total mb-1">
                <div class="card card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">ยอดรวมทั้งสิ้น</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>จำนวนสินค้า</td>
                            <td class="text-end">4</td>
                        </tr>
                        <tr>
                            <td>ค่าจัดส่ง</td>
                            <td class="text-end">฿80.00</td>
                        </tr>
                        <tr>
                            <td>ราคาสินค้าทั้งหมด</td>
                            <td class="text-end">฿80,000.00</td>
                        </tr>
                        <tr>
                            <th>ยอดรวมทั้งสิ้น</th>
                            <th class="text-end">฿80,080.00</th>
                        </tr>
                        <tr>
                            <th>วิธีการชำระเงิน</th>
                            <th class="text-end text-success">ชำระเงินผ่านบัญชีธนาคาร</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-payment">
                <div class="card card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>
                            หลักฐานการชำระเงิน
                        </strong>
                        <a href="" class="btn btn-warning">อัพโหลด</a>
                    </div>
                    <hr class="my-2">
                    <div class="error alert alert-danger text-center">
                        <span>ยังไม่ได้อัพโหลดหลักฐานการชำระเงิน</span>
                    </div>
                    <div class="payment-image">
                        <img src="../../assets/images/ดาวน์โหลด.jpg" class="d-block mx-auto rounded w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>