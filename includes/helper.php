<?php

    function changeTitle(string $path, string $title) {
        // Output Buffer to replace title of every page
        ob_start();
        require($path);
        $buffer=ob_get_contents();
        ob_end_clean();

        $buffer=str_replace("%TITLE%", $title, $buffer);
        echo $buffer;
    }

    function validateUserPage(int $tid, string $path) {
        if($tid == 1 && strpos($path, "admin") === true) {
            return true;
        }

        return false;
    }