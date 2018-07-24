<?php 
	$conection = mysqli_query($link, "SELECT * FROM matriculas WHERE id = '1'");
	$data = mysqli_fetch_assoc($conection);
?>

<ul id="slide-out" class="side-nav fixed" style="transform: translateX(0%);">
	<li>
	  	<div class="user-view">
		    <div class="background">
		    	<img class="responsive-img" src="http://cdn.agensite.com/arquivos/83/conteudo/posts/387167.jpg" alt="">
		    </div>
	    	<a href="#!user"><img class="circle" src="http://1.bp.blogspot.com/-YTM37ESZ8Q8/VuS53c8xrlI/AAAAAAAAJ_w/YiPHNiLe7E8Vp1DSGqklGA2idqe6P-_OA/s656/logo2.jpg"></a>
	    	<a href="#!name"><span class="white-text name">DCE - Gestão Todas as vozes</span></a>
   			<a href="#!email"><span class="white-text email">contato@dceufabc.com</span></a>
		</div>
	</li>
    <li>
    	<a href="https://descomplica.dceufabc.com/admin/" class="waves-effect"><i class="material-icons">dashboard</i> Dashboard</a>
    </li>
	<li>
		<a href="https://descomplica.dceufabc.com/admin/atualizarProfessores.php" class="waves-effect">
			<i class="material-icons">person</i>Gerenciar Professores
		</a>
	</li>
	<li>
		<a href="https://descomplica.dceufabc.com/admin/atualizar_materias.php" class="waves-effect">
			<i class="material-icons">book</i>Gerenciar Matérias
		</a>
	</li>
	<li>
		<a href="https://descomplica.dceufabc.com/admin/atualizar_cursos.php" class="waves-effect"><i class="material-icons">school</i>Gerenciar Cursos</a>
	</li>
	<li>
		<a href="https://descomplica.dceufabc.com/admin/gerenciar_quads.php" class="waves-effect">
			<i class="material-icons">date_range</i>Gerenciar Quads
		</a>
	</li>
	<li>
		<a href="https://descomplica.dceufabc.com/admin/usuarios/" class="waves-effect">
			<i class="material-icons">assignment_ind</i>Usuários
		</a>
	</li>
	<li>
		<a href="https://descomplica.dceufabc.com/admin/avisos.php" class="waves-effect"><i class="material-icons">warning</i>Avisos</a>
	</li>

    <li><div class="divider"></div></li>

    <li>
    	<a class="subheader">Matrículas</a>
    </li>
    <?php  if ($data["aberto"] == 'n'){ 
    	echo '<li><a href="https://descomplica.dceufabc.com/admin/gerenciar_matriculas.php"><i class="material-icons">visibility</i>Abrir sistema</a></a></li>';
    } else {
    	echo '
    		<li><a href="https://descomplica.dceufabc.com/admin/gerenciar_matriculas.php"><i class="material-icons">visibility_off</i>Fechar sistema</a></a></li>
    		';
    }?>
	<li>
		<a href="https://descomplica.dceufabc.com/admin/alterar_quad_atual.php"><i class="material-icons">settings</i>Alterar Quad atual</a></a>
	</li>
    <li>
    	<a href="https://descomplica.dceufabc.com/admin/estatisticas.php"><i class="material-icons">trending_up</i>Estatísticas</a>
    </li>
    <li>
    	<a href="https://descomplica.dceufabc.com/admin/adicionar_planilha.php"><i class="material-icons">playlist_add</i>Adicionar novas materias</a>
    </li>

	<li><div class="divider"></div></li>

    <li>
    	<a class="subheader">Configurações de perfis</a>
    </li>
    <li>
    	<a href="https://descomplica.dceufabc.com/admin/atualizar_dce.php" class="waves-effect">DCE</a>
    </li>
   	<li>
   		<a href="https://descomplica.dceufabc.com/admin/criar_ca.php" class="waves-effect">CA's</a>
   	</li>
   	<li>
   		<div class="divider"></div>
   	</li>
	<li>
		<a href="https://descomplica.dceufabc.com/php/logout.php" class="waves-effect red-text">Sair</a>
	</li>
	<li><a href="" class=""></a></li>
	<li><a href="" class=""></a></li>
</ul>
<nav class="hide-on-large-only white">
	<div class="nav-wrapper">	
		<a style="color: #03442b;" href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
	</div>	
</nav>
<script>
	$(".button-collapse").sideNav();
</script>