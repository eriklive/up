<div class="row center">
	<div class="col m12">
		<h2 class="header left">Usuários</h2>
		<div class="row">
			<table class="highlight col m12">
				<thead>
					<tr class="green-text">
						<th class="flow-text">Usuário</th>
						<th class="flow-text">email</th>
						<th class="flow-text">RA</th>
						<th class="flow-text">Status</th>
						<!-- <th class="flow-text"></th> -->
					</tr>
				</thead>
				<tbody>
					<?php 
					$server_data = $connection->prepare("SELECT * FROM dados");
					$server_data->execute();

					while($user_data = $server_data->fetch()){

						($user_data['email']=='') ? ($user_data['email'] = ' - ') : ($user_data['email'] = $user_data['email']);
						($user_data['ra']=='0') ? ($user_data['ra'] = 'Não se aplica') : ($user_data['ra'] = $user_data['ra']);

						if (
							($user_data['habilitado']=='sim') || 
							($user_data['habilitado']=='ca') ||
							($user_data['habilitado']=='adm')
						){
							$user_data['habilitado'] = 'Ativo';
							$corInativo = '';
						} else if ($user_data['habilitado']=='') {
							$user_data['habilitado'] = 'Inativo';
							$corInativo = 'red-text';
						} else {
							$user_data['habilitado'] = 'Erro';
						}

						echo 
						"<tr class='".$corInativo."'>
							<th>
								".$user_data['user']."
							</th>".
							"<th>
								".$user_data['email']."
							</th>".
							"<th>
								".$user_data['ra']."
							</th>".
							"<th>
								".$user_data['habilitado']."
							</th>".
							"<th class=''>
								<form method='post' action='update_user_form.php'>
									<input class='hide' name='id' value=".$user_data['id']."/>
									<button type='submit' class='waves-effect waves-teal btn-flat'>
										Editar
									</button>
								</form>
							</th>".
						"</tr>"; 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>