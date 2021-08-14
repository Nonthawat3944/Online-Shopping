<?php 
require_once('../../admin/services/connect.php');
if(isset($_GET['logout'])) {
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
    <title>CSEMN | Online Shopping 24 Hr.</title>

    <!-- Style Sheet -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <?php

    if ((isset($_GET['account']) && !isset($_GET['order_details'])) || isset($_GET['pd'])) {
    ?>
        <style>
            @media screen and (min-width: 401px) {
                footer {
                    position: fixed !important;
                    bottom: 0;
                    width: 100%;
                }
            }
        </style>
    <?php
    }

    ?>
</head>

<body>