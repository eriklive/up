<?php 
$nomeDaPágina = 'Cadastrar-se';

include $_SERVER['DOCUMENT_ROOT']."/header.php";

session_start();

if ((!isset ($_SESSION['user'])== true) and (!isset ($_SESSION['senha'])==true)) { ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<body class="blue-grey lighten-5">
	<div class="container">
 		<div class="row">
        	<div class="col s12 m10 offset-m1">
          		<div class="card">
            		<div class="card-image green">
              			<div style="height:180px; padding:50px;" class="center">
	              				<i class="material-icons large green-text text-lighten-5" aria-hidden="true">
	              					lock
	              				</i>
	              			</div>
            		</div>
            		<div class="card-content">
              			<div class="row">
               				<form name="cadastro" action="cadastro.php" method="post" class="col m10 offset-m1" onsubmit="return validarSenha(this);">
								<div class="row"></div>
						  		<div class="row">
									<div class="input-field col m5">
										<i class="material-icons prefix">account_circle</i>
										<input id="usuario" name="usuario" type="text" required>
										<label for="usuario" class="">Usuário do tidia</label>
									</div>
							    	<div class="input-field col m5 offset-m1" required>
							    		<i class="material-icons prefix">assignment_ind</i>
										<input id="ra" name="ra" type="text">
										<label for="ra" class="">RA</label>
									</div>	    		
									<div class="input-field col m5">
									<i class="material-icons prefix">vpn_key</i>
										<input id="token" name="token" type="text" required>
										<label for="token" class="">Token</label>
									</div>	
						 		</div>
							    <div class="row">
							        <div class="col m12">
							          	<div class="input-field">
							          		<i class="material-icons prefix">lock</i>
							            	<input pattern=".{8,}" id="senha" name="senha1" type="password" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Com no mínimo 8 caracteres!" required>
							            	<label for="senha" class="">Senha:</label>
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
									<i class="btn waves-effect waves-light waves-input-wrapper right" style=""><input value="Verificar email" class="waves-button-input" type="submit"></i>
								</div>
							</form>
              			</div>
            		</div>
          		</div>
        	</div>
      	</div>
	</div>
	<script>
		/*function validarCampo(input){
			if(input.value != document.cadastro.senha2){
					String classe = "input:not([type]):focus:not([readonly]) + label,input[type=text]:not(.browser-default):focus:not([readonly]) + label,input[type=password]:not(.browser-default):focus:not([readonly]) + label,input[type=email]:not(.browser-default):focus:not([readonly]) + label,input[type=url]:not(.browser-default):focus:not([readonly]) + label,input[type=time]:not(.browser-default):focus:not([readonly]) + label,input[type=date]:not(.browser-default):focus:not([readonly]) + label,input[type=datetime]:not(.browser-default):focus:not([readonly]) + label,input[type=datetime-local]:not(.browser-default):focus:not([readonly]) + label,input[type=tel]:not(.browser-default):focus:not([readonly]) + label,input[type=number]:not(.browser-default):focus:not([readonly]) + label,input[type=search]:not(.browser-default):focus:not([readonly]) + label,textarea.materialize-textarea:focus:not([readonly]) + label"	
					document.getElementById.confiraSenha.style.classe="color: red;"
																

			}
		}*/
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
} 	else { header("location:https://descomplica.dceufabc.com/home.php"); }?>
