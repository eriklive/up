<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Loading...</title>
	<link rel="stylesheet" href="">
</head>
<body>
<span> Olá Mundo <br> </span>
<?php 
/**
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";

function utf8_fopen_read($fileName) {
    $fc = iconv('windows-1250', 'utf-8', file_get_contents($fileName));
    $handle=fopen("php://memory", "rw");
    fwrite($handle, $fc);
    fseek($handle, 0);
    return $handle;
}

$table = "professores";
$file = utf8_fopen_read('profs.CSV', 'r'); // Abrindo arquivo 
if($file){
	echo 'Arquivo aberto com sucesso! <br>';
}

while (!feof($file)) {  			// Enquanto o arquivo não acaba 
	
	echo "1 <br>";

	$linha = fgets($file, 1024); 	// Pega os dados da linha
	if($linha){
		echo 'Linha pega com sucesso! <br>';
	}

	$dados = explode(';', $linha); 	// Divide as Informações das celulas para poder salvar
	if($dados){
		echo 'Dados explodidos com sucesso! <br>';
	}
	if($dados[0] != 'professor' && !empty($linha)) // Verifica se o Dados Não é o cabeçalho ou não esta em branco
	{
		$query="INSERT INTO $table VALUES ('".$dados[0]."', '".$dados[1]."', '".$dados[2]."')"; 
											// Query para inserir dados no DB
		$inserir = mysqli_query($link, $query);
		echo "2";
	}
}

fclose($file); // Fechando o arquivo

mysqli_close($link); // Fechando a conexão com o db

//header("location:https://descomplica.dceufabc.com/");
*/
?>
</body>
</html>


