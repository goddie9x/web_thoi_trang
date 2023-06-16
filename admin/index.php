<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dior</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./assets/icon/themify-icons.css">
</head>
<?php
session_start();
?>

<body>
    <?php
    if (!isset($_SESSION['role_id'])||$_SESSION['role_id']!=1) {
        header('Location: not_permission.php');
        exit();
    }
    include('./modules/header.php');
    ?>
    <div class="main">
        <div class="sidebar">
            <?php
            include('./modules/menu.php');
            ?>
        </div>
        <?php
        include('./config/config.php');
        include('./modules/main.php');
        ?>
    </div>
    </div>

</body>


</html>