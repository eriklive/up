<?php 
function card_sessao ($tipo, $cont) {
	include "../connections/database-pdo.php";	
	
	echo "
		<div class='card card-movement'>
			<h3 style='padding-left:20px; padding-top:20px;'>".$tipo."</h3> 
			<div class='divider'></div>";

		if($tipo == 'Prova'){
			$query = "SELECT * FROM arquivos WHERE hab = '' AND (`tipo`='Prova 1'  OR `tipo`='Prova 2' OR `tipo`='Prova Única' OR `tipo`='Recuperação' OR `tipo`='Substutiva')";
			} else {
				$query = "SELECT * FROM arquivos WHERE hab = '' AND tipo = :tipo";
			}
			
			$server_data = $connection->prepare($query);
			$server_data->bindValue(':tipo', $tipo);
			$server_data->execute();
			$response = $server_data->rowCount();

		if($response!==0){ 
			include "./home/cards.php";
		} else { 
			echo '
			<div class="center card-content">
				<div class="card teal" style="height: 200px;">
					<span class="flow-text">Não há novos uploads a serem avaliados!</span>
				</div>
			</div>';
		} 

		echo 
			"</div>";
}
?>