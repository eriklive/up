<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<?php 
session_start();

if((!isset ($_SESSION['user']) == true ) and (!isset ($_SESSION['senha']) == true)){
	unset ($_SESSION['user']);
	unset ($_SESSION['senha']);
	header('location:https://descomplica.dceufabc.com/index.php');
} else {
	/*if(($_SESSION['ultimoAcesso'])==0){
		session_destroy();
		header("location:https://descomplica.dceufabc.com/index.php");
	} else */
	if ((($_SESSION['user']) != 'dce.ufabc') AND (($_SESSION['user']) != 'erik.almeida') ){
		header("location:https://descomplica.dceufabc.com/index.php");
	}else{ 
		$usuario = $_SESSION['login'];
		$dataSalva = $_SESSION['ultimoAcesso'];
		/*$agora = date("H:i:s");

		$inatividade=(strtotime($agora)-strtotime($dataSalva));
		
		if($inatividade >=600 ){
			session_destroy();
			header("location:https://descomplica.dceufabc.com/index.php");
		}else{
			$_SESSION['ultimoAcesso']=$agora;
		}*/
	}
} 
?>