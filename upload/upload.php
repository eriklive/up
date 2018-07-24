<?php
include $_SERVER['DOCUMENT_ROOT']."/header.php"; 
include $_SERVER['DOCUMENT_ROOT']."/php/sessao.php";

$prof = $_POST['profs'];
$materia = $_POST['materias'];
$quad = $_POST['quad'];
$tipo = $_POST['tipo'];
$table = 'arquivos';


if($tipo == 'Aula'){
   $aula = $_POST['Aula'];
   $tipo2 = $tipo."_".$aula;
   $tipo_link = str_replace(" ","",$tipo2);
} else {
   $aula = '';
   $tipo_link = str_replace(" ","",$tipo);
}

$prof_link = str_replace(" ","",$prof);
$quad_link = str_replace(" ","",$quad);
if($usuario=='ca'){
	$hab="s";
} else{
	$hab="";
}
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";

   	if(isset($_FILES['fileUpload'])){
   		$ext = ".".substr(strrchr($_FILES['fileUpload']['name'],'.'), 1);//Pegando extensão do arquivo
         if (($ext!='.exe') OR ($ext!='.bat') OR ($ext!='.js')){
      		$dir = '../arquivos/'; //Diretório para uploads
      		date_default_timezone_set("Brazil/East");

      		if(($prof=='Não Informado') AND ($quad=='Não Informado')){
      			$new_name = $materia."_".$tipo_link."_".date("H:i:s_d-m-Y").$ext; //Definindo um novo nome para o arquivo
      		} else if (($prof=='Não Informado') AND ($quad!='Não Informado')){
      			$new_name = $materia."_".$tipo_link."_".$quad_link."_".date("H:i:s_d-m-Y").$ext;
      		} else if (($prof!='Não Informado') AND ($quad=='Não Informado')){
      			$new_name = $materia."_".$tipo_link."_".$prof_link."_".date("H:i:s_d-m-Y").$ext;
      		} else{
      			$new_name = $materia."_".$tipo_link."_".$prof_link."_".$quad_link."_".date("H:i:s_d-m-Y").$ext;
      		}

         	$link_arquivo = "https://descomplica.dceufabc.com/arquivos/".$new_name;

         	if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name)){
   			   $query= "INSERT INTO $table (materia, tipo, sub-tipo, quad, professor, link, hab, autor, ext) VALUES ('".$materia."', '".$tipo."', '".$aula."', '".$quad."','".$prof."','".$link_arquivo."', '".$hab."','".$autor."','".$ext."')";
   	   		$inserir = mysqli_query($link, $query);
      			mysqli_close($link);
      			$text="Arquivo enviado com sucesso! Aguarde aprovação do DCE.";
      			$linkRetorno="../upload/";
      			include $_SERVER['DOCUMENT_ROOT']."/sucesso.php";
   		} else {
   			$text="Ops, algo está errado!";
   			$linkRetorno="../upload/";
   			include $_SERVER['DOCUMENT_ROOT']."/erro.php";
   		}
      }
   } else {
      $text="Esse tipo de arquivo não é permitido.";
      $linkRetorno="../upload/";
      include $_SERVER['DOCUMENT_ROOT']."/erro.php";
   }
?>