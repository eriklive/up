<?php 
header("Content-type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT']."/connections/database-pdo.php";

$user = strtolower($_POST["user"]) ;
$ra = $_POST["ra"];
$rand = rand(0,299);
$str = strlen($user);

if (isset($_POST['g-recaptcha-response'])) {
    $captcha_data = $_POST['g-recaptcha-response'];
}

// Se nenhum valor foi recebido, o usuário não realizou o captcha
if (!$captcha_data) {
    $text="Por favor, confirme o captcha.";
	$linkRetorno="../";
	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
    exit;
}

$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfVckEUAAAAAJN5cSibjyqJ5gKeQpzHqiveD51H
&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);

if (!($resposta.success)) {
   	$text="Opa, houve um problema com seu captcha! Tente novamente.";
	$linkRetorno="../";
	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
    exit;
}

$server_data = $connection->prepare("SELECT * FROM dados WHERE user = :user");
$server_data->bindValue(':user', $user);
$server_data->execute();

//$user_data = $server_data->fetch();
$numLinhas = $server_data->rowCount();

if($numLinhas==1){
	//mysqli_close($link); 
	//include $_SERVER['DOCUMENT_ROOT']."/cadastro/usuario_cadastrado.php";
	
	$text="Usuário já existente!!!";
	$linkRetorno="../";
	include $_SERVER['DOCUMENT_ROOT']."/erro.php";

	$server_data->close();
	exit;    
} else {
	$server_data = $connection->prepare("SELECT * FROM dados WHERE ra = :ra");
	$server_data->bindValue(':ra', $ra);
	$server_data->execute();
	$numLinhas = $server_data->rowCount();

	//$user_data = $server_data->fetch();
	//$query="SELECT * FROM $table WHERE ra='$ra'";
	//$consulta = mysqli_query($link, $query);
	//$numLinhas = mysqli_num_rows($consulta);

	if($numLinhas!==0){
		mysqli_close($link);
		$text="Oooops! Esse RA já está cadastrado! Tente novamente.!";
		$linkRetorno="../";
		include $_SERVER['DOCUMENT_ROOT']."/erro.php";

		$server_data->close();
		exit;
	} else{
		$code = intval($ra*$rand/(10*$str)); 
		$token = sha1($code);
		$email=$user.'@aluno.ufabc.edu.br';
		$assunto = "Formulario de cadastro - DCE";
		$mensagem = 'Seu código é '.$code.'. Digite ele na janela de cadastro pelo link https://descomplica.dceufabc.com/cadastro/';
		$headers = "Content-Type: text/plain; charset=utf-8\r\n";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "From: contato@dceufabc.com\r\n";
		$headers .= "To: $email\r\n";
		
		$server_data = $connection->prepare(
			"INSERT INTO dados (user, token, ra, email) VALUES (:user, :token, :ra, :email)"
		);

		$server_data->bindValue(':user', $user);
		$server_data->bindValue(':token', $token);
		$server_data->bindValue(':ra', $ra);
		$server_data->bindValue(':email', $email);

		$server_data->execute();

		function validaEmail($email) {
		    return filter_var($email, FILTER_VALIDATE_EMAIL);
		}

		function enviaEmail($email, $assunto, $mensagem, $headers) {  
		  mail($email, $assunto, $mensagem, $headers);
		}

		if (validaEmail($email)) {
		    enviaEmail($email, $assunto, nl2br($mensagem), $headers);
		   	$text="Tudo certo até agora. Enviamos um email para seu email institucional, por favor, verifique! Precisaremos do número enviado à ele para a próxima etapa.";
			$linkRetorno="../cadastro/";
			include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
		}else {
		    $text="Algo deu errado! Certeza que seu email está correto?";
			$linkRetorno="../";
			include $_SERVER['DOCUMENT_ROOT']."/erro.php";
		}
	}
}
?>