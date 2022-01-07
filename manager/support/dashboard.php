<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Support - WT");
    validateUserPage($_SESSION["tid"], $_SERVER["REQUEST_URI"]);
?>
    <div id="content">
        <h1><?php
        
        $stmt = $conn->query("SELECT employee_firstname, employee_lastname FROM employees WHERE employee_id=". $_SESSION["tid"] );
        while ($row = $stmt->fetch_assoc()) {
            print "Employee ID: ". $_SESSION["tid"]."</br>";
            print "Name: ". $row["employee_lastname"].", ".$row["employee_firstname"];
            
}


        ?></h1>


    </div>
<?php
