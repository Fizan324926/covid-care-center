<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["pass"]);
    header("Location:index.php");
?>