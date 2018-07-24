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
				    		<div class="row">	
					      		<ul class="tabs">
					        		<li class="tab col s4"><a href="#sistema">Sistema</a></li>
					        		
					      		</ul>
				    		</div>
						    <div id="sistema">
								<?php 
						    		$sql = mysqli_query($link, "SELECT * FROM matriculas WHERE id = '1'");
						    		$data = mysqli_fetch_assoc($sql);

						    		if ($data["aberto"] == 'n'){ ?>
										<form action="#" method="POST">
											<div class="row" style="display: inline;">
												<h3 class="col m8 s12">Abrir sistema?</h3>
												<div class="input-field hide">
													<input type="text" name="estado" value="s">
												</div>
												<div>
													<button type="submit" class="btn">
														Abrir Sistema
													</button>
												</div>
										</form>
						    		<? } else { ?>
										<form action="#" method="POST">
											<div class="row" style="display: inline;">
												<h3 class="col m8 s12">Fechar sistema?</h3>
												<div class="input-field hide">
													<input type="text" name="estado" value="n">
												</div>
												<div>
													<button type="submit" class="btn">
														Fechar Sistema
													</button>
												</div>
											</div>
										</form>
						    	<? } ?>
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
	if($estado=='n'){
		$sql = "UPDATE dados SET cp = ''";
		$update = mysqli_query($link, $sql);
		mysqli_close($link);
	}
	?>
	<script>
		window.location = "https://descomplica.dceufabc.com/admin/gerenciar_matriculas.php";
	</script>
	<?
}

?>

<footer class="hide"><?php include $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?></footer>

<script>
	$(document).ready(function(){
	    $('ul.tabs').tabs();
	});
</script>