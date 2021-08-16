<?php require_once('../../services/products/view.php') ?>
<div class="card h-100">
    <div class="card-header d-flex justify-content-between">
        <strong>รหัสสินค้า : <?= $result['code'] ?></strong>
        <div>
            <a href="?products=update&id=<?= $result['id'] ?>" class='btn btn-sm btn-warning'><i class='bi bi-pencil-square me-2'></i>แก้ไข</a>
            <a href="?products=delete&id=<?= $result['id'] ?>&image=<?= $result['image'] ?>" class='btn btn-sm btn-danger' onclick="return confirm('คุณต้องการที่จะลบรายการนี้ ?')"><i class='bi bi-trash-fill me-2'></i>ลบ</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="../../uploads/<?= $result['image'] ?>" class="w-50 mx-auto d-block rounded">
            </div>
            <div class="col-md-6">
                <ul>
                    <li>
                        <span>ประเภทสินค้า : <?= $result['category'] ?></span>
                    </li>
                    <li>
                        <span>ชื่อสินค้า : <?= $result['product'] ?></span>
                    </li>
                    <li>
                        <span>ราคา : <?= '฿' . number_format($result['price'], 2) ?></span>
                    </li>
                    <li>
                        <span>จำนวน : <?= $result['quantity'] ?></span>
                    </li>
                    <li>
                        <span>การเข้าชม : <?= $result['views'] == NULL ? '<span class="text-danger">ยังไม่มีการเข้าชมสินค้า</span>' : $result['views'] ?></span>
                    </li>
                    <li>
                        <span>วันที่เพิ่ม : <?= date("d / m / Y / เวลา H:i น.", strtotime($result['created_at'])) ?></span>
                    </li>
                    <li>
                        <span>รายละเอียด : <?= $result['details'] ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>