<?php
session_start();
if ( isset($_SESSION['user']) ){
    header("Location: html-login-register.php");
}
?>