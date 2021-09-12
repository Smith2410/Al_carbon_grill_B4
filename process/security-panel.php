<?php
    session_start();
    error_reporting(E_PARSE);
    if ($_SESSION['userType']=="") {
        header("Location: index.php");
    }
?>