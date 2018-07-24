<?php 

function utf8_fopen_read($fileName) {
    $fc = iconv('windows-1250', 'utf-8', file_get_contents($fileName));
    $handle=fopen("php://memory", "rw");
    fwrite($handle, $fc);
    fseek($handle, 0);
    return $handle;
}

$nomeDaPágina = 'Carregando...';

include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/secao_dce.php";

$quad = $_POST[quad];

if(isset($_FILES['fileUpload'])){
   	$ext = ".".substr(strrchr($_FILES['fileUpload']['name'],'.'), 1);//Pegando extensão do arquivo
   	$dir = '../matriculas/arquivos/'; //Diretório para uploads
   	date_default_timezone_set("Brazil/East");

   	$new_name = 'matricula_'.$quad.'.'.$ext;
}
if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name)){

	$table = "materias";
	$file_semutf = $_FILES['fileUpload'];
	$file = utf8_fopen_read('../matriculas/arquivos/'.$new_name, 'r'); // Abrindo arquivo 
	if($file){
		echo 'Arquivo aberto com sucesso <br>';
	} else {
		echo 'erro ao abrir o arquivo';
	}

	$quad = $_POST['quad'];

	while (!feof($file)) {  			// Enquanto o arquvio não acaba 
		$linha = fgets($file, 1024); 	// Pega os dados da linha

		$dados = explode(';', $linha); 	// Divide as Informações das celulas para poder salvar
			echo "verificação 1 feita com sucesso";
			$query="INSERT INTO $table (`curso`, `cod_turma`, `turma`, `tpi`, `teoria`, `pratica`, `docente_teoria`, `centro`, `docente_pratica`, `centro2`) VALUES ('".$dados[0]."', '".$dados[1]."', '".$dados[2]."', '".$dados[3]."', '".$dados[4]."', '".$dados[5]."'
												, '".$dados[6]."', '".$dados[7]."', '".$dados[8]."', '".$dados[9]."')"; 
												// Query para inserir dados no DB
			$inserir = mysqli_query($link, $query);
			echo $dados[0]."', '".$dados[1]."', '".$dados[2]."', '".$dados[3]."', '".$dados[4]."', '".$dados[5]."'
												, '".$dados[6]."', '".$dados[7]."', '".$dados[8]."', '".$dados[9];
			if($inserir){
				echo "verificação 2 feita com sucesso";
			}
	}

}
fclose($file); // Fechando o arquivo

mysqli_close($link); // Fechando a conexão com o db
?>
</body>
</html>


