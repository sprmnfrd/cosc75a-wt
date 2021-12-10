<?php
    require("../includes/helper.php");
    require("../includes/db.php");

    changeTitle("../templates/header.php", "Walang Tatak - Dashboard");
?>
        <div class="hbar">
            <a href="dashboard.php"><img src="../images/logo.jpg" class="logo"></a>
            <?php
                echo '
                    <a id="user_name" href="javascript:toggleUserMenu();"><span>'.$_SESSION["fname"].' '.$_SESSION["lname"].'</span><a>
                ';
            ?>
            <div id="user_menu">
                <ul>
                    <li><a href="#">Profile</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="vbar">
            <ul id="menu">
                <?php
                    echo '
                    <script>
                        alert("$_SESSION["tid"]");
                    </script>
                    ';
                        if($_SESSION["tid"] == 1) {
                            echo '
                                <a class="menu-item" href="#"><li>ITEM 1</li></a>
                                <a class="menu-item" href="#"><li>ITEM 2</li></a>
                                <a class="menu-item" href="#"><li>ITEM 3</li></a>
                            ';
                        } elseif($_SESSION["tid"] == 2) {
                            echo '
                                <a class="menu-item" href="#"><li>ITEM 4</li></a>
                                <a class="menu-item" href="#"><li>ITEM 5</li></a>
                                <a class="menu-item" href="#"><li>ITEM 6</li></a>
                            ';
                        } elseif($_SESSION["tid"] == 3) {
                            echo '
                                <a class="menu-item" href="#"><li>ITEM 7</li></a>
                                <a class="menu-item" href="#"><li>ITEM 8</li></a>
                                <a class="menu-item" href="#"><li>ITEM 9</li></a>
                            ';
                        } elseif($_SESSION["tid"] == 4) {
                            echo '
                                <a class="menu-item" href="#"><li>ITEM 10</li></a>
                                <a class="menu-item" href="#"><li>ITEM 11</li></a>
                                <a class="menu-item" href="#"><li>ITEM 12</li></a>
                            ';
                        } else {
                            header("Location: ./login.php");
                            die();
                        }
                ?>
            </ul>
        </div>
        <script>
            function toggleUserMenu() {
                document.getElementById("user_menu").classList.toggle("toggle");
            }
        </script>
    </body>
</html>