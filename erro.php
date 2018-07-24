<?php  
$nomeDaPágina = 'Erro!';

include $_SERVER['DOCUMENT_ROOT']."/header.php"; ?>

<body class="red">
	<div class="container">
		<div class="row" style="margin-top:15%;">
			<div class="card col s12 m6 offset-m3 v-align red lighten-4 red-text">
				<h1 class="center"><i class="material-icons red-text" style="font-size:100px;">close</i></h1>
				<p class="center flow-text"><?php echo $text; ?></p>
				<div class="row center">
					<a href="<?php echo $linkRetorno; ?>" class="red accent-4 btn waves waves-effect center">Retornar</a>
				</div>
			</div>
		</div>
	</div>
</body>