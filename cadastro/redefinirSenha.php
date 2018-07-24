<?php 
$nomeDaPágina = 'Redefinir Senha';
include $_SERVER['DOCUMENT_ROOT']."/header.php";

session_start();

if ((!isset ($_SESSION['user'])== true) and (!isset ($_SESSION['senha'])==true)) { ?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<body class="blue-grey lighten-5">
		<div class="container">
	 		<div class="row">
	        	<div class="col s12 m10 offset-m1">
	          		<div class="card card-movement">
	            		<div class="card-image green">
	              			<div style="height:180px; padding:50px;" class="center">
	              				<i class="material-icons large green-text text-lighten-5" aria-hidden="true">
	              					lock
	              				</i>
	              			</div>
	            		</div>
	            		<div class="card-content">
	            			<h3>Redefinir Senha</h3>
	              			<div class="row">
	               				<form name="cadastro" action="perdeuSenha.php" method="post" class="col m10 offset-m1" onsubmit="return validarSenha(this);">
									<div class="row"></div>
							  		<div class="row">
										<div class="input-field col m6">
											<i class="material-icons prefix">account_circle</i>
											<input id="usuario" name="usuario" type="text" required>
											<label for="usuario" class="">Seu usuário</label>
										</div>
								    	    		
										<div class="input-field col m6">
										<i class="material-icons prefix">vpn_key</i>
											<input id="token" name="token" type="text" required>
											<label for="token" class="">Token</label>
										</div>	
							 		</div>
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
										<div class="btn-flat">
											<a class="grey-text text-darken-3" href="https://descomplica.dceufabc.com/">Cancelar</a>
										</div>
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
		</script>
	</body>
	<div class="row"></div>
	<?php include $_SERVER['DOCUMENT_ROOT']."/footer.php"; 
} else { 
	header("location:https://descomplica.dceufabc.com/home.php"); 
}?>