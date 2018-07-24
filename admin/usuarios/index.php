<?php 
$nomeDaPágina = 'Usuários';
include $_SERVER['DOCUMENT_ROOT']."/connections/database-pdo.php";
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

    .header {
	    color: #03442b;
	    font-weight: 300;
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
		  			<div class="card card-movement">
				    	<div class="card-content">
				    		<div class="row">	
					      		<ul class="tabs">
					        		<li class="tab col s4"><a href="#allUsers">Todos os usuários</a></li>
					      		</ul>
				    		</div>
					   		<div id="allUsers">
								<?php include $_SERVER['DOCUMENT_ROOT']."/admin/usuarios/allUsers.php"; ?>
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
	$(document).ready(function(){
	    $('ul.tabs').tabs();
    	$('select').material_select();
	});

</script>

<?php $server_data->close(); ?>