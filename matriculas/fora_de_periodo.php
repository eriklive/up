<?php 
$nomeDaPágina = 'Descomplica UFABC';

include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>
<body class="red lighten-1">
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT'].'menu.php' ?>
	</header>
	<main class="container">
		<div class="center">
			<h1 class="white-text">Sistema fora de período</h1>
			<span class="flow-text grey-text text-lighten-2">
				Visando melhorar a oferta de turmas nos próximos quadrimestres, o DCE irá disponibilizar um <b><i>sistema de intenção de matrículas</i></b> : Um simulado do sistema oficial de matrículas onde poderemos ver quais matérias terão mais procura, para assim providenciarmos uma solução!
			</span>
			<br><br><br>
			<div class="center">
				<a class="waves-effect waves-red btn white red-text" href="https://descomplica.dceufabc.com/">Retornar</a>
			</div>
		</div>
	</main>
    <?php include 'footer.php'; ?>