<?php 
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

$quad_informado = $_POST['quad'];
$quad_informado = str_replace('.', '_', $quad_informado);

$sql = "UPDATE `matriculas` SET `quad_atual` = '".$quad_informado."' WHERE `id` = '1'";

if(mysqli_query($link, $sql)){
	$text="Quad de matriculas alterado com sucesso!";
	$linkRetorno="../admin/alterar_quad_atual.php";
	include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
} else {
	$text="Algo deu errado!";
	$linkRetorno="../admin/alterar_quad_atual.php";
	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
}

?>