<link rel="stylesheet" href="https://descomplica.dceufabc.com/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="https://descomplica.dceufabc.com/owlcarousel/owl.theme.default.min.css">

<?php 

function card_sessao ($tipo, $materia, $professor) {
	include "./connections/database-pdo.php";	
	
	if($professor != ''){
		if($tipo == 'Prova'){
			$query = "SELECT * FROM arquivos WHERE materia = :materia AND hab = 's' AND professor = :professor AND (`tipo`='Prova 1'  OR `tipo`='Prova 2' OR `tipo`='Prova Única' OR `tipo`='Recuperação' OR `tipo`='Substutiva')";
		} else {
			$query = "SELECT * FROM arquivos WHERE materia = :materia AND professor = :professor AND hab = 's' AND tipo = :tipo";
		}
	} else {
		if($tipo == 'Prova'){
			$query = "SELECT * FROM arquivos WHERE materia = :materia AND hab = 's' AND (`tipo`='Prova 1'  OR `tipo`='Prova 2' OR `tipo`='Prova Única' OR `tipo`='Recuperação' OR `tipo`='Substutiva')";
		} else {
			$query = "SELECT * FROM arquivos WHERE materia = :materia AND hab = 's' AND tipo = :tipo";
		}
	}

	$server_data = $connection->prepare($query);
	$server_data->bindValue(':materia', $materia);
	(($tipo!='Prova') && ($server_data->bindValue(':tipo', $tipo)));
	(($professor)&& ($server_data->bindValue(':professor', $professor)));
	$server_data->execute();
	$response = $server_data->rowCount();
	
	echo '
		<div class="row">
			<div class="card">
				<h3 style="padding-left:20px; padding-top:20px;">'.$tipo.'</h3> 
				<div class="divider"></div>
				<div class="card-content">';

	if($response != 0){
		include "./home/cardsMaterias.php";

		echo '
				</div>
			</div>
		</div>';

	} else{ 
		echo'
			<div class="teal center card-movement-3" style="height: 200px; padding-top: 30px">
			    <div class="row center">
			        <img class="" height="120px" src="https://descomplica.dceufabc.com/img/nenhum-arquivo-encontrado.svg" />
			    </div>
			</div>
			</div>
		</div>
	</div>';		
	}
}

card_sessao('Prova', $materia, $professor);
card_sessao('Resumo', $materia, $professor);
card_sessao('Lista', $materia, $professor);
card_sessao('Slide', $materia, $professor);
card_sessao('Aula', $materia, $professor);
card_sessao('lab', $materia, $professor);
card_sessao('Outros', $materia, $professor);

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