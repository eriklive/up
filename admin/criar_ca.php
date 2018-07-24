<?php 
$nomeDaPágina = 'Gerenciar CAs';
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
				    		<div class="row">	
					      		<ul class="tabs">
					        		<li class="tab col s4"><a href="#addCa">Criar um novo CA</a></li>
					        		<li class="tab col s4"><a href="#visualizarCA">CA's já criados</a></li>
					      		</ul>
				    		</div>
						    <div id="addCa" class="">
								<form action="add_ca.php" method="post" onsubmit="return validarSenha(this);">
									<div class="row">
										<div class="input-field col s12 m6">
											<input id="nomeCA" name="nomeCA" type="text" required>
											<label for="nomeCA">Nome do CA</label>
										</div>
										<div class="input-field col s12 m6">
											<input id="user" name="user" type="text" placeholder="ca.exemplo" required>
											<label for="user">Usuário</label>
										</div>
									</div>
									<div class="row">	
										<div class="input-field col s12">
											<input id="email" name="email" type="text" required>
											<label for="user">eMail</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 m6">
											<input id="senha" name="senha" type="password" placeholder="ca.exemplo" pattern=".{8,}" required>
											<label for="senha">Senha (8 caracteres)</label>
										</div>
										<div class="input-field col s12 m6">
											<input id="confirmarSenha" name="confirmarSenha" type="password" placeholder="ca.exemplo">
											<label for="confirmarSenha">Repita a senha</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field right" style=>
											<button class="btn waves-effect waves-light">Criar CA</button>
										</div>
									</div>
								</form>
							</div>
							<div id="visualizarCA">
								<div class="row">
									<div class="col m12">
										<div class="row">
												<tbody>
													<?php 
														$table = "dados";
														$sql = mysqli_query($link, "Select * FROM $table WHERE `habilitado` = 'ca'");

														while($exibe = mysqli_fetch_assoc($sql)){
														  	echo 
															  	"<form action='editar_ca.php' method='POST'>
															  		<div class='row'>
																  		<div class='col s6'>
																  			<h5>".$exibe['user']."</h5>
																  		</div>
																  		<input value='".$exibe['id']."' name='id' class='hide'>
																  		<div class='col s6'>
																	  		<button type='submit' class='btn waves-effect waves-light right'>
																	  			Editar
																	  		</button>
																	  	</div>
																  	</div>
																</form>";
														}
													?>
												</tbody>
										</div>
									</div>
								</div>
				   			</div>
				   		</div>
				   	</div>
				</div>
			</div>
		</div>
	</main>
</body>
<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      	<h4>Editar CA</h4>
      	<div class="row">
      		<div class='switch'>
			    <label class='flow-text'>
			      	Upload
			      	<input type='checkbox'>
			      	<span class='lever'></span>
			      	Habilitado
			    </label>
			</div>
      	</div>
    </div>
    <div class="modal-footer">
    	<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat red-text ">Cancelar</a>
      	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Confirmar</a>
    </div>
  </div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

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