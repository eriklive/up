<?php 
function card_individual ($cor, $textoCor, $link, $id, $professor, $descricao, $materia, $autor, $quad, $texto) {
	echo '<div class="col s12 m4">
			<div class="card hoverable">
			 	<div class="card-image">
			 		<div class="'.$cor.'" style="height:150px; width:100%;"></div>
			 		<div class="fixed-action-btn horizontal">
				 		<a class="btn-floating btn-large waves-effect waves-light white" >
				 			<i class="material-icons '.$textoCor.'">add</i>
				 		</a>
				 		<ul>
				 			<li>
						      	<a 
						      		class="btn-floating white modal-trigger tooltipped" 
						      		data-position="top" 
						      		data-delay="50" 
						      		data-tooltip="Editar Arquivo"
						      		href="./home/editar_form.php?id='.$id.'"
						      	>
						      		<i class="material-icons '.$textoCor.'">edit</i>
						      	</a>
						    </li>
				 			<li>
						    	<a 
						    		class="btn-floating white modal-trigger tooltipped" 
						      		data-position="top" 
						      		data-delay="50" 
						      		data-tooltip="Abrir" 
						    		target="_blank" 
						    		href="'.$link.'"
						    	>
						 			<i class="material-icons '.$textoCor.'">open_in_new</i>
						 		</a>
						    </li>
						    
					    </ul>
			 		</div>
			 	</div>

			 	<div class="card-content" style="padding: 5px 15px 5px;">
			 		<p class="'.$cor.'-text" style="font-size:10px;">Professor</p>
			 		<span class="card-title">
			 			'.$professor.'
			 		</span>
			 		<p class="grey-text text-darken-2">'.$descricao.'</p>
			 		<p class="grey-text text-darken-2"> Matéria: '.$materia.'</p>
			 		<p class="grey-text text-darken-2"> Autor: '.$autor.'</p>
			 	</div>

				<div class="card-action">
				 	<p class="">'.$quad.' <span class="'.$textoCor.' right">'.$texto.'</span></p>
				 	<p class="center">
				 	<br>
				    	<input type="checkbox" name="checkbox[]" value="'.$id.'" id="checkbox_'.$id.'" />
				    	<label for="checkbox_'.$id.'">Selecionar</label>
					</p>
				</div>
			</div>
		</div>';
}
?>