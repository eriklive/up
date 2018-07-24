<?php 
$nomeDaPágina = 'Sucesso!';

include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>
<body class="green">
	<div class="container">
		<div class="row" style="margin-top:15%;">
			<div class="card col s12 m6 offset-m3 v-align green lighten-4 green-text">
				<h1 class="center"><i class="material-icons green-text" style="font-size:100px;">done</i></h1>
				<p class="center flow-text"><?php echo $text; ?></p>
				<div class="row center">
					<a href="<?php echo $linkRetorno; ?>" class="green accent-4 btn waves waves-effect center">Continuar</a>
				</div>
			</div>
		</div>
	</div>
</body>