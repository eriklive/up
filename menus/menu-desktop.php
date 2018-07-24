<div class="container">
	<nav class="hide-on-med-and-down">
		<div class="nav-wrapper white">
			<a href="https://descomplica.dceufabc.com/index.php" class="brand-logo"><img src="https://descomplica.dceufabc.com/img/dce_logo_60px.png" alt="" class="responsive-img hide-on-med-and-down" style="width:62%; margin-top: 12.125px; margin-left:7.53px;"></a>
			<ul class="nav-mobile right">
				<li><a href="https://descomplica.dceufabc.com/" class="green-text text-darken-4">Inicio</a></li>
				<li><a href="https://descomplica.dceufabc.com/matriculas/" class="green-text text-darken-4">Matriculas</a></li>
				<li><a href="https://descomplica.dceufabc.com/upload/" class="green-text text-darken-4">Enviar Arquivos</a></li>
				<li><a href="https://docs.google.com/forms/d/e/1FAIpQLSe3Td7dti-mlsmwmTAYD-gNPpsmDiEJC3l9RDwpnFbGpAyLnA/viewform" class="green-text text-darken-4" >Informar Erro</a></li>
				<?php if($_SESSION["user"]=="dce.ufabc") { 
					echo '<li><a  href="https://descomplica.dceufabc.com/admin/" class="green-text text-darken-4">Dashboard</a></li>';
				} else { 
					echo '<li><a class="green-text text-darken-4" href="https://descomplica.dceufabc.com/cadastro/alterarSenha.php">Conta</a></li>';
				} ?>
				<li><a href="https://descomplica.dceufabc.com/php/logout.php" class="red-text" >Sair</a></li>
			</ul>
			
		</div>
	</nav>
</div>