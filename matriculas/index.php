<?php 
$nomeDaPágina='Matriculas';

include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao.php";

$conection = mysqli_query($link, "SELECT * FROM matriculas WHERE id = '1'");
$data = mysqli_fetch_assoc($conection);
if ($data["aberto"] == 'n'){ 
            header('location:fora_de_periodo.php');
            } else { 
				if ($_SESSION["cp"]==''){
					include $_SERVER['DOCUMENT_ROOT']."/matriculas/informar_cp.php";	
				} else { ?>
<body class="grey lighten-4">
	<header>	
		<?php include $_SERVER['DOCUMENT_ROOT'].'/menu.php' ?>
	</header>
	<main class="container">	
		<div class="card center">
			<div class="card-content">
				<form action="matriculas.php" method="POST">
					<table class="striped col m12 responsive-table">
						<thead>
							<tr>
								<th style="font-size:15px;"> </th>
								<th class="hide-on-small-only" style="font-size:15px;">Curso</th>
								<th style="font-size:15px;">Turma</th>
								<th style="font-size:15px;">Teoria</th>
								<th style="font-size:15px;">Pratica</th>
								<th style="font-size:15px;">Docente (teoria)</th>
								<th style="font-size:15px;">Docente (pratica)</th>
								<th style="font-size:15px;">Requisições</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$sql = mysqli_query($link, "SELECT * FROM `matriculas` WHERE `id` = '1'");

								while($exibir = mysqli_fetch_assoc($sql)){
									$quad=$exibir["quad_atual"];
								}

								$table = "matriculas_".$quad;

								$sql = mysqli_query ($link, "Select * FROM $table");
								$i=1;
								while($exibe = mysqli_fetch_assoc($sql)){
									if($exibe["docente_teoria"]=='0'){
										if($exibe["teoria"]=='0'){
											$exibe["docente_teoria"]='Não há';
										} else {
											$exibe["docente_teoria"]='Não informado';
										}
									}

									if($exibe["docente_pratica"]=='0'){
										if($exibe["pratica"]=='0'){
											$exibe["docente_pratica"]='Não há';
										} else {
											$exibe["docente_pratica"]='Não informado';
										}
									}

									if($exibe["teoria"]=='0'){
										$exibe["teoria"]='Não há';
									}

									if($exibe["pratica"]=='0'){
										$exibe["pratica"]='Não há';
									}	
								  	echo 
									  	'<tr>
									  		<th>
									  			<input type="checkbox" id="test-'.$i.'" name="identificador[]" value="'.$exibe["id"].'" />
									  			<label for="test-'.$i.'"> </label>
	      									</th>
									  		<th class="hide-on-small-only">'.$exibe["curso"].'</th>
									  		<th>'.$exibe["turma"].'</th>
									  		<th>'.$exibe["teoria"].'</th>
									  		<th>'.$exibe["pratica"].'</th>
									  		<th>'.$exibe["docente_teoria"].'</th>
									  		<th>'.$exibe["docente_pratica"] .'</th>
									  		<th><span class="right">'.$exibe["requisicoes"] .'</span></th>
								  		</tr>
								  		</form>';
								  		$i++;
								}

								mysqli_close($link);
							?>
						</tbody>
					</table>
					<div class="row">
						<br>		
						<button type="submit" class="btn">Finalizar</button>
					</div>			
				</form>
			</div>
		</div>
	</main>
	<?
	include $_SERVER['DOCUMENT_ROOT']."/footer.php";
	?>
<script type="">
	$(document).ready(function(){
	    $('#bi').change(function(){
	        $('#cursos').load('listaCursos.php?bi='+$('#bi').val());
	    });
	});
</script>
<? }
}
?>