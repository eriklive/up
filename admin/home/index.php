<?php 
$nomeDaPágina = 'Dashboard';
include "../php/sessao_dce.php";
include "../connections/database-pdo.php";
include "../header.php";

//Funções
include "./home/card_sessao.php";
include "./home/card_individual.php";
include "./home/modal_edit.php";

?>

<style>
	header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }

    .container{
    	width: 80% !important;
    }
    
    .fixed-action-btn {
        position: absolute;
        right: 14px;
        bottom: -28px;
    }

</style>

<body class="grey lighten-4">

<header>
	<link rel="stylesheet" href="../owlcarousel/owl.carousel.min.css">
	<link rel="stylesheet" href="../owlcarousel/owl.theme.default.min.css">
	<?php include "menuAdmin.php"; ?>
</header>

<main>
	<div class="container full">
		<?php 
			card_sessao('Prova', 1);
			card_sessao('Resumo', 2);
			card_sessao('Lista', 3);
			card_sessao('Slide', 4);
			card_sessao('Aula', 5);
			card_sessao('lab', 6);
			card_sessao('Outros', 7);	
		?>
	</div>      
</main>  
</body>

<script src="https://descomplica.dceufabc.com/js/jquery.min.js"></script>
<script src="https://descomplica.dceufabc.com/owlcarousel/owl.carousel.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script>
	$(document).ready(function(){
		$(".owl-carousel").owlCarousel();
		$('.fixed-action-btn').openFAB();
		$('.fixed-action-btn').closeFAB();
		$('.fixed-action-btn.toolbar').openToolbar();
		$('.fixed-action-btn.toolbar').closeToolbar();
		$('.modal').modal();
	});

	$('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    responsiveClass:true,
	});
</script>
<footer class="hide">
	<?php include "../footer.php"; ?>
</footer>