<?php
/**
Código funciona, o problema está sendo passar o 
nome do curso do arquivo 'listaCursos.php' para o atual,
para assim abrir o banco.
*/

include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";

$curso = $_GET['cursos'];

$sql = mysqli_query($link, "SELECT * FROM `disciplinas` WHERE `curso`='".$curso."' ORDER BY nome ASC"); 
?> 
	<select name="materias" id="materiasSelect"> 
		<option value="null" disabled selected>Materias</option>
		<?while($exiber = mysqli_fetch_assoc($sql)){
			echo'<option value="'.$exiber["cod"].'">'.$exiber["nome"].'</option>';
		}?> 
	</select>
	<label>Qual a matéria?</label>

<script>
	$(document).ready(function() {
		$('select').material_select();
	});
</script>