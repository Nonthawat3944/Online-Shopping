<div class="card m-0 p-0">
    <div class="card-body py-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../../assets/images/product.jpg" class="w-50 d-block mx-auto rounded" alt="">
            </div>
            <div class="col-md-6">
                <h3>Huawei Smartphone Y6p Midnight Black (HMS)</h3>
                <strong class="text-primary">ประเภทสินค้า : <a href="">Category</a></strong>
                <h2 class="mt-2"><strong class="text-dark">฿20,000.00</strong></h2>
                <hr>
                <h6><strong>รายละเอียดของสินค้า</strong></h6>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus ipsam rem explicabo facilis ex velit suscipit nemo, nihil, dolorum, earum laudantium pariatur libero. Esse fuga laudantium expedita tempora tenetur veritatis?
                </p>
                <hr>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <strong class="text-danger"><span class="text-danger">สินค้าหมด</span></strong>
                            <strong class="text-success"><span class="text-success">สินค้ามีอยู่ : 10</span></strong>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <div class="input-group">
                                <label for="qty" class="input-group-text">จำนวนสินค้า</label>
                                <select name="quantity" id="qty" class="form-select" required>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <button type="submit" name="cart" class="btn btn-warning <?= $product['quantity'] == 0 ? 'disabled' : '' ?>"><i class="bi bi-basket2-fill me-2"></i>ลงตะกร้า</button>
                            <a href="?wishlist=out&id=<?= $product['id'] ?>" class="btn btn-danger" onclick="return confirm('ต้องการลบออกจากสินค้าที่ถูกใจ ?')"><i class="bi bi-heart-fill me-2"></i>ถูกใจ</a>
                            <a href="?wishlist=in&id=" class="btn btn-outline-danger" onclick="return confirm('ต้องการเพิ่มไปยังสินค้าที่ถูกใจ ?')"><i class="bi bi-heart me-2"></i>ถูกใจ</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>