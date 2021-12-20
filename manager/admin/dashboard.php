<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Administrator - WT");
    validateUserPage($_SESSION["tid"], $_SERVER["REQUEST_URI"]);
?>
    <div id="content">
        Administrator Dashboard
    </div>
<?php
    require("../templates/footer.php");