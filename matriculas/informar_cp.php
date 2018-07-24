<?php 
$PageName='Matérias';

include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<body class="grey lighten-4">
	<header>	
		<?php include $_SERVER['DOCUMENT_ROOT'].'/menu.php' ?>
	</header>

	<main class="container">	
		<div class="card center">
			<div class="card-content">
				<form action="gravar_cp.php" method="POST">
					<span >Para continuar, é necessário nos informar seu CP: </span>
					<div class="input-field col s12 m6">
						<input type="text" name="cp">
						<label >CP</label>
					</div>
					<div class="row">
						<br>		
						<button type="submit" class="btn">Finalizar</button>
					</div>			
				</form>
			</div>
		</div>
	</main>

	<? 	include $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?>
<script type="">
	$(document).ready(function(){
	    $('#bi').change(function(){
	        $('#cursos').load('listaCursos.php?bi='+$('#bi').val());
	    });
	});
</script>