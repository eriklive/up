<?php 
include $_SERVER['DOCUMENT_ROOT']."/header.php";

$user = $_POST['usuario'];
$ra = $_POST['ra'];
$email = $_POST['email'];
$token = sha1($_POST['token']);
$senha = sha1($_POST['senha1']);

include $_SERVER['DOCUMENT_ROOT']."/connections/database-pdo.php";
	
$server_data = $connection->prepare("SELECT * FROM dados WHERE ra=:ra AND token = :token");
$server_data->bindValue(':ra', $ra);
$server_data->bindValue(':token', $token);
$server_data->execute();

$user_data = $server_data->fetch();

$response_lenght = $server_data->rowCount();
//****************************************************************************************************************************

if($response_lenght==0){ 	
	$text="Opa, Não encontramos um usuário com esse token e RA. Verifique novamente as informações. ATENÇÃO: O token é o número enviado a seu email";
	$linkRetorno="../cadastro/";
	include $_SERVER['DOCUMENT_ROOT']."/erro.php";

	$server_data->close();
	exit;
} else { 
	if ($user_data['habilitado']==''){ 
		session_start();
		$_SESSION['user']=$user;
       	$_SESSION['senha']=$senha;
        $_SESSION["ultimoAcesso"]=date("H:i:s");
		//Inserir dados no DB
		$server_data = $connection->prepare("UPDATE dados SET senha=:senha, habilitado='sim' WHERE user = :user");
		$server_data->bindValue(':senha', $senha);
		$server_data->bindValue(':user', $user);
		$server_data->execute();

		
		header("location:https://descomplica.dceufabc.com/home.php");

		$server_data->close();
		exit;
	} else{ 
		$text="Opa, esse usuário já existe e está habilitado! Esqueceu sua senha?";
		$linkRetorno="../cadastro/";
		include $_SERVER['DOCUMENT_ROOT']."/erro.php";
		
		$server_data->close();
		exit;
	}	
} ?>