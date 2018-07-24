<link rel="stylesheet" href="https://descomplica.dceufabc.com/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="https://descomplica.dceufabc.com/owlcarousel/owl.theme.default.min.css">

<?php 
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
//------------------------ Cards

$tipo = 'Provas';
$sql = mysqli_query($link, "SELECT * FROM `arquivos` WHERE `materia`='".$materia."' AND `hab`='s' AND (`tipo`='Prova 1'  OR `tipo`='Prova 2' OR `tipo`='Prova Única')");
?>
<div class="row">
	<div class='card'>
		<h3 style='padding-left:20px; padding-top:20px;'><?php echo $tipo; ?></h3> 
		<div class='divider'></div>
			<div class="card-content">
				<?php include $_SERVER['DOCUMENT_ROOT']."/cardsMaterias.php"; ?>
			</div>
	</div>
</div><?


$tipo = 'Resumos';
$sql = mysqli_query($link, "SELECT * FROM `arquivos` WHERE `materia`='".$materia."' AND `hab`='s' AND `tipo`='Resumo'");
?>
<div class="row">
	<div class='card'>
		<h3 style='padding-left:20px; padding-top:20px;'><?php echo $tipo; ?></h3> 
		<div class='divider'></div>
			<div class="card-content">
				<?php include $_SERVER['DOCUMENT_ROOT']."/cardsMaterias.php"; ?>
			</div>
	</div>
</div><?


$tipo = 'Lista';
$sql = mysqli_query($link, "SELECT * FROM `arquivos` WHERE `materia`='".$materia."' AND `hab`='s' AND `tipo`='Lista'"); ?>
<div class="row">
	<div class='card'>
		<h3 style='padding-left:20px; padding-top:20px;'><?php echo $tipo; ?></h3> 
		<div class='divider'></div>
			<div class="card-content">
				<?php include $_SERVER['DOCUMENT_ROOT']."/cardsMaterias.php"; ?>
			</div>
	</div>
</div><?

$tipo = 'Slides';
$sql = mysqli_query($link, "SELECT * FROM `arquivos` WHERE `materia`='".$materia."' AND `hab`='s' AND `tipo`='Slide'");
?>
<div class="row">
	<div class='card'>
		<h3 style='padding-left:20px; padding-top:20px;'><?php echo $tipo; ?></h3> 
		<div class='divider'></div>
			<div class="card-content">
				<?php include $_SERVER['DOCUMENT_ROOT']."/cardsMaterias.php"; ?>
			</div>
	</div>
</div><?

$tipo = 'Aulas';
$sql = mysqli_query($link, "SELECT * FROM `arquivos` WHERE `materia`='".$materia."' AND `hab`='s'AND `tipo`='Aula'");
?>
<div class="row">
	<div class='card'>
		<h3 style='padding-left:20px; padding-top:20px;'><?php echo $tipo; ?></h3> 
		<div class='divider'></div>
			<div class="card-content">
				<?php include $_SERVER['DOCUMENT_ROOT']."/cardsMaterias.php"; ?>
			</div>
	</div>
</div><?

$tipo = 'Lab';
$sql = mysqli_query($link, "SELECT * FROM `arquivos` WHERE `materia`='".$materia."' AND `hab`='s'AND `tipo`='Lab'");
?>
<div class="row">
	<div class='card'>
		<h3 style='padding-left:20px; padding-top:20px;'><?php echo $tipo; ?></h3> 
		<div class='divider'></div>
			<div class="card-content">
				<?php include $_SERVER['DOCUMENT_ROOT']."/cardsMaterias.php"; ?>
			</div>
	</div>
</div><?

$tipo = 'Outros';
$sql = mysqli_query($link, "SELECT * FROM `arquivos` WHERE `materia`='".$materia."' AND `hab`='s'AND `tipo`='Outros' AND `hab`='s'");
?>
<div class="row">
	<div class='card'>
		<h3 style='padding-left:20px; padding-top:20px;'><?php echo $tipo; ?></h3> 
		<div class='divider'></div>
			<div class="card-content">
				<?php include $_SERVER['DOCUMENT_ROOT']."/cardsMaterias.php"; ?>
			</div>
	</div>
</div><?


?>
<script src="https://descomplica.dceufabc.com/js/jquery.min.js"></script>
<script src="https://descomplica.dceufabc.com/owlcarousel/owl.carousel.js"></script>

<script>
	$(document).ready(function() {
		$('select').material_select();
		$(".owl-carousel").owlCarousel();
	});

	function retorno( ) {
        response($('#materiasSelect').val());   
    }

    $('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:3,
		            nav:false
		        },
		        1000:{
		            items:4,
		            nav:true,
		            loop:false
		        }
		    }
		});

</script>