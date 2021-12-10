<?php
    require("../includes/helper.php");
    require("../includes/db.php");

    changeTitle("../templates/header.php", "Walang Tatak - Login");
?>

        <div class="login-wrapper">
            <h1 class="login-title text-white">WALANG TATAK SYSTEM</h1>
            <form action="login.php" method="POST" enctype="multipart/form-data">
                <table class="login-table">
                    <tr>
                        <td><h3 class="login-label text-white">Employee ID</h3></td>
                        <td><input type="text" class="login-input" name="login-id"></td>
                    </tr>
                    <tr>
                        <td><h3 class="login-label text-white">Password</h3></td>
                        <td><input type="password" class="login-input" name="login-pass"></td>
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
        $sql = "SELECT l.eid AS eid, l.password AS password, e.firstname AS firstname, e.lastname AS lastname, e.tid AS tid FROM login AS l, employee AS e WHERE l.eid=e.employee_id AND l.eid=?";
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
                        </script>";
                } else {
                    $sql = "UPDATE login SET last_login=?";
                    prepareSQL($conn, $sql, "s", date('Y-m-d H:i:s', time()));

                    // Start User session
                    $_SESSION["eid"] = $eid;
                    $_SESSION["tid"] = $tid;
                    $_SESSION["fname"] = strtoupper($fname);
                    $_SESSION["lname"] = strtoupper($lname);

                    break;
                }
            }

            header("Location: ./dashboard.php");
            die();
        }
    }