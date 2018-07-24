<?php 
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

$nome=$_POST['nomeProfessorAdd'];
$centro=$_POST['centro'];

$table = "professores";

$query="INSERT INTO $table VALUES ('$nome', '$centro', '')"; 
$inserir = mysqli_query($link, $query);

if($inserir){
	mysqli_close($link);
	$text="Professor adicionado com sucesso!";
   	$linkRetorno="../admin/atualizarProfessores.php";
   	include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
	} else {
		$nomeDaPágina = 'Oh, não!! Erro!!';
		$text="Algo deu errado! Certeza que tudo está correto?";
   		$linkRetorno="../admin/atualizarProfessores.php";
   		include $_SERVER['DOCUMENT_ROOT']."/erro.php";
	}?>