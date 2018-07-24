<?php
	$nomeDaPágina = 'Descomplica UFABC';

	include "./header.php";
	include "./php/sessao.php";
	include "./connections/database-pdo.php";

	$materia = $_POST['materias'];
	$professor = $_POST['professor'];
?>

<style type="text/css" media="screen">
	.autocomplete-content {
	    position: absolute;
	} 
</style>

<body class="grey lighten-4">
	<header>
		<?php include './menu.php' ?>
	</header>
	<main class="container">
			<div class="row hide">
				<div class="col m10 offset-m1">
					<form action="">
						<div class="input-field col m10 s8 offset-s1">
							<input type="text" id="pesquisar">
							<label for="pesquisar">Pesquisar</label>
						</div>
						<div class="input-field col m1 s2">
							<input value="SS" type="submit" class="btn waves-effect waves-light">
						</div>
					</form>
				</div>
			</div>

			<div class="card">
				<div class="card-content">
					<div class="row">
						<form id="selecao" method="post" action="index.php">
							<div class="input-field col m2 s10 offset-s1">
								<select name="bi" id="bi">
									<option value="0" disabled selected id="">BI</option>
									<option value="cursos_bct" id="">BC&T</option>
									<option value="cursos_bch" id="">BCH</option>
								</select>
								<label>Qual seu BI principal?</label>
							</div>
							<div id="cursos" class="input-field col m3 s10 offset-s1">
								<select name="cursos" disabled> 
									<option value="" disabled selected>Curso</option>
								</select>
								<label>Qual o seu curso? </label>
							</div>
							<div id="materias" class="input-field col m3 s10 offset-s1">
								<select name="materias" disabled> 
									<option value="" disabled selected>Materias</option>
								</select>
								<label>Matérias</label>
							</div>
							<div class="input-field col s10 offset-s1 m3">
					          	<input type="text" id="autocomplete-input" name="professor" value="" class="autocomplete">
					          	<label for="autocomplete-input">Professor (opcional)</label>
					        </div>
							<div class="col m1 s2 offset-s9" >
								<button class="btn-floating btn-large waves-effect waves-light" type="submit" name="action">
							    	<i class="material-icons right">search</i>
							  	</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<!-- CONTENT -->
			<?php 
				if($materia != ''){ ?>
				<div>
					<div class="">
						<div class="grey lighten-4">
							<? include "./home/resultados.php"; ?>
						</div>
					</div>
				</div>
			<? } else {?>
			<div>
				<div class="card cardResultados center">
					<div class="card-content">
						<img id="imgLamp" class="responsive-img" src="./img/luminaria.png" alt="">
						
						<div id="resultados" class="resultados grey lighten-4">
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
	</main>

	<script src="https://descomplica.dceufabc.com/js/jquery.min.js"></script>
	<script type="text/javascript" src="https://descomplica.dceufabc.com/js/materialize.min.js"></script>

    <?php include './footer.php'; ?>


    <script>
	    $(document).ready(function(){
	        $('#bi').change(function(){
	            $('#cursos').load('./home/listaCursos.php?bi='+$('#bi').val());
	        });
	        //Autocomplete
			$(function() {
			    $.ajax({
			      type: 'GET',
			      url: 'https://descomplica.dceufabc.com/api/professores.php',
			      success: function(response) {
			        var countryArray = response;
			        var dataCountry = {};
			        for (var i = 0; i < countryArray.length; i++) {
			          console.log(countryArray[i].name);
			          dataCountry[countryArray[i]] = null; //countryArray[i].flag or null
			        }
			        $('input.autocomplete').autocomplete({
			          data: dataCountry,
			          limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
			        });
			      }
			    });
			});
		}); 	   
	</script>

<?

$server_data = $connection->prepare("SELECT * FROM avisos WHERE disp='s'");
$server_data->execute();
$numLinhas = $server_data->rowCount();

if($numLinhas == 1 AND $_SESSION['aviso'] == 0) {
	while ($aviso = $server_data->fetch()){
		$_SESSION['aviso'] = 1;
		echo'
		    <div id="aviso" class="modal">
	            <div class="modal-content">
	        	    <h4 class="inline"> <i class="material-icons yellow-text text-darken-2 small left">warning</i> '.$aviso['titulo'].' </h4>
	                <p> '.$aviso['aviso'].' </p>
	            </div>
	            <div class="modal-footer">
	                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok!</a>
	            </div>
	        </div>
	        
	        <script>
	            $(document).ready(function(){
	                $("#aviso").modal("open");
	            });
	        </script>';
    }
}
$server_data->close();?>