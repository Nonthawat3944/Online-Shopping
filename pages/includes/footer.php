<footer class="footer shadow">
    <div class="container py-3">
        <h3>ติดต่อเรา</h3>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <?php
                    foreach ($contacts as $value) {
                    ?>
                        <li><?= $value['title'] ?> : <?= $value['contact'] ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</footer>