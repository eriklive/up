<?php 
$nomeDaPágina = 'Avisos';
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
		  			<div class="card card-movement">
				    	<div class="card-content">
				    		<div class="row">	
					      		<ul class="tabs">
					        		<li class="tab col s4"><a href="#ativo">Ativos</a></li>
					        		<li class="tab col s4"><a href="#criarnovo">Criar Novo</a></li>
					        		<li class="tab col s4"><a href="#antigos">Antigos</a></li>
					      		</ul>
				    		</div>
						    <div id="ativo" class="">
						    <?php 
						    	$table = "avisos";
								$query="SELECT * FROM $table WHERE disp='s'";
								$consulta = mysqli_query($link, $query);
								$numLinhas = mysqli_num_rows($consulta);

								if($numLinhas!=0){ 
							    	while ($PANTONE=mysqli_fetch_assoc($consulta)){ 
							    		echo'
								            <h5><b>Título: </b> '.$PANTONE['titulo'].' </h5>
								            <h5><b>Aviso: </b> '.$PANTONE['aviso'].' </h5> <br>';
								            echo '
												<form action="desativar.php" method="post">
													<input type="text" class="hide" name="id" value="'.$PANTONE['id'].'"></input>
													<button class="btn waves-effect waves-light" type="submit">Desativar Aviso</button>
												</form>
								            ';
								    }
								} else {
									echo '<h4>Não há avisos ativos.</h4>';
								}
							?>
						</div>
							<div id="criarnovo">
								<form action="criaraviso.php" method="post">
									<div class="row">
										<div class="col s12">
											<div class="input-field">
												<input id="titulo" name="titulo" type="text">
												<label for="titulo">Título</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col s12">
											<div class="input-field">
												<input name="aviso" id="aviso" type="text">
												<label for="aviso">Digite um título para o aviso</label>
											</div>
										</div>
									</div>
									<div class="row hide">
										<div class="file-field input-field">
									      	<div class="btn">
									        	<span>Imagem</span>
									        	<input type="file" name="imagem" id="imagem">
									      	</div>
									      	<div class="file-path-wrapper">
									        	<input class="file-path validate" type="text">
									      	</div>
									    </div>
									</div>
									<div class="row">
										<button class="btn waves-effect waves-light right" type='submit'>Criar</button>
									</div>
								</form>
							</div>

					   		<div id="antigos">
							<?php 
						    	$table = "avisos";
								$query="SELECT * FROM $table WHERE disp=''";
								$consulta = mysqli_query($link, $query);
								$numLinhas = mysqli_num_rows($consulta);

								if($numLinhas!=0){ 
							    	while ($PANTONE=mysqli_fetch_assoc($consulta)){ 
							    		echo'
								            <h5><b>Título: </b> '.$PANTONE['titulo'].' </h5>
								            <h5><b>Aviso: </b> '.$PANTONE['aviso'].' </h5><br>';
								            echo '
												<form action="excluir_aviso.php" method="post">
													<input type="text" class="hide" name="id" value="'.$PANTONE['id'].'"></input>
													<button class="btn waves-effect waves-light right red" type="submit">Excluir Aviso</button>
												</form> <br><br> <div class="divider"></div>
								            ';
								    }
								} else {
									echo '<h4>Não há avisos ativos.</h4>';
								}
							?>
				   			</div>
				   		</div>
				   	</div>
				</div>
			</div>
		</div>
	</main>
</body>

<footer class="hide"><?php include $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?></footer>
<script>
	$(document).ready(function(){
	    $('ul.tabs').tabs();
    	$('select').material_select();
	});
</script>
</body>

<footer class="hide"><?php include $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?></footer>
<script>
	$(document).ready(function(){
	    $('ul.tabs').tabs();
    	$('select').material_select();
	});
</script>