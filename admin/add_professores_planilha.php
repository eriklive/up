						<!-- <div class="row"><br><br></div>

								<h3>Adicionar por planilha</h3>
								<br>
						    	<div class="divider"></div>
						    	<br>
						    	<p class="flow-text">Monte uma planilha com mais de um professor e submeta ela aqui. Ela tem que ser salva no formato ".CSV", além de ser formatada na seguinte ordem: primeira coluna com os nomes dos professores e a segunda com os centros (CCNH, CECS ou CMCC, em maiúsculo).</p>
						    	<br>
								<form action="add_professores_planilha.php" method="post">
									<div class="row">
										<div class="file-field input-field col m11 s10">
											<div class="btn">
												<span>
													<i class="material-icons">attach_file</i>
												</span>
												<input type="file" name="fileUpload">
											</div>
											<div class="file-path-wrapper">
												<input type="text" class="file-path validade">
											</div>
										</div>
							      		<button type="submit" class="btn-floating btn-large waves-effect waves-light" value="Enviar">
							      			<i class="material-icons">file_upload</i>
							      		</button>
							      	</div>
								</form>
							</div> --><?php 

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

?>
</body>
</html>


