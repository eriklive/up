<?php 
header("Content-type: text/html; charset=utf-8");

$nomeDaPágina='Resumo';
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao.php";
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";

?> 
<body class="grey lighten-4">
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT']."/menu.php"; ?>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<div class="card">
					<div class="card-content">		
<?
//Vars
$id = $_POST['identificador']; // ESSE ID É DAS MATÉRIAS

//DB Conect
$sql = mysqli_query($link, "SELECT * FROM `matriculas` WHERE `id` = '1'");

while($exibir = mysqli_fetch_assoc($sql)){
	$quad=$exibir["quad_atual"];
}

$table = "matriculas_".$quad;

	foreach ($id as $id){
		$sql = mysqli_query($link, "SELECT * FROM `".$table."` WHERE `id`='".$id."' ");
		$exibir = mysqli_fetch_assoc($sql);
		$id_alunos_explodidos = explode(";", $exibir["id_users"]); //ID DOS ALUNOS NO DB DE MATÉRIAS
		$materia_ja_selecionada = false;

		foreach ($id_alunos_explodidos as $id_alunos_explodidos) {
			if ($id_alunos_explodidos == $_SESSION["id"]){
				$materia_ja_selecionada = true;
			}
		}

		if(!$materia_ja_selecionada){
			if (($exibir["corte"]=='0') or ($exibir["corte"]=='')) {
				$cp = $_SESSION["cp"];
			} else {
				$cp = $exibir["corte"].";".$_SESSION["cp"];
			}

			if (($exibir["requisicoes"]=='0') or ($exibir["requisicoes"]=='')) {
				$cont = 1;
			} else {
				$cont = $exibir["requisicoes"]+1;
			}

			if (($exibir["id_users"]=='0') or ($exibir["id_users"]=='')) {
				$id_users = $_SESSION["id"].";";
			} else {
				$id_users = $exibir["id_users"].";".$_SESSION["id"].";";
			}

			$sql = "UPDATE $table SET requisicoes = '".$cont."',  corte = '".$cp."',  id_users = '".$id_users."' WHERE id = '".$id."'" ;
			$update = mysqli_query($link, $sql);
			
			echo '<span class="flow-text green-text"> "'.$exibir["turma"].'" selecionada com sucesso !! <span><br><br>';
		} else {
			echo '<span class="flow-text red-text">Você já selecionou "'.$exibir["turma"].'" ! <span><br><br>';
		}
	}
?>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>