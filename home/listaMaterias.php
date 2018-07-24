<?php
/**
Código funciona, o problema está sendo passar o 
nome do curso do arquivo 'listaCursos.php' para o atual,
para assim abrir o banco.
*/
include "../connect_db.php";

$curso = $_GET['cursos'];

$sql = mysqli_query($link, "SELECT * FROM `disciplinas` WHERE `curso`='".$curso."' ORDER BY `nome` ASC"); 
?> 	
	<select name="materias" id="materiasSelect" onchange="retorno"> 
		<option value="">Materias</option>
		<?while($exiber = mysqli_fetch_assoc($sql)){
			echo'<option value="'.$exiber["cod"].'">'.$exiber["nome"].'</option>';
		}?> 
	</select>
	<label>Matérias</label>

<script>
	$(document).ready(function() {
		$('select').material_select();
	});
	function retorno( ) {
        response($('#materiasSelect').val());   
    }
</script>