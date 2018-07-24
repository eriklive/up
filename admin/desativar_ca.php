<?php 
$nomeDaPágina = 'Desativar CA';
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

$id = $_POST["id"];
$senha = sha1($_POST["senha"]);
$email = $_POST["email"];

$table = "dados";
$query="UPDATE $table SET `senha`='".$senha."', `email` = '".$email."' WHERE `id`='".$id."'";
$editar = mysqli_query($link, $query);

if($editar){
	mysqli_close($link);
	$nomeDaPágina = 'Sucesso!';
	$text="CA desativado com sucesso!";
	$linkRetorno="../admin/criar_ca.php";
   	include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
} else {
	mysqli_close($link);
	$nomeDaPágina = 'Erro :/';
	$text="Algo deu errado ao desativar o ca";
	$linkRetorno="../admin/criar_ca.php";
   	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
}