<?php 
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

header("Content-type: text/html; charset=utf-8");
$titulo = $_POST["titulo"];
$aviso = $_POST["aviso"];
//$imagem=$_POST["imagem"];

include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
$table="avisos";

/*  Verificar no DB se  usuário existe*/
$query="SELECT * FROM $table WHERE disp='s'";
$consulta = mysqli_query($link, $query);
$numLinhas = mysqli_num_rows($consulta);

if($numLinhas!=0){
	mysqli_close($link); 
	$text="Já exite um aviso ativo no momento. Por favor, desative ele e tente novamente.";
   	$linkRetorno="../admin/avisos.php";
   	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
} else {
	//if(isset($_FILES['imagem'])){
      		$dir = '../avisos-img/'; //Diretório para uploads
      		$new_name = $_FILES['imagem']['name']; //Definindo um novo nome para o arquivo
      		
         	$link_arquivo = "https://descomplica.dceufabc.com/admin/avisos-img/".$new_name;

         	//if (move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name)){
				$query="INSERT INTO $table (`titulo`,`aviso`,`disp`) VALUES ('".$titulo."', '".$aviso."', 's')";
				$inserir = mysqli_query($link, $query);
				if($inserir){
					mysqli_close($link);
					$text="Aviso adicionado com sucesso!";
				   	$linkRetorno="../admin/avisos.php";
				   	include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
				} else {
					mysqli_close($link);
					$nomeDaPágina = 'Oh, não!! Erro!!';
					$text="Algo deu errado no db! Certeza que tudo está correto?";
			   		$linkRetorno="../admin/avisos.php";
			   		include $_SERVER['DOCUMENT_ROOT']."/erro.php";
				}
		/**} else{ 
				mysqli_close($link);
				$nomeDaPágina = 'Oh, não!! Erro!!';
				$text="Algo deu errado ao mover a imagem!";
			   	$linkRetorno="../admin/avisos.php";
			   	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
			}
	} else { 
				mysqli_close($link);
				$nomeDaPágina = 'Oh, não!! Erro!!';
				$text="Algo deu errado no upload da imagem!";
			   	$linkRetorno="../admin/avisos.php";
			   	include $_SERVER['DOCUMENT_ROOT']."/erro.php";
			}*/
}
?>