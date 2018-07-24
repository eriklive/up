<?php 
	$nomeDaPágina = 'Erro ou sugestão';

	include $_SERVER['DOCUMENT_ROOT']."/header.php";
	include $_SERVER['DOCUMENT_ROOT']."/php/sessao.php";
	include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";

	$materia = $_POST['materias'];
?>
<body class="grey lighten-4">
	<header>
		<?php include 'menu.php' ?>
	</header>
	<main class="container">
			<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSe3Td7dti-mlsmwmTAYD-gNPpsmDiEJC3l9RDwpnFbGpAyLnA/viewform?embedded=true" width="760" height="500" frameborder="0" marginheight="0" marginwidth="0">Carregando…</iframe>
	</main>

 <?php include 'footer.php'; ?>

