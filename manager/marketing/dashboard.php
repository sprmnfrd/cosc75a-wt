<?php
    require("../../includes/helper.php");
    require("../../includes/db.php");

    changeTitle("../templates/header.php", "Marketing - WT");
    validateUserPage($_SESSION["tid"], $_SERVER["REQUEST_URI"]);
?>
    <div id="content">
        Marketing Dashboard
    </div>
<?php
    require("../templates/footer.php");