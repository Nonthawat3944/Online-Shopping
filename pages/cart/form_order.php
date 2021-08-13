<div class="row">
    <div class="col-12 px-1">
        <div class="card card-body shadow-sm">
            <div class="cart-title">
                <h2 class="py-0 my-0">ยืนยันการสั่งซื้อ</h2>
            </div>
            <hr>
            <div class="cart-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="cart-list-form-order">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
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
                            for ($i = 1; $i <= 5; $i++) {
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
                                            <span class="d-block">จำนวน : 2</span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card-address mb-1">
                            <div class="card card-body">
                                <h5>ที่อยู่ในการจัดส่ง</h5>
                                <hr class="my-2">
                                <form action="">
                                    <div class="mb-3 input-group">
                                        <input type="text" class="form-control me-3" placeholder="ขื่อ..." name="firstname" required>
                                        <input type="text" class="form-control me-3" placeholder="นามสกุล..." name="lastname" required>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <input type="text" class="form-control me-3" placeholder="เบอร์โทรศัพท์.." name="phone" required>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <input type="text" class="form-control me-3" placeholder="ที่อยู่..." name="address" required>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <input type="text" class="form-control me-3" placeholder="ตำบล..." name="sub_area" required>
                                        <input type="text" class="form-control me-3" placeholder="อำเภอ..." name="area" required>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <input type="text" class="form-control me-3" placeholder="จังหวัด..." name="province" required>
                                        <input type="text" class="form-control me-3" placeholder="รหัสไปรษณีย์..." name="zipcode" required>
                                    </div>
                            </div>
                        </div>
                        <div class="card-total">
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
                                        <th>
                                            <select name="payment" id="payment" class="form-select" required>
                                                <option value="" selected disabled>เลือกช่องทางการชำระเงิน
                                                </option>
                                                <option value="1">ชำระเงินปลายทาง</option>
                                                <option value="2">ชำระเงินผ่านบัญชีธนาคาร</option>
                                            </select>
                                        </th>
                                    </tr>
                                </table>
                                <input type="submit" class="btn btn-success" value="ยืนยันการสั่งซื้อ">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>