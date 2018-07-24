						<div class="input-field col m2 offset-m1 s10 offset-s1">
							<select name="bi" id="bi2" onChange="getStates(this);">
								<option value="0" disabled selected id="">BI</option>
								<option value="cursos_bct" id="">BC&T</option>
								<option value="cursos_bch" id="">BCH</option>
							</select>
							<label>Qual seu BI principal?</label>
						</div>
						<div id="cursos" class="input-field col m3 s10 offset-s1">
							<select name="cursos2" disabled> 
								<option value="" disabled selected>Curso</option>
							</select>
							<label>Qual o llll curso? </label>
						</div>
						<div id="materias" class="input-field col m4 s10 offset-s1">
							<select name="materias" disabled> 
								<option value="" disabled selected>Materias</option>
							</select>
							<label>Qual matéria que você está buscando? </label>
						</div>
						<div class="col m2 s2 offset-s9" >
							<button class="btn-floating btn-large waves-effect waves-light" type="submit" name="action" onclick="resultados()">
						    	<i class="material-icons right">search</i>
						  	</button>
						</div>

						<script>
							$(document).ready(function() {
							    $('select').material_select();
							
						        $('#bi2').change(function(){
						            $('#cursos2').load('listaCursos.php?bi='+$('#bi').val());
						        });
							});
						</script>