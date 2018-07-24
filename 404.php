<?php
$nomeDaPágina = 'Página não encontrada';

include $_SERVER['DOCUMENT_ROOT']."/header.php";

$materia = $_POST['materias'];
?>

<body class="grey lighten-2">
	<header>
		
	</header>
	<main class="container">
		<div class="row center">
			<h1 class="grey-text text-darken-2" style="font-weight: 600 ">Erro 404:</h1>
			<h1 class="grey-text text-darken-2" style="font-weight: 600 ">Página não encontrada.</h1>
			<br><br>
			<a 
				href="https://descomplica.dceufabc.com" 
				class="btn grey waves-effect waves-light grey-text text-darken-4"
			>
				Retornar ao site
			</a>
		</div>
	</main>
	
	<div class="hide">
		<?php include 'footer.php'; ?>
	</div>
	

