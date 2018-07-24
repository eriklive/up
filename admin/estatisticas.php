<?php 
$nomeDaPágina = 'Estatisticas';
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";
?>
<style>
	header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }

    .full{
    	height: 100%;
    }
</style>

<body class="grey lighten-4">
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT']."/admin/menuAdmin.php"; ?>
	</header>

	<main>
		<div class="container full">
		  	<div class="row">
		  		<div class="col s12">
		  			<div class="card">
				    	<div class="card-content">
				    		<div class="row">
				    			<div class="col s12 m6"><h3>Estatísticas</h3></div>
				    			<div class="col s12 m6">
				    				<div class="btn waves-effect waves-light right" id="botaoExportar">Exportar para excel</div>
				    			</div>
				    		</div>
				    		<div class="row" id="dadosMatriculas">
								<table class="striped col m12">
									<thead>
										<tr>
											<th style="font-size:15px;">Curso</th>
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
											$sql = mysqli_query($link, "Select * FROM $table WHERE `requisicoes` > '0' ORDER BY `requisicoes` DESC");
											$i=1;
											while($exibe = mysqli_fetch_assoc($sql)){
											  	echo 
												  	'<tr>
												  		<th>'.$exibe["curso"].'</th>
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
				   			</div>
				  	   	</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>

<?php 
$estado = $_POST['estado'];
if(isset($estado)){
	header('Location: gerenciar_matriculas.php');
	mysqli_query($link, 'UPDATE matriculas SET aberto = "'.$estado.'" WHERE id = "1"');
	mysqli_close($link);
	?>
	<script>
		window.location = "https://descomplica.dceufabc.com/admin/gerenciar_matriculas.php";
	</script>
	<?
}
       $file = 'planilha.xls';
       header ("Content-type: application/x-msexcel");
       header ("Content-Disposition: attachment; filename=\"{$file}\"" );
       header ("Content-Description: PHP Generated Data" );
   
?>

<footer class="hide"><?php include $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?></footer>

<script>
    $("#botaoExportar").click(function (e) {
        window.location.assign("https://descomplica.dceufabc.com/admin/download_dados.php");
    });

	$(document).ready(function(){
	    $('ul.tabs').tabs();
	});
</script>
					   		