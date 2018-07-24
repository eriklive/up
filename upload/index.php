<?php 
$nomeDaPágina = 'Enviar Arquivo';

include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao.php";
?>

<style>
	.testeView{
		display:none;
	}

	.testeView.active{
		display:block;
	}
</style>
<body class="grey lighten-3">
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT']."/menu.php"; ?>
	</header>
	<main class="container">
		<div class="card card-movement">
			<div class="card-content">
				<h3>Fazer upload de arquivo</h3>
				<div class="divider"></div>
				<br>
				<form action="#" method="POST" name="enviarArquivo" enctype="multipart/form-data" onsubmit="return validarForm(this);">
					<div class="row">
						<div class="input-field col m3 s12">
							<select name="bi" id="bi">
								<option value="null" disabled selected id="">BI</option>
								<option value="cursos_bct" id="">BC&T</option>
								<option value="cursos_bch" id="">BCH</option>
							</select>
							<label>Qual seu BI principal?</label>
						</div>
						<div id="cursos" class="input-field col m3 s12">
							<select name="cursos" disabled> 
								<option value="null" disabled selected>Curso</option>
							</select>
							<label>Qual o curso?*</label>
						</div>
						<div id="materias" class="input-field col m3 s12">
							<select name="materias" disabled> 
								<option value=null"" disabled selected>Materias</option>
							</select>
							<label>Qual a matéria?*</label>
						</div>
						<div class="input-field col m3 s12 tipoArquivo" >
							<select name="tipo"  id="tipoArquivo" class="validate">
								<option value="null" disabled selected id="">Tipo</option>
								<option value="Prova 1" id="">Prova 1</option>
								<option value="Prova 2" id="">Prova 2</option>
								<option value="Prova Única" id="">Prova Única</option>
								<option value="Recuperação" id="">Recuperação</option>
								<option value="Substutiva" id="">Substutiva</option>
								<option value="Resumo" id="">Resumo</option>
								<option value="Lista" id="">Lista</option>
								<option value="Slide" id="">Slide</option>
								<option value="Aula" id="">Aula</option>
								<option value="Lab" id="">Experimento (lab)</option>
								<option value="Outros" id="">Outros</option>
							</select>
							<label>Que tipo de arquivo é esse?*</label>
						</div>
					</div>
					<div class="row">
						<div id="profs" class="input-field col m3 s12">
							<select name="profs" disabled>
								<option value="null" disabled selected>Professor</option>
							</select>
							<label>De qual professor é esse arquivo?</label>
						</div>
						<div class="input-field col m3 s12" >
							<?php 
								include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
								$sql = mysqli_query($link, "SELECT * FROM quadrimestre ORDER BY quad DESC"); ?> 
							<select name="quad">
								<option value="null" disabled selected id="">Quad</option>
								<option value="Não Informado" id="">Não sei</option>
								<? while($exibe = mysqli_fetch_assoc($sql)){
										echo'<option value="'.$exibe["quad"].'">'.$exibe["quad"].'</option>';
									} 
								mysqli_close($link);?> 
							</select>
							<label>De qual quad é esse arquivo?*</label>
						</div>
						<div class="input-field col m3 s12">
					        <input name="descricao" id="descricao" type="text" class="validate">
							<label>Descrição</label>
						</div>
					</div>
					<div class="row">
						<div class="file-field input-field col m9 s12">
							<div class="btn">
								<span>
									<i class="material-icons left">attach_file</i> Selecionar Arquivo
								</span>
								<input type="file" name="fileUpload" id="fileUpload" placeholder="Selecionar Arquivo">
							</div>
							<div class="file-path-wrapper">
						        <input class="file-path validate" type="text">
						    </div>						
				            <br class="hide-on-med-and-up">
				            <br class="hide-on-med-and-up">
				            <br class="hide-on-med-and-up">
						</div>
  						<div>
  							<button value="Enviar" class="btn-large waves-effect waves-light botaoSubmeter col s12 m3" type="submit">
			      			<i class="material-icons right">file_upload</i>Enviar
			      			</button>
			      		</div>
			      	</div>
				</form>	
			</div>
		</div>
	</main>
    <?php include '../footer.php' ?>
