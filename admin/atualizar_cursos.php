<?php 
$nomeDaPágina = 'Atualizar Cursos';
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
					        		<li class="tab col s4"><a href="#addCurso">Adicionar Curso</a></li>
					        		<li class="tab col s4"><a href="#visualizarCurso">Visualizar Cursos</a></li>
					      		</ul>
				    		</div>
						    <div id="addCurso" class="">
						    	<p class="flow-text">ATENÇÃO: O campo "sigla do curso" deve ser, preferencialmente, a sigla dada pela prograd. Para ver exemplos das siglas já utilizadas, clique na guia "visualizar cursos", logo acima. É necessário preencher esse campo corretamente ou a matéria não irá aparecer nas buscas.</p>
						    	<br>
								<form action="add_cursos.php" method="post">
									<div class="row">
										<div class="input-field col s12 m10 offset-m1">
											<input id="nomeDoCursoAdd" name="nomeDoCursoAdd" type="text">
											<label for="nomeDoCursoAdd">Nome do Curso</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 m5 offset-m1">
											<input id="siglaDoCurso" name="siglaDoCurso" type="text">
											<label for="siglaDoCurso">Sigla do Curso*</label>
										</div>
										<div class="input-field col s12 m5">
											<select name="bi" id="bi">
												<option value="bct">BC&T</option>
												<option value="bch">BCH</option>
											</select>
											<label for="bi">BI</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field right">
											<button class="btn waves-effect waves-light">Adicionar</button>
										</div>
									</div>
								</form>
							</div>
					   		<div id="visualizarCurso">
								<div class="row center">
									<div class="col m12">
										<h2 class="header left">Cursos do BCH</h2>
										<div class="row">
											<table class="striped col m12">
												<thead>
													<tr class="green-text">
														<th>Nome do Curso</th>
														<th>Sigla</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														$table = "cursos_bch";
														$sql = mysqli_query($link, "Select * FROM $table");

														while($exibe = mysqli_fetch_assoc($sql)){
														  	echo 
															  	"<tr>
															  		<th>".$exibe['nome_curso'] ."</th>"."
															  		<th>".$exibe['valor'] ."</th>"."
														  		</tr>";
														}
													?>
												</tbody>
											</table>
										</div>
										<h2 class="header left">Cursos do BCT</h2>
										<div class="row">
											<table class="striped col m12">
												<thead>
													<tr class="green-text">
														<th>Nome do Curso</th>
														<th>Sigla</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														$table = "cursos_bct";
														$sql = mysqli_query($link, "Select * FROM $table");

														while($exibe = mysqli_fetch_assoc($sql)){
														  	echo 
															  	"<tr>
															  		<th>".$exibe['nome_curso'] ."</th>"."
															  		<th>".$exibe['valor'] ."</th>"."
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