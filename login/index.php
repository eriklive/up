<?php 
date_default_timezone_set('America/Sao_Paulo');
$hora = date("H");

if (($hora>18)or($hora<=6)) {
	$cores_gradiente = "#45283E, #1A258C, #587ED8";
} else if (($hora>6) && ($hora<=15)) {
	$cores_gradiente = "#000, #fff";
    $cores_gradiente = "#587ED8, #94C1EF, #fff";
} else {
	$cores_gradiente = "#000, #fff";
	$cores_gradiente = "#DA7204, #F7DB00";
}	
?>
<style>
.divImgFundo{
	position: fixed;
	height:100%;
	z-index:-1;
	margin-left: 7%;
}

.containerIndex {
	z-index:1;
	background-size: 100%;
	background-position: bottom;
	background-repeat: no-repeat;
}

.imgLogoCardLogin{
	width:60% !important;
	margin-left:20%;
	padding: 10% 0;
}
</style>

<body style="background-image: linear-gradient(to bottom, <?php echo $cores_gradiente; ?>);">
	<div class="divImgFundo">
		<img style="height:100%;" src="../img/fundo.png" alt="" class="responsive-img">
	</div>
	<div class="container containerIndex">
		<div class="row">
			<div class="col s12 m8 l6 offset-m2 offset-l3 ">
				<div class="card card-movement z-depth-5" style="overflow: hidden;">
					<div class="card-image center">
						<img class="imagem imgLogoCardLogin" src="./img/logo.png">
					</div>
				  	<div class="content">
					  	<div class="row">
						    <div class="col s12" style="margin-bottom: 20px;">
						      	<ul class="tabs">
						       		<li class="tab col s6"><a class="active" href="#abaLogin">Log in</a></li>
						        	<li class="tab col s6"><a href="#abaRegistrar">Registrar</a></li>
						      	</ul>
						    </div>
						    <div id="abaLogin" class="col s12">
						    	<form action="./php/login.php" method="post" id="login-material" class="login-form">
									<div class="row">
										<div class="input-field col m10 offset-m1 s10 offset-s1">
											<i class="material-icons prefix">account_circle</i>
											<input id="user" name="user" type="text" required>
											<label for="user">Usuário</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col m9 offset-m1 s9 offset-s1">
											<i class="material-icons prefix">lock</i>
											<input id="senha" name="senha" type="password" required>
											<label for="senha">Senha</label>
										</div>
										<div style="padding-top:20px;">
											<a class="tooltipped grey-text text-darken-2" href="#RedefinirSenha" data-position="right" data-delay="10" data-tooltip="Esqueceu a senha?">
												<i class="material-icons">help</i>
											</a>
										</div>
									</div>
									<div style="display:inline;" class="row">
									  	<div class="col m6 s12 left">
									    	<a href="#RedefinirSenha" class="waves-effect waves-teal btn-flat grey-text col s12">Perdeu a senha?</a>
									  	</div>
									    <div class="col m6 s12 right">
									    	<button class="btn waves-effect waves-light right col s12 m8" type="submit" name="action">Login
									    		<i class="material-icons right">send</i>
									  		</button>
										</div>
									</div>	
								</form>
						    </div>
						    <div id="abaRegistrar" class="col s12">
						    	<form 
						    		name="registrar" 
						    		action="../cadastro/send_email.php"
						    		method="post"
						    		onsubmit="return validarRA(this);"
						    	>
									<div class="row">
										<div class="input-field col m10 offset-m1 s10 offset-s1">
											<i class="material-icons prefix">assignment_ind</i>
											<input name="ra" id="ra" type="text" required>
											<label for="ra" class="active">RA</label>
										</div>
										<div class="input-field col m10 offset-m1 s10 offset-s1">
											<i class="material-icons prefix">assignment_ind</i>
											<input name="raReTyped" id="raReTyped" type="text" required>
											<label for="raReTyped" class="active">Repita seu RA</label>
										</div>
										<div class="input-field col m10 offset-m1 s10 offset-s1">
											<i class="material-icons prefix">account_circle</i>
											<input name="user" id="user_signup" type="text" required>
											<label for="user_signup">Usuário do tidia (nome.exemplo)</label>
										</div>
									</div>
									<div class="row">
										<div class="col s8 offset-s1 m8 offset-m1"><div class="g-recaptcha" data-sitekey="6LfVckEUAAAAAMOPhLXyVvGR29RtIVoU55ZxNmL5"></div></div>
									</div>
									<div class="row">
										<div class="input-field col s6 offset-s7 m6 offset-m7">
											<input type="submit" value="Registrar" class="waves-effect waves-light btn">
										</div>
									</div>
								</form>
						    </div>
						    
						</div>
				  	</div>
				</div>
			</div>
		</div>
	</div>

<div id="RedefinirSenha" class="modal">
    <div class="modal-content">
    	<span class="flow-text">Caso ainda tenha o token enviado ao seu email, <a href="../cadastro/redefinirSenha.php">clique aqui</a>. Caso contrário, informe seu usuário do tidia novamente que lhe reenviaremos o token.<br></span>
	    <form action="../cadastro/send_email_senha.php" method="post">
			<div class="row">
				<div class="input-field col m10 offset-m1 s10 offset-s1">
					<i class="material-icons prefix">assignment_ind</i>
					<input name="ra" id="ra" type="text" required>
					<label for="ra" class="active">RA</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col m10 offset-m1 s10 offset-s1">
					<i class="material-icons prefix">account_circle</i>
					<input placeholder="nome.exemplo" name="user" id="user" type="text" required>
					<label for="user" class="active">UsuÃ¡rio do tidia</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col m6 offset-m7">
					<input type="submit" value="Redefinir" class="waves-effect waves-light btn">
				</div>
			</div>
		</form>
    </div>
</div>
</body>

<script>
	function validarRA(form){
		ra = document.registrar.ra.value;
		raReTyped = document.registrar.raReTyped.value;

		if(ra != raReTyped){
			alert("RA's não coincidem.");
			document.registrar.raReTyped.focus();
			return false;
		}
	}
</script>