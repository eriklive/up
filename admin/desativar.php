<?php 
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";
$id = $_POST["id"];

$table = "avisos";
$query="UPDATE `avisos` SET `disp` = '' WHERE `id`='".$id."'";
$deletar = mysqli_query($link, $query);

if($deletar){
	mysqli_close($link);
	$nomeDaPágina = 'Sucesso!';
	$text="Aviso desativado com sucesso!";
	$linkRetorno="../admin/avisos.php";
   	include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
} else {
	mysqli_close($link);
	$nomeDaPágina = 'Erro :/';
	$text="Algo deu errado ao desativar o aviso";
	$linkRetorno="../admin/avisos.php";
   	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
}
?>