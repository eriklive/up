<?php 
session_start();

$tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

if((!isset ($_SESSION['user'])== true) and (!isset ($_SESSION['senha'])==true)){
	unset ($_SESSION['user']);
	unset ($_SESSION['senha']);
	session_destroy();
	header('location: ../index.php');
} else {
	if($_SESSION['donoSessao'] != $tokenUser){
	   unset ($_SESSION['user']);
	   unset ($_SESSION['senha']);
	   session_destroy();
       header('location: ../index.php');
    } else{ 
		$usuario = $_SESSION['user'];
		$autor = $_SESSION['login']; 
	}
} 
?>