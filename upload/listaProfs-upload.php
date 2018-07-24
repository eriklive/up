<meta charset="utf-8" />
<?php
/**
Código funciona, o problema está sendo passar o 
nome do curso do arquivo 'listaCursos.php' para o atual,
para assim abrir o banco.
*/

include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";

$curso = $_GET['cursos'];

if($curso=='bct' or $curso=='bch'){
	$busca = "SELECT * FROM `professores` ORDER BY nome ASC";
} else if( $curso=='bri' or $curso=="bpp" or $curso=="bce" or $curso=="bpt" or $curso=="gestao" or $curso=="eau" or $curso=="ene" or $curso=="inf" or $curso=="iar" or $curso=="mat" or $curso=="aero" or $curso=="biom"){
	$busca = "SELECT * FROM `professores` WHERE `centro`='CECS' ORDER BY nome ASC";
} else if($curso=='bcb' or $curso=="bfis"  or $curso=="lfis"  or $curso=="lcb" or $curso=="bfil"  or $curso=="lfil"  ){
	$busca = "SELECT * FROM `professores` WHERE `centro`='CCNH' ORDER BY nome ASC";
} else {
	$busca = "SELECT * FROM `professores` WHERE `centro`='CMCC' ORDER BY nome ASC ";
}

$sql = mysqli_query($link, $busca ); 
?> 
	<a class="black-text tooltipped" data-position="top" data-delay="50" data-tooltip="Você pode digitar o nome para agilizar!">
		<select name="profs" id="profsSelect"> 
			<option value="null" disabled selected>Professor</option>
			<option value="Unificada">Matéria Unificada</option>
			<option value="Não Informado">Não sei / Não tem</option>
			<?while($exiber = mysqli_fetch_assoc($sql)){
				echo'<option value="'.$exiber["nome"].'">'.$exiber["nome"].'</option>';
			}?> 
		</select>
	<label>De qual professor é esse arquivo?</label>
	</a>

<script>
	$(document).ready(function() {
		$('select').material_select();
		$('.tooltipped').tooltip({delay: 50});
	});
</script>