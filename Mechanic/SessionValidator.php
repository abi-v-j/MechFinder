<?php
session_start();
if(!(isset($_SESSION['mid']) && !empty($_SESSION['mid']))) {
    header("location:../index.php");
}
?>