<?php 
include "../connect_db.php";

$table = $_GET['bi'];
$sql = mysqli_query($link, "SELECT * FROM $table ORDER BY 'nome_curso' ASC"); ?> 
		
	<select name="cursos" id="cursosSelect"> 
		<option value="0">Curso</option>
		<?while($exibe = mysqli_fetch_assoc($sql)){
			echo'<option value="'.$exibe["valor"].'">'.$exibe["nome_curso"].'</option>';
		}?> 
	</select>
	<label>Qual o seu curso? </label>

<script>
	$(document).ready(function() {
		$('select').material_select();
		$('#cursosSelect').change(function(){
	        $('#materias').load('./home/listaMaterias.php?cursos='+$('#cursosSelect').val());
	    });
	});
</script>