<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Web DIOR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/csssanpham.css">
    <link rel="stylesheet" href="./assets/css/bao.css">
    <link rel="stylesheet" href="./assets/css/dk_dangnhap.css">
    <link rel="stylesheet" href="./assets/css/giohang.css">
    <link rel="stylesheet" href="./assets/css/xemngay.css">
    <link rel="stylesheet" href="./assets/css/chitietsp.css">
    <link rel="stylesheet" href="./assets/icon/themify-icons.css">
</head>

<body>
    <div class="wappter">
        <?php
        session_start();
        include('./admin/config/config.php');
        if(isset($_SESSION['cart'])&&isset($_GET['clear'])){
            unset($_SESSION['cart']);
        }
        include('./pages/header.php');
        include('./pages/siderbar.php');
        include('./pages/main.php');
        ?>
    </div>

    </div>
</body>

</html>