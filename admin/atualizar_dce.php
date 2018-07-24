<?php 
$nomeDaPágina = 'Atualizar Matérias';
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
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT']."/admin/menuAdmin.php"; ?>
	</header>
	<main>
		<div class="container">
		  	<div class="row">
		  		<div class="col s12">
		  			<div class="card">
				    	<div class="card-content">
				    		<div class="row">	
					      		<ul class="tabs">
					        		<li class="tab col s4"><a href="#redefinirSenha">Redefinir Senha</a></li>
					      		</ul>
				    		</div>

						    <div id="redefinirSenha" class="">
              					<div class="row">
               						<form name="cadastro" action="redefinir_senha.php" method="post" class="col m10 offset-m1" onsubmit="return validarSenha(this);">
										<div class="row"></div>
							    			<div class="row">
							        			<div class="col m12">
							          				<div class="input-field">
							          					<i class="material-icons prefix">lock</i>
							            				<input pattern=".{8,}" id="senha" name="senha1" type="password" required>
							            				<label for="senha" class="">Digite uma nova senha (minimo de 8 caracteres):</label>
							         				</div>
							        			</div>
										   		<div class="col m12">        		
												    <div class="input-field">
												    	<i class="material-icons prefix">lock</i>
												        <input pattern=".{8,}" id="confirmaSenha" name="senha2" type="password" required>
												        <label id="labelConfirmacao" for="confirmaSenha" class="">Digite a senha novamente (pra garantir que está certa!):</label>
												    </div>
									       		</div>
						      				</div>
											<div class="row">
												<button class="btn waves-effect waves-light right"  type="submit" type="submit">
													<span>Redefinir Senha</span>
												</button>
											</div>
									</form>
              					</div>
                  			</div>
      					</div>
					</div>	
				</div>
			</div>	
		</div>			
	</main>
</body>

<footer class="hide"><?php include $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?></footer>
<script>
	function validarSenha(form){
			senhaDigitada = document.cadastro.senha1.value;
			senhaRepetida = document.cadastro.senha2.value;

			if(senhaDigitada != senhaRepetida){
				alert('Digite a senha novamente, pois parece estar errada!');
				document.cadastro.senha2.focus();
				return false;
			}
		}
	$(document).ready(function(){
	    $('ul.tabs').tabs();
    	$('select').material_select();
	});

</script>