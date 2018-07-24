<?php 
$nomeDaPágina = 'Senha resetada com sucesso!';
include $_SERVER['DOCUMENT_ROOT']."/header.php";

$user = $_POST['usuario'];
$email = $_POST['email'];
$token = sha1($_POST['token']);
$senha = sha1($_POST['senha1']);

include $_SERVER['DOCUMENT_ROOT']."/connections/database-pdo.php";

//consulta se o cadastro já foi iniciado
$server_data = $connection->prepare("SELECT * FROM dados WHERE (user=:user) AND (token=:token)");
$server_data->bindValue(':user', $user);
$server_data->bindValue(':token', $token);
$server_data->execute();
$numLinhas = $server_data->rowCount();

//$query="SELECT * FROM $table WHERE (`user`='".$user."') AND (`token`='".$token."')";
//$consulta = mysqli_query($link, $query);
//$numLinhas = mysqli_num_rows($consulta);

if($numLinhas==0){ 	
	$text="Opa, algo está errado! Verifique novamente as informações. ATENÇÃO: O token é o número enviado a seu email.";
   	$linkRetorno="../cadastro/redefinirSenha.php";
   	include $_SERVER['DOCUMENT_ROOT']."/erro.php";	

   	$server_data->close();
    exit;
} else { 	
	$server_data = $connection->prepare("SELECT * FROM dados WHERE (user=:user)");
	$server_data->bindValue(':user', $user);
	$server_data->execute();
	$numLinhas = $server_data->rowCount();	

	//$query="SELECT * FROM $table WHERE (`user`='".$user."')";
	//$consulta = mysqli_query($link, $query);
	//$numLinhas = mysqli_num_rows($consulta);

	if ($numLinhas==1){
		//Inserir dados no DB 
		$server_data = $connection->prepare("UPDATE dados SET senha = :senha WHERE user = :user");
		$server_data->bindValue(':senha', $senha);
		$server_data->bindValue(':user', $user);
		$server_data->execute();
		
		//$sqlupdate = "UPDATE dados SET senha='".$senha."' WHERE user = '".$user."'"; 
		//mysqli_query($link, $sqlupdate); 
		//mysqli_close($link);
		$text="Senha atualizada com sucesso!";
   		$linkRetorno="../";
   		include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
   		$server_data->close();
    	exit;

	} else{ 													
		$text="Opa, algo deu errado!";
   		$linkRetorno="../cadastro/redefinirSenha.php";
   		include $_SERVER['DOCUMENT_ROOT']."/erro.php";

		$server_data->close();
    	exit;
	}	
} ?>