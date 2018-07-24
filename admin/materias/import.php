<?php 
$quad = $_POST['quad'];
$quad = str_replace('.', '_', $quad);

include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";

function utf8_fopen_read($fileName) {
    $fc = iconv('windows-1250', 'utf-8', file_get_contents($fileName));
    $handle=fopen("php://memory", "rw");
    fwrite($handle, $fc);
    fseek($handle, 0);
    return $handle;
}

//Upando  arquivo e salvando ele no server
	if (isset($_FILES['fileUpload'])) {
   		$ext = ".".substr(strrchr($_FILES['fileUpload']['name'],'.'), 1);//Pegando extensão do arquivo
   		$dir = '../materias/'; //Diretório para uploads
   		$nome_arquivo = 'matriculas_'.$quad.$ext; 
   		date_default_timezone_set("Brazil/East");

      	if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$nome_arquivo)){
      		$file = utf8_fopen_read($nome_arquivo, 'r'); // Abrindo arquivo 
      		$nome_tabela = 'matriculas_'.$quad;

			$criar_tabela = "CREATE TABLE ".$nome_tabela." (
				id int auto_increment,
				curso VARCHAR (30),
				cod_turma VARCHAR (30),
				turma VARCHAR (600),
				tpi VARCHAR (10),
				teoria VARCHAR (600),
				pratica VARCHAR (600),
				docente_teoria VARCHAR (300),
				centro VARCHAR (10),
				docente_pratica VARCHAR (300),
				centro2 VARCHAR (10),
				requisicoes int (4),
				corte VARCHAR (5000),
				id_users VARCHAR (10000),
				PRIMARY KEY (id)
			)";
			
			if (mysqli_query($link, $criar_tabela)) {
      			while (!feof($file)) { // Alimentado o db com as info do arquivo

					$linha = fgets($file, 1024); // Pega os dados da linha

					$dados = explode(';', $linha); 	// Divide as Informações das celulas para poder salvar	

					$query = "INSERT INTO `".$nome_tabela."` (`curso`, `cod_turma`, `turma`, `tpi`, `teoria`, `pratica`, `docente_teoria`, `centro`, `docente_pratica`, `centro2`, `requisicoes`, `corte`, `id_users`) VALUES ('".$dados[0]."', '".$dados[1]."','".$dados[2]."','".$dados[3]."','".$dados[4]."','".$dados[5]."','".$dados[6]."','".$dados[7]."','".$dados[8]."','".$dados[9]."','0','','')"; 
					
					if(!empty($linha)) { 
						$inserir = mysqli_query($link, $query);
					}

				} 

				fclose($file);

				mysqli_close($link); 
	   			$text="DB atualizado com sucesso!";
	   			$linkRetorno="../upload/";
	   			include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
	   			} else {
      			echo "Erro ao criar db :".mysql_error();
      		}
		} else {
			$text="Ops, algo ocorreu de forma errada!";
			$linkRetorno="../admin/";
			include $_SERVER['DOCUMENT_ROOT']."/erro.php";
		}		
	}



//header("location:https://descomplica.dceufabc.com/");?>

</body>
</html>