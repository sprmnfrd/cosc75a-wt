<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Adminitstrator - WT");
    validateUserPage($_SESSION["tid"], $_SERVER["REQUEST_URI"]);
?>
    <div id="content">
        <h1>Generate Report</h1>
    </div>
<?php
    require("../templates/footer.php");