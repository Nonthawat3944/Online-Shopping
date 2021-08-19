<?php
if (!isset($_SESSION['U_ID'])) {
    ?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
    <?php
    exit();
}
?>
<div class="card card-body shadow-sm">
    <h4 style="color: #0b2d38;">สินค้าที่ถูกใจ</h4>
    <hr class="my-2">
    <div class="wishlist-list">
        <?php
        for ($i = 1; $i <= 5; $i++) {
        ?>
            <div class="wishlist-item card card-body shadow-sm mb-1">
                <div class="d-flex">
                    <div class="wishlist-item-image">
                        <img src="../../assets/images/product.jpg" class="d-block mx-auto rounded">
                    </div>
                    <div class="wishlist-item-details">
                        <div class="wishlist-item-title">
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
                                        <a href="" class="btn btn-danger">
                                            <i class="bi bi-trash"></i> นำออก</a>
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
    <div class="wishlist-list-app">
        <?php
        for ($i = 1; $i <= 5; $i++) {
        ?>
            <div class="wishlist-item-app card card-body shadow-sm mb-1">
                <a href="#" class="text-decoration-none">
                    <div class="row mb-2">
                        <div class="wishlist-item-image-app col-3">
                            <img src="../../assets/images/product.jpg" class="d-block mx-auto rounded w-100">
                        </div>
                        <div class="wishlist-item-details-app col-9">
                            <div class="w-100 text-truncate"><span class="text-dark">Huawei
                                    Smartphone Y6p Midnight Black (HMS) </span></div>
                            <b class="text-primary">฿20,000.00</b>
                        </div>
                    </div>
                </a>
                <div class="row">
                    <div class="col-12">
                        <a href="" class="btn btn-sm btn-outline-danger w-100">ลบ</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>