<?php
    require("../includes/helper.php");
    require("../includes/db.php");

    changeTitle("../templates/header.php", "Walang Tatak - Login");
?>
        <div class="box-small box-round background-black center">
            <div class="inline-center">
                <img src="../images/resources/logo.jpg" class="logo">
                <h1 class="text-white">LOGIN</h1>
            </div>
            <form action="./login.php" method="POST" enctype="multipart/form-data" autocomplete="on">
                <div class="row m-2 mt-4 mb-4">
                    <div class="col-5">
                        <label for="login-id" class="text-white"><h4>Employee ID</h4></label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="login-id" id="login-id" autofocus required>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-5">
                        <label for="login-pass" class="text-white"><h4>Password</h4></label>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" name="login-pass" id="login-pass" required>
                    </div>
                </div>
                <div class="row m-2 mb-4">
                    <div class="col inline-right">
                        <a href="reset.php" class="">Forgot Password</a>
                    </div>
                </div>

                <div class="row m-2">
                    <div class="col inline-center">
                        <button type="submit" class="btn btn-light" name="login-submit"><strong>Login</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
<?php
    // Validate User Input
    if(isset($_POST["login-submit"])) {
        $sql = "SELECT c.credential_employee_id AS eid, c.credential_password AS password, e.employee_firstname AS firstname, e.employee_lastname AS lastname, e.employee_team_id AS tid FROM credentials AS c, employees AS e WHERE c.credential_employee_id=e.employee_id AND c.credential_employee_id=?";
        $result = prepareSQL($conn, $sql, "s", $_POST['login-id']);

        if(mysqli_num_rows($result) < 1) {
            echo "
                <script>
                    alert('Employee ID not found. Please try again.');
                </script>";
        } else {
            while($row_result = mysqli_fetch_array($result)) {
                $eid = $row_result['eid'];
                $tid = $row_result['tid'];
                $fname = $row_result['firstname'];
                $lname = $row_result['lastname'];
                $password = $row_result['password'];

                if(!password_verify($_POST['login-pass'], $password)) {
                    echo "
                        <script>
                            alert('Employee ID and/or password do not match. Plase try again.');
                        </script>
                    ";
                } else {
                    // Start User session
                    $_SESSION["eid"] = $eid;
                    $_SESSION["tid"] = $tid;
                    $_SESSION["fname"] = strtoupper($fname);
                    $_SESSION["lname"] = strtoupper($lname);


                    $sql = "UPDATE credentials SET credential_last_login=? WHERE credential_employee_id=?";
                    prepareSQL($conn, $sql, "si", date('Y-m-d H:i:s', time()), $eid);

                    if($_SESSION["tid"] == 1) {
                        header("Location: ./admin/dashboard.php");
                        die();
                    } elseif($_SESSION["tid"] == 2) {
                        header("Location: ./operation/dashboard.php");
                        die();
                    } elseif($_SESSION["tid"] == 3) {
                        header("Location: ./marketing/dashboard.php");
                        die();
                    } elseif($_SESSION["tid"] == 4) {
                        header("Location: ./support/dashboard.php");
                        die();
                    }

                    break;
                }
            }
        }
    }