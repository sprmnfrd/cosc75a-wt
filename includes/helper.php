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

    function validatePassword(string $password) {
        $uppercase = preg_match("@[A-Z]@", $password);
        $lowercase = preg_match("@[a-z]@", $password);
        $characase = preg_match("@[^\W]@", $password);
        $numbecase = preg_match("@[0-9]@", $password);

        if(!$uppercase || !$lowercase || !$numbecase || !$characase || strlen($password) < 8) {
            return false;
        }

        return true;
    }

    function validateUserPage(int $tid, string $path) {
        if($tid == 1 && strpos($path, "admin") === false) {
            header("Location: ../admin/dashboard.php");
            die();
        }elseif($tid == 2 && strpos($path, "operation") === false) {
            header("Location: ../operation/dashboard.php");
            die();
        }elseif($tid == 3 && strpos($path, "marketing") === false) {
            header("Location: ../marketing/dashboard.php");
            die();
        }elseif($tid == 4 && strpos($path, "support") === false) {
            header("Location: ../support/dashboard.php");
            die();
        }
    }

    function isImage($imgExt) {
        $ext = array("gif", "png", "jpg", "jpeg");
        
        return in_array(strtolower($imgExt), $ext);
    }

    function isEmpty($element, string $element_id) {
        if(!isset($element) || empty($element)) {
            echo '
                <script>
                    toggleError("'.$element_id.'-error", "show");
                </script>
            ';

            return true;
        } else {
            echo '
                <script>
                    toggleError("'.$element_id.'-error", "hide");
                </script>
            ';

            return false;
        }
    }

    function validateDate($date, $format = "Y-m-d H:i:s") {
        $d = DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) === $date;
    }

    function validateDateRange($start, $end) {
        $today = date("Y-m-d H:i:s");

        if(!validateDate($start)) {
            return -1;
        }

        if(!validateDate($end)) {
            return -2;
        }

        if($start < $today || $end < $today || $end < $start) {
            if($end < $start && $start < $today) {
                return -3;
            } elseif($end < $today || $end < $start) {
                return -2;
            } else {
                return -1;
            }
        } else {
            return 1;
        }
    }