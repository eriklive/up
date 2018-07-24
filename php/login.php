<?php
include "../header.php";

session_start();

$user = trim($_POST['user']);
$senha = sha1(trim($_POST['senha']));
$_SESSION['login']=$user;

if($user=='' or $senha==''){
	$text="Insira um nome de usuáiro e senha!";
	$linkRetorno="../";
	include "../erro.php";
	exit;
} else {
	//================ DB Conection
	include "../connections/database-pdo.php";
	
	$server_data = $connection->prepare("SELECT * FROM dados WHERE user = :user AND senha = :senha");
	$server_data->bindValue(':user', $user);
	$server_data->bindValue(':senha', $senha);
	$server_data->execute();

	$user_data = $server_data->fetch();

	$response = $server_data->rowCount();
	//============== End Conection

	if($response==1 AND $user=='dce.ufabc'){
        $_SESSION['user']=$user;
        $_SESSION['login']=$user;
        $_SESSION['senha']=$senha;
        $_SESSION["ultimoAcesso"]=date("H:i:s");
        $_SESSION['donoSessao'] =  md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
        
        header("location:../admin/");
        $server_data->close();
    	exit;
    } else if ($response==1) {
    	($user_data['habilitado']=='ca') ? ($_SESSION['user']='ca') : ($_SESSION['user']=$user);
    	
    	$_SESSION['donoSessao'] = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
    	$_SESSION['senha']=$senha;
    	$_SESSION["ultimoAcesso"]=date("H:i:s");
    	$_SESSION["cp"]=$user_data["cp"];
    	$_SESSION["id"]=$user_data["id"];

    	header("location: ../index.php");
    	$server_data->close();
    	exit;
	} else {
	    unset ($_SESSION['user']);
	    unset ($_SESSION['senha']);

	    $text="Algo deu errado! Certeza que seus dados estão corretos?";
	    $linkRetorno="../";
	    include "../erro.php";
	    
	    $server_data->close();
	}
}
?>