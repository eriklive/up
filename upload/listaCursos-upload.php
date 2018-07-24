<?php 
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";

$table = $_GET['bi'];
$sql = mysqli_query($link, "SELECT * FROM $table"); ?> 
		
		<select name="cursos" id="cursosSelect"> 
			<option value="null" disabled selected>Curso</option>
			<?while($exibe = mysqli_fetch_assoc($sql)){
				echo'<option value="'.$exibe["valor"].'">'.$exibe["nome_curso"].'</option>';
			}?> 
		</select>
		<label>Qual o curso? </label>
	
	<script>
		$(document).ready(function() {
			$('select').material_select();
			$('#cursosSelect').change(function(){
		        $('#materias').load('listaMaterias-upload.php?cursos='+$('#cursosSelect').val());
		        $('#profs').load('listaProfs-upload.php?cursos='+$('#cursosSelect').val());
		    });
		});
	</script>