<?php
session_start();
if(!(isset($_SESSION['wid']) && !empty($_SESSION['wid']))) {
    header("location:../index.php");
}
?>