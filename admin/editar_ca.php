<!--if($deletar){
	mysqli_close($link);
	$nomeDaPágina = 'Sucesso!';
	$text="Aviso desativado com sucesso!";
	$linkRetorno="../admin/avisos.php";
   	include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
} else {
	mysqli_close($link);
	$nomeDaPágina = 'Erro :/';
	$text="Algo deu errado ao desativar o aviso";
	$linkRetorno="../admin/avisos.php";
   	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
}-->
<?php 
$nomeDaPágina = 'Editar CA';
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
	<header class="">
		<?php include $_SERVER['DOCUMENT_ROOT']."/admin/menuAdmin.php"; ?>
	</header>
	<main>
		<div class="container">
		  	<div class="row">
		  		<div class="col s12">
		  			<div class="card card-movement">
				    	<div class="card-content">
				    	<?php 
							include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
							include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";
							$id = $_POST["id"];

							$table = "dados";
							$query="SELECT * FROM `$table` WHERE `id`='".$id."'";
							$visualizar = mysqli_query($link, $query);

							while($exibir=mysqli_fetch_assoc($visualizar)){
								echo"
								<p>
								<h5>Usuário: ".$exibir['user']."</h5>
								<h5>Email atual: ".$exibir['email']."</h5>
								<br>
								<h3>Desativar</h3>
								<form action='desativar_ca.php' method='post'>
									<input name='id' value='".$id."' class='hide'>
									<div class='row'>
										<div class='input-field col s12'>
											<input name='senha' type='text'>
											<label for='senha'>Nova senha</label>
										</div>
									</div>
									<div class='row'>
										<div class='input-field col s12'>
											<input name='email' type='text'>
											<label for='email'>Novo email</label>
										</div>
									</div>
									<button class='btn waves-effect waves-light red right'>Desativar CA</button>
								</form>
								</p>
								";
							}
						?>
				   		</div>
				   	</div>
				</div>
			</div>
		</div>
	</main>
</body>

<div class="hide"><?include $_SERVER['DOCUMENT_ROOT']."/footer.php";?></div>
<script>
	$(document).ready(function(){
	    $('ul.tabs').tabs();
    	$('select').material_select();
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