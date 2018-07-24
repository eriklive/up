<?php 
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

$user = $_SESSION['user'];
$senha = sha1($_POST['senha1']);
$table = 'dados';

include $_SERVER['DOCUMENT_ROOT']."/connect_db.php"; //Conexão com o db

//****************************************************************************************************************************
//consulta se o cadastro já foi iniciado
$query="SELECT * FROM $table WHERE (`user`='".$user."')";
$consulta = mysqli_query($link, $query);
$numLinhas = mysqli_num_rows($consulta);

if($numLinhas==0){ 	
	mysqli_close($link);										// Se não encontrar nenhuma linha com esses dados:
	$nomeDaPágina = 'Oh, não!! Erro!!';
	$text="Opa, algo está errado! Verifique novamente as informações. ATENÇÃO: O token é o número enviado a seu email.";
   	$linkRetorno="../cadastro/redefinirSenha.php";
  	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
} else { 		
	$query="SELECT * FROM $table WHERE (`user`='".$user."')";
	$consulta = mysqli_query($link, $query);
	$numLinhas = mysqli_num_rows($consulta);

	if ($numLinhas==1){ 
		//Inserir dados no DB
		$sqlupdate = "UPDATE dados SET senha='".$senha."' WHERE user = '".$user."'"; 
		//ordem de armazenamento
		mysqli_query($link, $sqlupdate); 
		mysqli_close($link);$text="Senha redefinada com sucesso!";
   		$linkRetorno="../admin/";
   		include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";

	} else{ 													
		$nomeDaPágina = 'Oh, não!! Erro!!';
		$text="Algo deu errado! Certeza que tudo está correto?";
   		$linkRetorno="../admin/";
   		include $_SERVER['DOCUMENT_ROOT']."/erro.php";
		mysqli_close($link);
	}	
}?>