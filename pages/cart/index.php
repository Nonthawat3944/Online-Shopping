<div class="row">
    <div class="col-12 px-1">
        <div class="card card-body shadow-sm">
            <div class="cart-title d-flex justify-content-between">
                <h2 class="py-0 my-0">ตะกร้าสินค้า</h2>
                <a href="" class="btn btn-outline-danger">ล้างตะกร้า</a>
            </div>
            <hr>
            <div class="cart-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="cart-list">
                            <?php
                            for ($i = 1; $i <= 10; $i++) {
                            ?>
                                <div class="cart-item card card-body shadow-sm mb-1">
                                    <div class="d-flex">
                                        <div class="cart-item-image">
                                            <img src="../../assets/images/product.jpg" class="d-block mx-auto rounded">
                                        </div>
                                        <div class="cart-item-details">
                                            <div class="cart-item-title">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-2">
                                                        <strong>
                                                            <a href="#" class="text-decoration-none text-dark">
                                                                Lorem ipsum dolor sit amet consectetur adipisicing
                                                                elit.
                                                                Atquibusdam magni sit sed architecto molestias quasi
                                                                nisi
                                                                quaerat
                                                            </a>
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
                                                            <div class="input-group input-group-sm w-50">
                                                                <a href="" style="width: 30%;" type="button" class="btn btn-danger">-</a>
                                                                <input style="width: 40%;" type="text" name="quantity" class="form-control px-0 text-center" value="10" readonly>
                                                                <a href="" style="width: 30%;" type="button" class="btn btn-success">+</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="" class="btn btn-danger">
                                                            <i class="bi bi-trash"></i> นำออก</a>
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
                                    <a href="#" class="text-decoration-none">
                                        <div class="row mb-2">
                                            <div class="cart-item-image-app col-3">
                                                <img src="../../assets/images/product.jpg" class="d-block mx-auto rounded w-100">
                                            </div>
                                            <div class="cart-item-details-app col-9">
                                                <div class="w-100 text-truncate"><span class="text-dark">Huawei
                                                        Smartphone Y6p Midnight Black (HMS) </span></div>
                                                <b class="text-primary">฿20,000.00</b>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group input-group-sm w-100">
                                                <a href="" style="width: 30%;" type="button" class="btn btn-danger">-</a>
                                                <input style="width: 40%;" type="text" name="quantity" class="form-control px-0 text-center" value="10" readonly>
                                                <a href="" style="width: 30%;" type="button" class="btn btn-success">+</a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <a href="" class="btn btn-sm btn-outline-danger w-100">ลบ</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-total">
                            <div class="card card-body shadow-sm">
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
                                        <td>ราคาทั้งหมด</td>
                                        <td class="text-end">฿80,000.00</td>
                                    </tr>
                                </table>
                                <a href="?submit" class="btn btn-success">สั่งซื้อสินค้า</a>
                            </div>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="col">
                        <a href="../main/" class="btn btn-warning">กลับไปซื้อสินค้า</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>