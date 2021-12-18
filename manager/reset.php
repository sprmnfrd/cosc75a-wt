<?php
    require("../includes/helper.php");
    require("../includes/db.php");

    changeTitle("../templates/header.php", "Walang Tatak - Reset Password");
?>

    <div id="login-wrapper" style="width: 34% !important;">
        <img src="../images/resources/logo.jpg" class="logo" style="margin-top: 10px; margin-left: 41%">
        <h1 class="login-title text-white">RESET PASSWORD</h1>
        <form action="./reset.php" method="POST" enctype="multipart/form-data" autocomplete="on">
                <table id="login-table">
                     <tr>
                        <td><h3 class="login-label text-white">Employee ID</h3></td>
                        <td><input type="text" class="login-input border-round" name="login-id" autofocus required></td>
                    </tr>
                    <tr>
                        <td><h3 class="login-label text-white">New Password</h3></td>
                        <td><input type="password" class="login-input border-round" name="login-pass1" required></td>
                    </tr>
                    <tr>
                        <td><h3 class="login-label text-white">Confirm Password</h3></td>
                        <td><input type="password" class="login-input border-round" name="login-pass2" required></td>
                    </tr>
                   <tr>
                        <td colspan="2"><input type="submit" class="border-round" id="btn_login" style="width: 45%;" name="reset-submit" value="RESET PASSWORD"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

<?php
    if(isset($_POST["reset-submit"])) {
        if($_POST['login-pass1'] != $_POST['login-pass2']) {
            echo "
                <script>
                    alert('Passwords do not match. Please try again.');
                </script>";
        } else {
            $password = password_hash($_POST['login-pass2'], PASSWORD_DEFAULT);

            $sql = "SELECT c.credential_employee_id AS eid FROM credentials AS c, employees AS e WHERE c.credential_employee_id=e.employee_id AND c.credential_employee_id=?";
            $result = prepareSQL($conn, $sql, "i", $_POST['login-id']);

            if(mysqli_num_rows($result) < 1) {
                echo "
                    <script>
                        alert('Employee ID not found. Please try again.');
                    </script>";
            } else {
                if(!validatePassword($_POST['login-pass2'])) {
                    echo "
                        <script>
                            alert('Password did not meet requirements. Please make sure your password contains at least one uppercase, lowercase, number and special characters.');
                        </script>";
                } else {
                    while($row_result = mysqli_fetch_array($result)) {
                        $eid = $row_result['eid'];
    
                        $sql = "INSERT INTO password_reset VALUES (NULL, ?, ?, NULL, NULL, 0)";
                        prepareSQL($conn, $sql, "is", $eid, $password);
    
                        echo "
                        <script>
                            alert('Password reset request was sent. Support team will contact you shortly.');
                        </script>";
    
                        break;
                    }
                }

            }
        }
    }