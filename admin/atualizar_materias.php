<?php 
$nomeDaPágina = 'Atualizar Matérias';
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
		<div class="container">
		  	<div class="row">
		  		<div class="col s12">
		  			<div class="card card-movement">
				    	<div class="card-content">
				    		<div class="row">	
					      		<ul class="tabs">
					        		<li class="tab col s4"><a href="#addMaterias">Adicionar Materias</a></li>
					        		<li class="tab col s4"><a href="#visualizarMaterias">Visualizar Materias</a></li>
					      		</ul>
				    		</div>

						    <div id="attMaterias" class="hide">
								<form action="">
									<div class="row" style="display:inline;">
										<div class="input-field col s12 m10">
											<input id="nomeProfessor" type="text">
											<label for="nomeProfessor">Nome da Materias</label>
										</div>
										<div>
											<button type="submit" class="btn waves-light waves-effect"><i class="material-icons">search</i></button>
										</div>
									</div>
								</form>							
						    </div>

						    <div id="addMaterias" class="">
						    	<p class="flow-text">ATENÇÃO: O campo "sigla do cruso" tem uma sigla específica. Para saber qual é a sigla que procura, vá até a secão "atualizar cursos" e clique em "visualizar cursos". É necessário preencher esse campo corretamente ou a matéria não irá aparecer nas buscas.</p>
						    	<br>
								<form action="add_materias.php" method="post">
									<div class="row">
										<div class="input-field col s12 m10 offset-m1">
											<input id="nomeDaMateriaAdd" name="nomeDaMateriaAdd" type="text">
											<label for="nomeDaMateriaAdd">Nome da Materia</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 m5 offset-m1">
											<input id="nomeDoCursoAdd" name="nomeDoCursoAdd" type="text">
											<label for="nomeDoCursoAdd">Sigla do Curso</label>
										</div>
										<div class="input-field col s12 m5">
											<input id="codMateria" name="codMateria" type="text">
											<label for="codMateria">Código da Matéria*</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field right">
											<button class="btn waves-effect waves-light">Adicionar</button>
										</div>
									</div>
								</form>
							</div>
					   		<div id="visualizarMaterias">
								<div class="row center">
									<div class="col m12">
										<table class="striped col m12">
											<thead>
												<tr>
													<th>Nome da Matéra</th>
													<th>Cod da matéria</th>
													<th>Curso</th>
												</tr>
											</thead>

											<tbody>
												<?php 
													$table = "disciplinas";
													$sql = mysqli_query($link, "Select * FROM $table");

													while($exibe = mysqli_fetch_assoc($sql)){
													  	echo 
														  	"<tr>
														  		<th>".$exibe['nome'] ."</th>"."
														  		<th>".$exibe['cod'] ."</th>"."
														  		<th>".$exibe['curso'] ."</th>"."
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
	</main>
</body>

<footer class="hide"><?php include $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?></footer>
<script>
	$(document).ready(function(){
	    $('ul.tabs').tabs();
    	$('select').material_select();
	});

</script>