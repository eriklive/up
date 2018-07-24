<?php 
header("Content-type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT']."/connections/database-pdo.php";

$user = strtolower($_POST["user"]) ;
$ra = $_POST["ra"];
$id = $_POST["id"];
$rand = rand(0,299);
$str = strlen($user);
$email = $_POST['email'];

$server_data = $connection->prepare("SELECT * FROM dados WHERE id = :id");
$server_data->bindValue(':id', $id);
$server_data->execute();

//$user_data = $server_data->fetch();
$response_values = $server_data->rowCount();

if($response_values==1) {
	$code = intval($ra*$rand/(10*$str)); 
	$token = sha1($code);
	$assunto = "Dados Alterados - DCE";
	$mensagem = 'Seu token e '.$code.'. Digite ele na janela de cadastro novamente, junto com seus dados, pelo link https://descomplica.dceufabc.com/cadastro/';
	$headers = "Content-Type: text/plain; charset=utf-8\r\n";
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "From: contato@dceufabc.com\r\n";
	$headers .= "To: $email\r\n";

	$server_data = $connection->prepare(
		"UPDATE dados SET user=:user, token=:token, ra=:ra, email=:email, habilitado='' WHERE id = :id"
	);

	$server_data->bindValue(':user', $user);
	$server_data->bindValue(':token', $token);
	$server_data->bindValue(':ra', $ra);
	$server_data->bindValue(':email', $email);
	$server_data->bindValue(':id', $id);

	$server_data->execute();

	function validaEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	function enviaEmail($email, $assunto, $mensagem, $headers) {  
		mail($email, $assunto, $mensagem, $headers);
	}

	if (validaEmail($email)) {
		enviaEmail($email, $assunto, nl2br($mensagem), $headers);
		$text="Enviamos um email com um novo token para este usuário.";
		$linkRetorno="https://descomplica.dceufabc.com/admin/usuarios/";
		include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";

		$server_data->close();
		exit;
	}else {
		$text="Algo deu errado! Certeza que seu email está correto?";
		$linkRetorno="../";
		include $_SERVER['DOCUMENT_ROOT']."/erro.php";

		$server_data->close();
		exit;
	}
}
?>