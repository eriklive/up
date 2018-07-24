<?php 
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao_dce.php";

?>
<div class="row center">
	<div class="col m12">
		<table class="striped col m12">
			<thead>
				<tr>
					<th>Nome da Matéra</th>
					<th>Cod da matéria</th>
					<th>Curso</th>
				</tr>
			</thead>

			<tbody>
				<?php 
					$table = "disciplinas";
					$sql = mysqli_query($link, "Select * FROM $table");

					while($exibe = mysqli_fetch_assoc($sql)){
					  	echo 
						  	"<tr>
						  		<th>".$exibe['nome'] ."</th>"."
						  		<th>".$exibe['cod'] ."</th>"."
						  		<th>".$exibe['curso'] ."</th>"."
					  		</tr>";
					}
					mysqli_close($link);
				?>
			</tbody>
		</table>
	</div>
</div>