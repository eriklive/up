<?php 
$nomeDaPágina = 'Editar Conta';

include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao.php";
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<body class="grey lighten-4">
	<header>
		<?php include  $_SERVER['DOCUMENT_ROOT'].'/menu.php' ?>
	</header>
	<main class="container">
 		<div class="row">
        	<div class="col s12 m12">
          		<div class="card card-movement">
            		<div class="card-content">
            			<h3>Alterar Senha</h3>
            			<div class="divider"></div>
              			<div class="row">
               				<form name="cadastro" action="perdeuSenha.php" method="post" class="col m10 offset-m1" onsubmit="return validarSenha(this);">
								<div class="row"></div>
						  		<div class="row">
									<div class="input-field col m6">
										<i class="material-icons prefix">account_circle</i>
										<input id="usuario" name="usuario" type="text" value="<?php echo $_SESSION['user']; ?>" required>
										<label for="usuario" class="">Seu usuário</label>
									</div>
							    	    		
									<div class="input-field col m5">
										<i class="material-icons prefix">vpn_key</i>
										<input id="token" name="token" type="text" required>
										<label for="token" class="">Token</label>
									</div>
									<div style="padding-top:20px;">
										<a class="tooltipped black-text" href="#ajuda" data-position="right" data-delay="10" data-tooltip="Não se lembra do token? Clica aqui, rapidão">
											<i class="material-icons">help</i>
										</a>
									</div>	
						 		</div>
							    <div class="row">
							        <div class="col m12">
							          	<div class="input-field">
							          		<i class="material-icons prefix">lock</i>
							            	<input pattern=".{8,}" id="senha" name="senha1" type="password" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Com no mínimo 8 caracteres!" required>
							            	<label for="senha" class="">Nova senha:</label>
							         	</div>
							        </div>
							   		<div class="col m12">        		
									    <div class="input-field">
									    	<i class="material-icons prefix">lock</i>
									        <input pattern=".{8,}" id="confirmaSenha" name="senha2" type="password" required>
									        <label id="labelConfirmacao" for="confirmaSenha" class="">Repita a senha:</label>
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
	</main>
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
<div id="ajuda" class="modal">
    <div class="modal-content">
    	<span class="flow-text">O token é uma sequência numérica que foi enviado ao seu email logo que você se cadastrou no portal. Se não possuir mais esse token, faça logout do portal e clique no ponto de interrogação ao lado do campo "senha", na página de login. Isso irá lhe guiar para redefinir sua senha, como se vocâ a tivesse esquecido.</span>
	    
    </div>
</div>

<div class="row"></div>
<?php include $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?>