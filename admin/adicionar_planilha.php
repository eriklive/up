<?php 
$nomeDaPágina = 'Enviar Arquivo';

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

<body class="grey lighten-3">
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT']."/admin/menuAdmin.php"; ?>
	</header>
	<main class="container">
		<div class="card">
			<div class="card-content">
				<h3>Fazer upload de arquivo</h3>
				<div class="divider"></div>
				<br>
				<form action="../admin/materias/import.php" method="POST" name="enviarArquivo" enctype="multipart/form-data">
					<div class="row">
						<span class="flow-text">
							O quadrimestre da matrícula costuma ser o próximo quad. Antes de selecionar, vá em "Gerenciar Quads" e adicione o prócimo quadrimestre lá<span class=""></span>
						</span>
					</div>
					<div class="row">
						<div class="input-field col m6 s12" >
							<?php 
								include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
								$sql = mysqli_query($link, "SELECT * FROM quadrimestre ORDER BY quad DESC"); ?> 
							<select name="quad">
								<option value="null" disabled selected id="">Quad</option>
								<? while($exibe = mysqli_fetch_assoc($sql)){
										echo'<option value="'.$exibe["quad"].'">'.$exibe["quad"].'</option>';
									} 
								mysqli_close($link);?> 
							</select>
							<label>Qual o quadrimestre da matrícula?</label>
						</div>
					</div>
					<div class="row">
						<div class="file-field input-field col m9 s12">
							<div class="btn col s12 m6">
								<span>
									<i class="material-icons left">attach_file</i> Selecionar Arquivo
								</span>
								<input type="file" name="fileUpload" id="fileUpload" placeholder="Selecionar Arquivo">
							</div>
				            <br class="hide-on-med-and-up">
				            <br class="hide-on-med-and-up">
				            <br class="hide-on-med-and-up">
						</div>
  						<div>
  							<button value="Enviar" class="btn-large waves-effect waves-light botaoSubmeter col s12 m3" type="submit">
			      			<i class="material-icons right">file_upload</i>Enviar
			      			</button>
			      		</div>
			      	</div>
				</form>	
			</div>
		</div>
	</main>
    <div class="hide">
    	<?php include '../footer.php' ?>
    </div>
</body>
<script>
  	$(document).ready(function() {
  		$('select').material_select();
	});
</script>