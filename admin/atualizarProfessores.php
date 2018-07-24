<?php 
$nomeDaPágina = 'Atualizar Professores';
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
					        		<li class="tab col s4"><a href="#addProfs">Adicionar Professores</a></li>
					        		<li class="tab col s4"><a href="#visualizarProfs">Visualizar Professores</a></li>
					      		</ul>
				    		</div>

						    <div id="attProfs" class="hide">
								<form action="">
									<div class="row" style="display:inline;">
										<div class="input-field col s12 m10">
											<input id="nomeProfessor" type="text">
											<label for="nomeProfessor">Nome do Professor</label>
										</div>
										<div>
											<button type="submit" class="btn waves-light waves-effect"><i class="material-icons">search</i></button>
										</div>
									</div>
								</form>							
						    </div>

						    <div id="addProfs" class="">
								<form action="add_professores.php" method="post">
									<div class="row">
										<div class="input-field col s12 m10 offset-m1">
											<input id="nomeProfessorAdd" name="nomeProfessorAdd" type="text">
											<label for="nomeProfessorAdd">Nome do Professor</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 m4 offset-m1">
											<select name="centro" id="centros">
												<option value="CCNH">CCNH</option>
												<option value="CECS">CECS</option>
												<option value="CMCC">CMCC</option>
											</select>
											<label for="centros">Centro</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field right">
											<button class="btn waves-effect waves-light">Adicionar</button>
										</div>
									</div>
								</form>
							</div>
					   		<div id="visualizarProfs">
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