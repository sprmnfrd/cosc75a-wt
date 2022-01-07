<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Support - WT");
    validateUserPage($_SESSION["tid"], $_SERVER["REQUEST_URI"]);

    // sql to delete a record
    $sql = "DELETE FROM employees WHERE employee_id=".$_GET["id"];

    if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
}   else {
    echo "Error deleting record: " . $conn->error;
}



?> 
    <div id="content">
   <?php    
    $sql = "SELECT employee_id, employee_team_id, employee_firstname, employee_lastname FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["employee_team_id"]. " - Name: ". $row["employee_firstname"]. " " . $row["employee_lastname"] . "<a href='removeemployee.php?id=".$row["employee_id"] ."'> delete </a> <br>";
    }
} else {
    echo "0 results";
}
        
?>
    </div>
<?php


