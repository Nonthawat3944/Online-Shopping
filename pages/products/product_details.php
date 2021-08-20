<?php require_once('../../services/products/product_views.php') ?>
<?php
if (isset($_GET['wishlist'])) {
    require_once('../../services/products/product_wishlist.php');
    exit();
}
?>
<?php require_once('../../services/products/product_details.php') ?>
<div class="card mx-0 p-0 mb-5">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <img src="../../admin/uploads/<?= $product['image'] ?>" class="w-50 d-block mx-auto rounded" alt="">
            </div>
            <div class="col-md-6">
                <h3><?= $product['product'] ?></h3>
                <strong class="text-primary">ประเภทสินค้า : <a href="?c=<?= $product['category_id'] ?>&category=<?= $product['category'] ?>"><?= $product['category'] ?></a></strong>
                <h2 class="mt-2"><strong class="text-dark">฿<?= number_format($product['price'], 2) ?></strong></h2>
                <hr>
                <h6><strong>รายละเอียดของสินค้า</strong></h6>
                <p><?= $product['details'] ?></p>
                <hr>
                <form action="../../services/products/product_cart.php" method="post">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <?= $product['quantity'] == 0 ? '<strong class="text-danger"><span class="text-danger">สินค้าหมด</span></strong>'
                                : "<strong class='text-success'><span class='text-success'>สินค้ามีอยู่ : {$product['quantity']}</span></strong>" ?>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <div class="input-group">
                                <label for="qty" class="input-group-text">จำนวนสินค้า</label>
                                <select name="quantity" id="qty" class="form-select" <?= $product['quantity'] == 0 ? 'disabled' : '' ?> required>
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
                                        if ($i > $product['quantity']) {
                                            break;
                                        }
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <button type="submit" name="cart" class="btn btn-warning <?= $product['quantity'] == 0 ? 'disabled' : '' ?>"><i class="bi bi-basket2-fill me-2"></i>ลงตะกร้า</button>
                            <?php
                            try {
                                $stmt_wishlist = $connect->prepare("SELECT * FROM wishlist WHERE user_id = :user_id AND product_id = :product_id");
                                $stmt_wishlist->execute(array(':user_id' => $_SESSION['U_ID'], ':product_id' => $product['id']));
                                $row_wishlist = $stmt_wishlist->rowCount();
                            } catch (PDOException $e) {
                                echo "เกิดข้อผิดพลาด : " . $e->getMessage();
                                exit();
                            }
                            if ($row_wishlist > 0) {
                            ?>
                                <a href="?wishlist=out&pd=<?= $product['id'] ?>" class="btn btn-danger" onclick="return confirm('ต้องการลบออกจากสินค้าที่ถูกใจ ?')"><i class="bi bi-heart-fill me-2"></i>ถูกใจ</a>
                            <?php
                            } else {
                            ?>
                                <a href="?wishlist=in&pd=<?= $product['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('ต้องการเพิ่มไปยังสินค้าที่ถูกใจ ?')"><i class="bi bi-heart me-2"></i>ถูกใจ</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>