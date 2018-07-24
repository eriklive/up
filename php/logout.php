<?php 
session_start();

unset($_SESSION);
session_destroy();

header("location: https://descomplica.dceufabc.com/index.php");
?>