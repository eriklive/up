<?php 
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

$quad=$_POST['quadrimestre'];

$query="INSERT INTO quadrimestre VALUES ('$quad')"; 
$inserir = mysqli_query($link, $query);
if($inserir){
	mysqli_close($link); 
	$text="Quadrimestre adicionado com sucesso!";
   	$linkRetorno="../admin/gerenciar_quads.php";
   	include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
   } else {
	$text="Falha ao adicionar quadrimestre :(";
   	$linkRetorno="../admin/gerenciar_quads.php";
   	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
} ?>