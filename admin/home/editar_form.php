<?php 
$nomeDaPágina = 'Editar CA';

include "../../header.php";
include "../../php/sessao_dce.php";
include "../../connections/database-pdo.php";

$id = $_GET["id"];

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
	<header class="">
		<?php include "../menuAdmin.php"; ?>
	</header>
	<main>
		<div class="container">
		  	<div class="row">
		  		<div class="col s12">
		  			<div class="card card-movement">
				    	<div class="card-content">
				    	<?php 
							$server_data = $connection->prepare("SELECT * FROM arquivos WHERE id = :id");
							$server_data->bindValue(':id', $id);
							$server_data->execute();
							$data = $server_data->fetch();
							echo '
								<form method="post" name="editar_arquivo" action="editar.php">
									<div class="input-field">
										<input type="text" id="materia" name="materia" value="'.$data['materia'].'"/>
										<label for="materia">Código da matéria</label>
									</div>
									<div class="input-field">
										<input type="text" id="tipo" name="tipo" value="'.$data['tipo'].'"/>
										<label for="tipo">Tipo</label>
									</div>
									<div class="input-field">
										<input type="text" id="descricao" name="descricao" value="'.$data['subtipo'].'"/>
										<label for="descricao">Descrição</label>
									</div>
									<div class="input-field hide">
										<input type="text" id="id" name="id" value="'.$data['id'].'"/>
										<label for="id">ID</label>
									</div>
									<button 
										class="btn 
										waves-effect waves-light right" 
										type="submit"
									>
										Atualizar
										<i class="material-icons right">send</i>
									</button>
									<br />
								</form>'
							
						?>
				   		</div>
				   	</div>
				</div>
			</div>
		</div>
	</main>
</body>

<div class="hide"><?include "../../footer.php";?></div>
<script>
	$(document).ready(function(){
    	$('.modal').modal();
	});

	function validarSenha(form){
		senhaDigitada = document.cadastro.senha1.value;
		senhaRepetida = document.cadastro.senha2.value;

		if(senhaDigitada != senhaRepetida){
			alert('Digite a senha novamente, pois parece estar errada!');
			document.cadastro.senha2.focus();
			return false;
		}
	}
</script>