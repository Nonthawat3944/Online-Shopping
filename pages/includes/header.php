<?php
require_once('../../admin/services/connect.php');
try {
    $stmt_shop_db = $connect->prepare("SELECT * FROM shop ORDER BY id ASC");
    $stmt_shop_db->execute();
    $shop_db = $stmt_shop_db->fetchAll();
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    exit();
}
if (isset($_GET['logout'])) {
    session_destroy();
?>
    <meta http-equiv="refresh" content="0; url=../../">
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $shop_db[3]['title'] ?>">
    <title><?= $shop_db[2]['title'] ?></title>

    <!-- Style Sheet -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/css/style_main.css">

</head>

<body>