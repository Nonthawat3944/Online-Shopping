<?php
if (isset($_SESSION['U_ROLE'])) {
    if ($_SESSION['U_ROLE'] == false) {
?>
        <script>
            alert('คุณไม่มีสิทธิในการเข้าถึง')
            window.location = '../../'
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert('เข้าสู่ระบบก่อน')
        window.location = '../../../pages/auth/login.php'
    </script>
<?php
}
?>