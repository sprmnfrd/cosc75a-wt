<!DOCTYPE html>
<?php
    date_default_timezone_set('Asia/Manila');
    session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <script type="text/javascript" src="../../js/script.js"></script>
        <title>%TITLE%</title>
    </head>
    <body>
    <div class="hbar">
            <a href="dashboard.php"><img src="../../images/resources/logo.jpg" class="logo" style="margin-left: 3vw;"></a>
            <?php
                echo '
                    <a id="user_name" href="javascript:toggleUserMenu();"><span>'.$_SESSION["fname"].' '.$_SESSION["lname"].'</span><a>
                ';
            ?>
            <div id="user_menu">
                <ul>
                    <li><a href="#">Profile</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="vbar">
            <ul id="menu">
                <?php
                    if($_SESSION["tid"] == 1) {
                        echo '
                            <a class="menu-item" href="./new-product.php"><li>Add New Product</li></a>
                            <a class="menu-item" href="./edit-product.php"><li>Update Existing Products</li></a>
                            <a class="menu-item" href="./report.php"><li>Generate Report</li></a>
                        ';
                    } elseif($_SESSION["tid"] == 2) {
                        echo '
                            <a class="menu-item" href="#"><li>View Orders</li></a>
                            <a class="menu-item" href="#"><li>Update Inventory</li></a>
                        ';
                    } elseif($_SESSION["tid"] == 3) {
                        echo '
                            <a class="menu-item" href="#"><li>New Promotion</li></a>
                            <a class="menu-item" href="#"><li>View Discounts</li></a>
                        ';
                    } elseif($_SESSION["tid"] == 4) {
                        echo '
                            <a class="menu-item" href="#"><li>Create New Employee</li></a>
                            <a class="menu-item" href="#"><li>Remove Employee</li></a>
                            <a class="menu-item" href="#"><li>Reset Password</li></a>
                            <a class="menu-item" href="./password-reset.php"><li>Manage Help Links</li></a>
                        ';
                    } else {
                        header("Location: ../login.php");
                        die();
                    }
                ?>
            </ul>
        </div>