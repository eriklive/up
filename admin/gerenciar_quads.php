<?php 
$nomeDaPágina = 'Gerenciar Quads';
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

    .header {
	    color: #03442b;
	    font-weight: 300;
	}
</style>

<body class="grey lighten-4">
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT']."/admin/menuAdmin.php"; ?>
	</header>
	<main>
		<div class="container">
		  	<div class="row">
		  		<div class="col s12">
		  			<div class="card card-movement">
				    	<div class="card-content">
				    		<div class="row">	
					      		<ul class="tabs">
					        		<li class="tab col s4"><a href="#addQuad">Adicionar Quad</a></li>
					        		<li class="tab col s4"><a href="#visualizarQuad">Visualizar Quads</a></li>
					      		</ul>
				    		</div>
						    <div id="addQuad" class="">
						    	<form action="add_quad.php" method="post">
									<div class="row">
										<div class="input-field col s12 m12">
											<input id="quadrimestre" name="quadrimestre" type="text" placeholder="20XX.X">
											<label for="quadrimestre">Quadrimestre: </label>
										</div>
									</div>
									<div class="row">
										<div class="input-field right">
											<button class="btn waves-effect waves-light">Adicionar</button>
										</div>
									</div>
								</form>
							</div>
					   		<div id="visualizarQuad">
								<div class="row center">
									<div class="col m12">
										<h2 class="header left">Quadrimestres</h2>
										<div class="row">
											<table class="striped col m12">
												<thead>
													<tr class="green-text">
														<th class="flow-text">Quads</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														$table = "quadrimestre";
														$sql = mysqli_query($link, "Select * FROM $table ORDER BY quad DESC");

														while($exibe = mysqli_fetch_assoc($sql)){
														  	echo 
															  	"<tr>
															  		<th class='flow-text'>".$exibe['quad'] ."</th>"."
														  		</tr>";
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