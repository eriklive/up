<?php 
$nomeDaPágina = 'Gerenciar Matrículas';
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

$sql = mysqli_query($link, "SELECT * FROM `matriculas` WHERE `id` = '1'");

while($exibir = mysqli_fetch_assoc($sql)){
	$quad=$exibir["quad_atual"];
}
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
				    		<form action="mudar_quad.php" method="POST">
								<div class="row" style="display: inline;">
									<div class="row">
										<span class="flow-text">Informe abaixo o quadrimestra para o qual o sistema de matriculas ficará aberto. Certifique-se de que o upload do arquivo das novas matérias e que o quad correto foi selecionado. Atualmente o quadrimestre-alvo das matrículas é <b><?php echo "$quad";  ?></b>.</span>
									</div>
									<div class="row">
										<h5 class="col m8 s12">Informe o Quad das matriculas: </h5>
									</div>	
									<div class="row">
										<div class="input-field col m4 s12" >
											<?php 
												include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
												$sql = mysqli_query($link, "SELECT * FROM quadrimestre ORDER BY quad DESC"); ?> 
												<select name="quad">
													<option value="null" disabled selected id="">Quad</option>
													<? while($exibe = mysqli_fetch_assoc($sql)){
														echo'<option value="'.$exibe["quad"].'">'.$exibe["quad"].'</option>';
													} 
													mysqli_close($link);
											?> 
												</select>
												<label>Quad</label>
										</div>
									</div>
									<div>
										<button type="submit" class="btn">
											Mudar quad
										</button>
									</div>
								</div>
							</form>
				    	</div>
				   	</div>
				</div>
			</div>
		</div>
	</main>
</body>

<div class="hide"><?php include $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?></div>

<script>
	$(document).ready(function(){
	    $('ul.tabs').tabs();
	});
</script>