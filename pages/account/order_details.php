<?php
if (!isset($_SESSION['U_ID'])) {
?>
    <meta http-equiv="refresh" content="0; url=../auth/login.php">
    <?php
    exit();
}
require_once('../../services/account/order_details.php');
?>