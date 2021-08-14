<div class="row mb-2">
    <div class="col-12 px-1">
        <div class="card card-body shadow text-center">
            <strong><h2><?= $_GET['category'] ?></h2></strong>
        </div>
    </div>
</div>
<div class="row">
    <?php
    for ($i = 1; $i <= 12; $i++) {
    ?>
        <div class="product-display col-12 col-md-6 col-lg-3 col-sm-6 mb-4 px-1">
            <div class="list-group-item rounded px-2 product-item position-realtive">
                <a href="?pd=1" class="product-btn btn btn-outline-danger">ดูสินค้า</a>
                <img src="../../assets/images/product.jpg" class="thumbnail d-block mx-auto">
                <div class="product-text mt-2">
                    <small class="d-block  text-secondary">category</small>
                    <strong>Huawei Smartphone Y6p Midnight Black (HMS)</strong>
                    <hr class="my-1">
                    <h3 class="text-primary">฿20,000.00
                    </h3>
                </div>
            </div>
        </div>
        <div class="product-display-app col-6 mb-4 px-1">
            <a href="?pd=1" class="text-decoration-none">
                <div class="list-group-item rounded px-2 product-item position-realtive">
                    <img src="../../assets/images/product.jpg" class="thumbnail d-block mx-auto w-100">
                    <div class="product-text mt-2">
                        <small class="d-block  text-secondary">category</small>
                        <strong>Huawei Smartphone Y6p Midnight Black (HMS)</strong>
                        <hr class="my-1">
                        <h3 class="text-primary">฿20,000.00
                        </h3>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
    ?>
</div>
<div class="col-12">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="?page=1" tabindex="-1" aria-disabled="true">First</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="">1</a></li>
            <li class="page-item"><a class="page-link" href="">2</a></li>
            <li class="page-item"><a class="page-link" href="">3</a></li>
            <li class="page-item"><a class="page-link" href="">4</a></li>
            <li class="page-item"><a class="page-link" href="">5</a></li>
            <li class="page-item ">
                <a class="page-link" href="" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">Last</a>
            </li>
        </ul>
    </nav>
</div>