<?php 
header("Content-type: text/html; charset=utf-8");
$user = $_POST["user"];
$ra = $_POST["ra"];
$rand = rand(0,299);
$str = strlen($user);

include $_SERVER['DOCUMENT_ROOT']."/header.php"; 
include $_SERVER['DOCUMENT_ROOT']."/connections/database-pdo.php";

/*  Verificar no DB se  usuário existe*/
$server_data = $connection->prepare("SELECT * FROM dados WHERE user = :user");
$server_data->bindValue(':user', $user);
$server_data->execute();
$numLinhas = $server_data->rowCount();

if($numLinhas==0){
	$text="Não encontramos nenhum cadastro com esse usuário.";
	$linkRetorno="../";
	include $_SERVER['DOCUMENT_ROOT']."/erro.php";

	$server_data->close();
    exit;
} else {
	$server_data = $connection->prepare("SELECT * FROM dados WHERE ra = :ra");
	$server_data->bindValue(':ra', $ra);
	$server_data->execute();
	$numLinhas = $server_data->rowCount();

	if($numLinhas==0){
		mysqli_close($link);
		$text="Aparentemente não encontramos nenhum usuário com esse RA.";
   		$linkRetorno="../";
   		include $_SERVER['DOCUMENT_ROOT']."/erro.php";

   		$server_data->close();
    	exit;
	} else{
		$code = intval($ra*$rand/(10*$str)); 
		$token = sha1($code);
		$email=$user.'@aluno.ufabc.edu.br';
		$assunto = "Formulario de cadastro - DCE";
		$mensagem = 'Seu novo token é  '.$code.'. Digite ele na janela de redefinição de senha em https://descomplica.dceufabc.com/cadastro/redefinirSenha.php';
		$headers = "Content-Type: text/plain; charset=utf-8\r\n";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "From: Descomplica UFABC < contato@dceufabc.com>\r\n";
		$headers .= "To: $email\r\n";

		$server_data = $connection->prepare("UPDATE dados SET token = :token WHERE user = :user");
		$server_data->bindValue(':token', $token);
		$server_data->bindValue(':user', $user);
		$server_data->execute();
		
		function validaEmail($email) {
		    return filter_var($email, FILTER_VALIDATE_EMAIL);
		}

		function enviaEmail($email, $assunto, $mensagem, $headers) {  
		  mail($email, $assunto, $mensagem, $headers);
		}

		if (validaEmail($email)) {
		    enviaEmail($email, $assunto, nl2br($mensagem), $headers);
		    $text="O email foi enviado com sucesso!";
   			$linkRetorno="../cadastro/redefinirSenha.php";
   			include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";

   			$server_data->close();
   			exit;
		}else {
			$text="Algo deu errado! Certeza que seu email está correto?";
   			$linkRetorno="../cadastro/redefinirSenha.php";
   			include $_SERVER['DOCUMENT_ROOT']."/erro.php";

   			$server_data->close();
   			exit;
		}
	}
}
?>