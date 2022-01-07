<?php
    require("./includes/helper.php");
    changeTitle("./templates/header.php", "WALANG TATAK");
?>
        <section class="header">
                <nav>
                    <a href="index.php"><img src="images/logo.jpg"></a>
                    <div class="nav-links" id="navLinks">
                        <i class="fa fa-times-circle" onclick="hideMenu()"></i>
                        <ul>
                            <li><a href=""><b>Home</b></a></li>
                            <li><a href="menu.php"><b>Menu</b></a></li>
                            <li><a href="contact/index.php"><b>Contact Us</b></a></li>
                            <li><a href="admin_area/admin-login.php"><b>Admin</b></a></li>
                        </ul>
                    </div>
                    <i class="fa fa-bars" onclick="showMenu()"></i>
                </nav>

        <div class="book-btn0">		
        <a href="" class="book-btn"><b>ORDER NOW</b></a>
        </div>

        </section>

        <!---About Us-->
        <section class="About Us">
            <h1><b><center>About Us</center></b></h1>
                    <p><center>Lorem ipsum dolor sit amet,consectetur adipiscing elit.Lorem ipsum dolor sit amet,consectetur adipiscing elit.Lorem ipsum dolor sit amet,consectetur adipiscing elit.</center></p>
                </div>
                
            </div>
        </section>
    </body>
</html>