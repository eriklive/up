<div class="hide-on-large-only white navMobile">
	<div class="row center">
		<a href="https://descomplica.dceufabc.com/" class="grey-text text-darken-3">
		    <div class="col s4 waves-effect waves-dark menufooter">
		        <span> 
					<i class="icon-inicio" aria-hidden="true"></i>
    			</span>
    		</div>
		</a>
		<a href="https://descomplica.dceufabc.com/upload/" class="grey-text text-darken-3">
    		<div class="col s4 waves-effect waves-dark menufooter">
    			<span>
    				<i class="icon-upload" aria-hidden="true"></i>
    			</span>
    		</div>
		</a>
		<div class="col s4 waves-effect waves-dark menufooter grey-text text-darken-3 triggerMenu">
			<span style="cursor: pointer;">
				<i class="icon-menu" aria-hidden="true"></i>
			</span>
		</div>
	</div>
</div>

<div class="pageMenu">
	<ul class="white">
		<li class="menu-2"><a href="https://descomplica.dceufabc.com/matriculas/" >Matriculas</a></li>          
		<li class="menu-4"><a href="https://docs.google.com/forms/d/e/1FAIpQLSe3Td7dti-mlsmwmTAYD-gNPpsmDiEJC3l9RDwpnFbGpAyLnA/viewform"target="_blank">Informar Erro</a></li>
		<?php if ($_SESSION["user"]=="dce.ufabc") { 
			echo '<li class="menu-5"><a href="https://descomplica.dceufabc.com/admin/" >Dashboard</a></li>';
		} else { 
			echo '<li class="menu-5"><a href="https://descomplica.dceufabc.com/cadastro/alterarSenha.php">Conta</a></li>';
		} ?>
		<br>         
		<li><div class="divider" style="margin-left:-15%;"></div></li>
		<li class="menu-5"><a href="https://descomplica.dceufabc.com/php/logout.php" class="red-text">Sair</a></li>
		<li class="menu-1 center white" style="height:200px">
			<img class="responsive-img hide" style="width:50%;" src="https://descomplica.dceufabc.com/img/logo.png">
		</li>
	</ul>
</div>