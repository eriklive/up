<?php 
	header('Content-Type: application/json');
	include "../connections/database-pdo.php";
	$server_data = $connection->prepare("SELECT * FROM professores");
	$server_data->execute();

	$professor = ['name'];
	$i = 0;

	while($professores = $server_data->fetch()){
		$professor[$i] = $professores['nome'];
		$i++;
	}

	$obj = json_encode($professor);
	echo $obj;

	$professores_obj = (object) $professor;

	foreach ($professor as $key => $value){
		$professores_obj->$key = $value;
	}

?>