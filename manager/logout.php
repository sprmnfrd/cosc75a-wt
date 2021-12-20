<?php
    session_start();

    echo "logout page";

    session_unset();
    session_destroy();

    header("Location: ./login.php");
    die();