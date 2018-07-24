<?php 
$nomeDaPágina = 'Estatisticas';
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

$html = '<table>
		<tr>
			<th>Curso</th>
			<th>Turma</th>
			<th>Teoria</th>
			<th>Pratica</th>
			<th>Docente (teoria)</th>
			<th>Docente (pratica)</th>
			<th>Requisições</th>
		</tr>';

$sql = mysqli_query($link, "SELECT * FROM `matriculas` WHERE `id` = '1'");

while($exibir = mysqli_fetch_assoc($sql)){
	$quad=$exibir["quad_atual"];
}

$table = "matriculas_".$quad;
$nome_arquivo = $table.".xls";

$sql = mysqli_query($link, "Select * FROM $table ORDER BY `requisicoes` DESC");
while($exibe = mysqli_fetch_assoc($sql)){										  
	$html=$html.'<tr>
		<th>'.$exibe["curso"].'</th>
		<th>'.$exibe["turma"].'</th>
		<th>'.$exibe["teoria"].'</th>
		<th>'.$exibe["pratica"].'</th>
		<th>'.$exibe["docente_teoria"].'</th>
		<th>'.$exibe["docente_pratica"] .'</th>
		<th><span class="right">'.$exibe["requisicoes"] .'</span></th>
		</tr>';										  		
}

$html = $html.'</table>';

// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"dados_matriculas.xls\"" );
header ("Content-Description: PHP Generated Data" );

echo $html;
?>


					   		