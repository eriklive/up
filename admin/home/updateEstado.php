<?php 
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php"; //Conexão com o db
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

$id=$_POST['checkbox'];

$cont=sizeof($id);

foreach ($id as $id){
	$sqlupdate = "UPDATE `arquivos` SET `hab`='s' WHERE `id` = '".$id."'"; 
	mysqli_query($link, $sqlupdate); 
}

$nomeDaPágina = 'Sucesso!';
($cont==1) ? ($text="Arquivo atualizado!") : ($text=$cont." aquivos atualizados!");
$linkRetorno="../";
include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
?>