<?php 
include "../../connections/database-pdo.php";
include "../../header.php";
include "../../php/sessao_dce.php";

$id=$_POST['id'];
$materia=$_POST['materia'];
$descricao=$_POST['descricao'];

$server_data = $connection->prepare("UPDATE arquivos SET subtipo = :descricao WHERE id = :id");
$server_data->bindValue(':descricao', $descricao);
$server_data->bindValue(':id', $id);

if($server_data->execute()) { 
    $text="Arquivo atualizado com sucesso!";
	$linkRetorno="../index.php";
	include "../../sucesso.php";
} else {
    $text="Erro ao atualizar arquivo: <br />".$e;
   	$linkRetorno="../index.php";
   	include "../../erro.php";
}