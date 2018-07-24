<?php 
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

$curso=$_POST['nomeDoCursoAdd'];
$sigla=$_POST['siglaDoCurso'];
$bi=$_POST['bi'];

if($bi=="bch"){
	$table = "cursos_bch";
} else {
	$table = "cursos_bct";
}

$query="INSERT INTO $table VALUES ('$curso', '$sigla')"; 
$inserir = mysqli_query($link, $query);
if($inserir){
	mysqli_close($link);
	$text="Curso adicionado com sucesso!";
   	$linkRetorno="../admin/atualizar_cursos.php";
   	include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
	} else {
		$nomeDaPágina = 'Oh, não!! Erro!!';
		$text="Algo deu errado! Certeza que tudo está correto?";
   		$linkRetorno="../admin/atualizar_cursos.php";
   		include $_SERVER['DOCUMENT_ROOT']."/erro.php";
	}?>