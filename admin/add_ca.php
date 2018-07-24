<?php 
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

header("Content-type: text/html; charset=utf-8");
$user = $_POST["user"];
$senha = $_POST["senha"];
$rand = rand(17,2399);
$str = strlen($user);
$email=$_POST["email"];
$nome=$_POST["nome"];
$senha=sha1($senha);

include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
$table="dados";

/*  Verificar no DB se  usuário existe*/
$query="SELECT * FROM $table WHERE user='$user'";
$consulta = mysqli_query($link, $query);
$numLinhas = mysqli_num_rows($consulta);

if($numLinhas!==0){
	mysqli_close($link); 
	include $_SERVER['DOCUMENT_ROOT']."/cadastro/usuario_cadastrado.php";
} else {
	$code = intval($rand*13.75*$str); 
	$token = sha1($code);
	$assunto = "Formulario de cadastro - DCE";
		$mensagem = 'Seu código é '.$code.'. Digite ele na janela de cadastro pelo link https://descomplica.dceufabc.com/cadastro/';
		$headers = "Content-Type: text/plain; charset=utf-8\r\n";

		$query= "INSERT INTO $table (user, senha, token, email, habilitado) VALUES ('".$user."', '".$senha."', '".$token."', '".$email."', 'ca')";
		$inserir = mysqli_query($link, $query);
		mysqli_close($link);

		function validaEmail($email) {
		    return filter_var($email, FILTER_VALIDATE_EMAIL);
		}

		function enviaEmail($email, $assunto, $mensagem, $headers) {  
		  mail($email, $assunto, $mensagem, $headers);
		}

		if (validaEmail($email)) {
		    enviaEmail($email, $assunto, nl2br($mensagem), $headers);
        	$nomeDaPágina = 'Sucesso';
			$text="O CA foi cadastrado com sucesso! Enviamos um email para o email informado contendo o token de ativação da conta. Guarde-o, pois será necessário para alterar a sua senha!";
   			$linkRetorno="../admin/";
   			include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
		}else {
			$nomeDaPágina = 'Oh, não!! Erro!!';
			$text="Algo deu errado! Certeza que tudo está correto?";
   			$linkRetorno="../admin/";
   			include $_SERVER['DOCUMENT_ROOT']."/erro.php";
		}
	}
?>