</body>
<script>
  	$(document).ready(function() {
  		$('select').material_select();

	    $('#bi').change(function(){
		    $('#cursos').load('listaCursos-upload.php?bi='+$('#bi').val());
	    });
	});
	function validarForm(form){
		curso = document.enviarArquivo.cursos.value;
		materia = document.enviarArquivo.materias.value;
		tipo = document.enviarArquivo.tipo.value;
		professor = document.enviarArquivo.profs.value;
		quad = document.enviarArquivo.quad.value;
		descricao = document.enviarArquivo.descricao.value;

		if(curso == "null"){
			alert('É necessário selecionar uma opção de curso!!');
			document.enviarArquivo.cursos.focus();
			return false;
		} else if (materia == "null"){
			alert('É necessário selecionar uma opção de materia!!');
			document.enviarArquivo.materias.focus();
			return false;
		} else if (tipo == "null"){
			alert('É necessário selecionar uma opção de tipo de arquivo!!');
			document.enviarArquivo.tipo.focus();
			return false;
		} else if (professor == "null"){
			alert('É necessário selecionar uma opção de Professor!!');
			document.enviarArquivo.profs.focus();
			return false;
		} else if (quad == "null"){
			alert('É necessário selecionar uma opção de quadrimestre!!');
			document.enviarArquivo.quad.focus();
			return false;
		} else if (descricao == ""){
			alert('Por favor, adicione uma descrição.Esse campo é necessário para melhor apresentar os arquivos.');
			document.enviarArquivo.descricao.focus();
			return false;
		} else{
		  	var $toastContent = $('<span><span style="line-height:35px; padding-left: 10px;">Enviando arquivo...</span>  <div class="preloader-wrapper small active left"> <div class="spinner-layer  spinner-yellow-only"> <div class="circle-clipper left"><div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div></div><div class="circle-clipper right">  <div class="circle"></div>  </div></div></div></span>');
		  	Materialize.toast($toastContent, 5000);
		  	
		  	setTimeout(function(){ 
		  		var $toastContent = $('<span><span style="line-height:35px; padding-left: 10px;">Parece estar demorando um pouco...</span>  <div class="preloader-wrapper small active left"> <div class="spinner-layer  spinner-yellow-only"> <div class="circle-clipper left"><div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div></div><div class="circle-clipper right">  <div class="circle"></div>  </div></div></div></span>');
		  		Materialize.toast($toastContent, 10000);
		  	}, 4950	);

		  	setTimeout(function(){ 
		  		var $toastContent = $('<span><span style="line-height:35px; padding-left: 10px;">Nossa, que arquivo pesado...</span>  <div class="preloader-wrapper small active left"> <div class="spinner-layer  spinner-yellow-only"> <div class="circle-clipper left"><div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div></div><div class="circle-clipper right">  <div class="circle"></div>  </div></div></div></span>');
		  		Materialize.toast($toastContent, 100000);
		  	}, 14950	);

		  	$('.botaoSubmeter').addClass('disabled');		
		  	return true;
		}
	}
</script>
<?php
$prof = $_POST['profs'];
$materia = $_POST['materias'];
$quad = $_POST['quad'];
$tipo = $_POST['tipo'];
$descricao = $_POST['descricao'];
$table = 'arquivos';

if(count($descricao)!=0){
   $tipo2 = $tipo."_".$descricao;
   $tipo_link = str_replace(" ","_",$tipo2);
} else {
   $descricao = '';
   $tipo_link = str_replace(" ","_",$tipo);
}

$prof_link = str_replace(" ","",$prof);
$quad_link = str_replace(" ","",$quad);

if ($usuario=='ca'){
	$hab="s";
} else {
	$hab="";
}
include $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
	$ext = ".".substr(strrchr($_FILES['fileUpload']['name'],'.'), 1);//Pegando extensão do arquivo

   	if (($ext=='.exe') OR ($ext=='.bat') OR ($ext=='.js')){
   		?><script>
			var $toastContent = $('<span>Tipo de arquivo inválido!</span>');
			Materialize.toast($toastContent, 3000);
			$('.botaoSubmeter').removeClass('disabled');	
		</script><?
		echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=https://descomplica.dceufabc.com/upload/">';
	} else {

   		if(isset($_FILES['fileUpload'])){
	   		$dir = '../arquivos/'; //Diretório para uploads
	   		date_default_timezone_set("Brazil/East");

	   		if(($prof=='Não Informado') AND ($quad=='Não Informado')){
	   			$new_name = $materia."_".$tipo_link."_".date("H:i:s_d-m-Y").$ext; //Definindo um novo nome para o arquivo
	   		} else if (($prof=='Não Informado') AND ($quad!='Não Informado')){
	   			$new_name = $materia."_".$tipo_link."_".$quad_link."_".date("H:i:s_d-m-Y").$ext;
	   		} else if (($prof!='Não Informado') AND ($quad=='Não Informado')){
	   			$new_name = $materia."_".$tipo_link."_".$prof_link."_".date("H:i:s_d-m-Y").$ext;
	   		} else{
	   			$new_name = $materia."_".$tipo_link."_".$prof_link."_".$quad_link."_".date("H:i:s_d-m-Y").$ext;
	   		}

	      	$link_arquivo = "https://descomplica.dceufabc.com/arquivos/".$new_name;

	      	if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name)){

				$query= "INSERT INTO $table (materia, tipo, subtipo, quad, professor, link, hab, autor, ext) VALUES ('".$materia."', '".$tipo."','".$descricao."', '".$quad."','".$prof."','".$link_arquivo."', '".$hab."','".$_SESSION['login']."','".$ext."')";
		   		
		   		$inserir = mysqli_query($link, $query);
				mysqli_close($link);
				$prof='null';
				?>
				<script>
					var $toastContent = $('<span>Arquivo Enviado! Aguarde aprovação do DCE.</span>');
			  		Materialize.toast($toastContent, 4000);

					setTimeout(function () {
			       	window.location.href = "https://descomplica.dceufabc.com/upload/"; 
			    	}, 2000); //will call the function after 2 secs.
				
				</script><?
			} else {
				?><script>
					var $toastContent = $('<span>Erro ao enviar arquivo!</span>');
			  		Materialize.toast($toastContent, 4000);
			  		$('.botaoSubmeter').removeClass('disabled');	
				</script><?
			}
		} 
   }
?>