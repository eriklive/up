<?php 
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php"; 
include $_SERVER['DOCUMENT_ROOT']."/php/sessao.php";

$cp_aluno = $_POST["cp"];

$sql = "UPDATE dados SET cp = '".$cp_aluno."' WHERE id = '".$_SESSION["id"]."'";
$update = mysqli_query($link, $sql);

if($update){
	$_SESSION["cp"]=$cp_aluno;
	header('Location: https://descomplica.dceufabc.com/matriculas/');
} else {
	echo "<span> Houve alguma falha! </span>";
}
?>