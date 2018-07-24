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
				    	<div class="row">
				    		<div class="col s10 offset-s1">
				    			<p class="flow-text">
					    			Ao clicar em "resetar usuário", mesmo que não altere nenhum campo, os dados do usuário serão atualizados e um novo token de segurança será enviado à ele pel email. O usuário terá que escrever uma nova senha pra voltar a usar a plataforma.
					    		</p>
				    		</div>
				    		<div class="card-content">
					    		<?php 
					    			$server_data = $connection->prepare("SELECT * FROM dados WHERE id = :id");
					    			$server_data->bindValue(':id', $_POST['id']);
									$server_data->execute();

									$user_data = $server_data->fetch();
								?>
								<form action="update-user.php" method="post">
								    <input 
								        type="text" 
								        class="hide" 
								        name="id" 
								        value="<?php echo $_POST['id']; ?>"
								    />
									<div class="row">
										<div class="input-field col s12 m8 offset-m2">
								          	<input id="user" type="text" class="validate" name="user" value="<?php echo $user_data['user']; ?>">
								          	<label for="user" class="active">Usuário</label>
								        </div>
									</div>
									<div class="row">
										<div class="input-field col s12 m8 offset-m2">
								          	<input id="email" type="email" class="validate" name="email" value="<?php echo $user_data['email']; ?>">
								          	<label for="email" class="active">email</label>
								        </div>
									</div>
									<div class="row">
										<div class="input-field col s12 m8 offset-m2">
								          	<input id="ra" type="text" class="validate" name="ra" value="<?php echo $user_data['ra']; ?>">
								          	<label for="ra" class="active">RA</label>
								        </div>
									</div>
									<div class="row center">
										<button class="btn waves-effect waves-light" type="submit" name="action">Resetar Usuário
										    <i class="material-icons right">send</i>
										 </button>
									</div>
								</form>
					   		</div>
				    	</div>
				   	</div>
				</div>
			</div>
		</div>
	</main>
</body>

<footer class="hide"><?php include $_SERVER['DOCUMENT_ROOT']."/footer.php"; ?></footer>