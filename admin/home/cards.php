<div class="card-content">
	<div>
		<form method="post" name="aprovar_ou_excluir_<?php echo $cont; ?>">
			<div class="row"><?
				while($exibir = $server_data->fetch()){
					if (($exibir["tipo"]=="Prova 1")  or ($exibir["tipo"]=="Prova 2") or ($exibir["tipo"]=="Prova Única") or ($exibir["tipo"]=="Recuperação") or ($exibir["tipo"]=="Substutiva") ){
						$descricao = $exibir["tipo"].' - '.$exibir['subtipo'];
					} else {
						$descricao = $exibir["subtipo"];
					}
					include "../php/corCards.php";

                    card_individual (
                		$cor, 
                		$textoCor, 
                		$exibir["link"], 
                		$exibir["id"], 
                		$exibir["professor"], 
                		$descricao, 
                		$exibir["materia"], 
                		$exibir["autor"],
                		$exibir["quad"],
                		$texto
                	);
			    }?>

			</div>
			<div class="row center">
				<br>
				<button 
					class="btn-flat waves-effect waves-red red-text" 
					value="Excluir" 
					onclick="selecionarForm('excluir', <?php echo $cont; ?>);"
				>
					Excluir
				</button>
				
				<button 
					class="btn waves-effect waves-light" 
					value="Aprovar" 
					onclick="selecionarForm('updateEstado', <?php echo $cont; ?>);"
				>
					Aprovar
				</button>
			</div>
		</form>
	</div>
</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		$('.modal').modal();

		function selecionarForm(tipo, cont){
			if (cont == 1) {
				document.aprovar_ou_excluir_1.action = './home/' + tipo + '.php';
				document.aprovar_ou_excluir_1.submit();
			} else if( cont == 2 ){
				document.aprovar_ou_excluir_2.action = './home/' + tipo + '.php';
				document.aprovar_ou_excluir_2.submit();
			} else if( cont == 3 ){
				document.aprovar_ou_excluir_3.action = './home/' + tipo + '.php';
				document.aprovar_ou_excluir_3.submit();
			} else if( cont == 4 ){
				document.aprovar_ou_excluir_4.action = './home/' + tipo + '.php';
				document.aprovar_ou_excluir_4.submit();
			} else if( cont == 5 ){
				document.aprovar_ou_excluir_5.action = './home/' + tipo + '.php';
				document.aprovar_ou_excluir_5.submit();
			}  else if( cont == 6 ){
				document.aprovar_ou_excluir_6.action = './home/' + tipo + '.php';
				document.aprovar_ou_excluir_6.submit();
			} else if( cont == 7 ){
				document.aprovar_ou_excluir_7.action = './home/' + tipo + '.php';
				document.aprovar_ou_excluir_7.submit();
			} 			
		}
	</script>