<?php 
$ext = $exibir["ext"];

if ($ext == ".pdf"){
	$cor="red";
	$texto="PDF";
	$textoCor="red-text";
} else if (($ext == ".odt") OR ($ext == ".txt") OR ($ext == ".docx")) {
	$cor="blue";
	$texto="Texto";
	$textoCor="blue-text";
} else if (($ext == ".jpg") OR ($ext == ".png") OR ($ext == ".jpeg")) {
	$cor="teal";
	$texto="Imagem";
	$textoCor="teal-text";
} else if (($ext == ".ppt") OR ($ext == ".pptx") OR ($ext == ".odp")) {
	$cor="orange";
	$texto="Slide";
	$textoCor="orange-text";
} else {
	$cor="grey";
	$texto="Outro";
	$textoCor="grey-text";
}
?>
