<?php 
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

$nome=$_POST['nomeDaMateriaAdd'];
$curso=$_POST['nomeDoCursoAdd'];
$cod=$_POST['codMateria'];

$table = "disciplinas";

$query="INSERT INTO $table VALUES ('$curso', '$cod', '$nome')"; 
$inserir = mysqli_query($link, $query);

if($inserir){
	mysqli_close($link);
	$text="Matéria adicionada com sucesso!";
   	$linkRetorno="../admin/atualizar_materias.php";
   	include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
	} else {
		$nomeDaPágina = 'Oh, não!! Erro!!';
		$text="Algo deu errado! Certeza que tudo está correto?";
   		$linkRetorno="../admin/atualizar_materias.php";
   		include $_SERVER['DOCUMENT_ROOT']."/erro.php";
	}?>