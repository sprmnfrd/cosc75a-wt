<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Support - WT");
    validateUserPage($_SESSION["tid"], $_SERVER["REQUEST_URI"]);

    if(!isset($fname)) {
        $fname = "";
    }

    if(!isset($lname)) {
        $lname = "";
    }

    if(!isset($mobile)) {
        $mobile = "+63";
    }

    if(!isset($email)) {
        $email = "";
    }

?>
    <div class="container mt-3">
        <h1>Add Employee</h1>
        <form action="addemployee.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="col-4 col-title-large">
                    <label class="col-form-label" for="new-employee-fname"><h4>Employee First Name</h4></label>
                </div>
                <div class="col">
                    <div class="row">
                        <input type="text" class="form-control" name="new-employee-fname" id="new-employee-fname" value="<?php echo $fname; ?>" autofocus required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-title-large">
                    <label class="col-form-label" for="new-employee-lname"><h4>Employee Last Name</h4></label>
                </div>
                <div class="col">
                    <div class="row">
                        <input type="text" class="form-control" name="new-employee-lname" id="new-employee-lname" id="new-employee-fname" value="<?php echo $lname; ?>" required>
                    </div>
                    <div class="row mb-2 d-none error" id="new-employee-name-error">
                        Invalid Name
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-title-large">
                    <label class="col-form-label" for="new-employee-mobile"><h4>Employee Mobile No</h4></label>
                </div>
                <div class="col">
                    <div class="row">
                        <input type="text" class="form-control" name="new-employee-mobile" id="new-employee-mobile"  id="new-employee-fname" value="<?php echo $mobile; ?>" required>
                    </div>
                    <div class="row mb-2 d-none error" id="new-employee-mobile-error">
                        Invalid Mobile Number
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-title-large">
                    <label class="col-form-label" for="new-employee-mobile"><h4>Employee Email</h4></label>
                </div>
                <div class="col">
                    <div class="row">
                        <input type="text" class="form-control" name="new-employee-email" id="new-employee-email"  id="new-employee-fname" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="row mb-2 d-none error" id="new-employee-email-error">
                        Invalid Email Address
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-title-large">
                    <label class="col-form-label" for="new-employee-team"><h4>Employee Team</h4></label>
                </div>
                <div class="col">
                    <div class="row">
                        <select class="form-select" name="new-employee-team" id="new-employee-team" required>
                                <option selected disabled>--SELECT TEAM--</option>
                                <?php
                                    $sql = "SELECT * FROM teams";
                                    $result = prepareSQL($conn, $sql);
                                    while($rowResult = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$rowResult["team_id"].'">'.$rowResult["team_name"].'</option>';
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="row mb-2 d-none error" id="new-employee-team-error">
                        Invalid Team
                    </div>
                </div>
                <div class="row">
                <div class="col-4 col-title-large">
                    <label class="col-form-label" for="new-employee-mobile"><h4>Temporary Password</h4></label>
                </div>
                <div class="col">
                    <div class="row">
                            <input type="password" class="form-control" name="new-employee-password" id="new-employee-password" required>
                        </div>
                        <div class="row mb-2 d-none error" id="new-employee-password-error">
                            Invalid Password
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col pe-0 inline-right">
                        <button type="submit" class="btn btn-light" name="new-employee"><strong>Add Employee</strong></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
    if(isset($_POST["new-employee"])) {
        $fname = $_POST["new-employee-fname"];
        $lname = $_POST["new-employee-lname"];
        $mobile = $_POST["new-employee-mobile"];
        $email = $_POST["new-employee-mobile"];

        echo '
                <script>
                    alert("'.preg_match("/^\+63?\d{10}$/", $fname).'");
                </script>
            ';

        if(!preg_match("/^\+63?\d{10}$/", $fname)) {
            echo '
                <script>
                    toggleError(new-employee-name-error, show);
                </script>
            ';
            $error1 = true;
        }else {
            echo '
                <script>
                    toggleError(new-employee-name-error, hide);
                </script>
            ';
            $error1 = false;
        }
    }






