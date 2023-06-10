<?php
session_start();
session_unset();
session_destroy();

header("location:../Guest/Login.php");
exit();
?>