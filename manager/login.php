<?php
    require("../includes/helper.php");
    require("../includes/db.php");

    changeTitle("../templates/header.php", "Walang Tatak - Login");
?>

        <div class="login-wrapper">
            <img src="../images/resources/logo.jpg" class="logo" style="margin-top: 10px; margin-left: 41%">
            <h1 class="login-title text-white">WALANG TATAK SYSTEM</h1>
            <form action="./login.php" method="POST" enctype="multipart/form-data" autocomplete="on">
                <table class="login-table">
                    <tr>
                        <td><h3 class="login-label text-white">Employee ID</h3></td>
                        <td><input type="text" class="login-input" name="login-id" autofocus required></td>
                    </tr>
                    <tr>
                        <td><h3 class="login-label text-white">Password</h3></td>
                        <td><input type="password" class="login-input" name="login-pass" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="password-reset"><a href="reset.php">Forgot Password</a></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" id="btn_login" name="login-submit" value="LOGIN"></td>
                    </tr>
                </table>
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