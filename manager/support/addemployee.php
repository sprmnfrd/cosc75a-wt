<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Support - WT");
    validateUserPage($_SESSION["tid"], $_SERVER["REQUEST_URI"]);

    $sql = "INSERT INTO employees (employee_team_id, employee_firstname, employee_lastname)
             VALUES (".$_GET['id'].", '".$_GET['fname']."', '".$_GET['lname']."')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//print $_GET['id']." ".$_GET['fname']." ".$_GET['lname'];
?>
    <div id="content">
        
        <form action="addemployee.php">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value=""><br>

        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value=""><br><br>
       
        <label for="id">Employee mobile number:</label><br>
        <input type="text" id="id" name="id" value=""><br><br>
       
        <label for="id">Employee email address:</label><br>
        <input type="text" id="id" name="id" value=""><br><br>       
       
        <label for="id">Employee team id:</label><br>
        <input type="text" id="id" name="id" value=""><br><br>
       
        <input type="submit" value="Submit">
       
    </form> 

    </div>
<?php


