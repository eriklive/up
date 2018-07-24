<?php 
$nomeDaPágina = 'Descomplica UFABC';
include "./header.php"; 

session_start();

if ((!isset ($_SESSION['user'])== true) and (!isset ($_SESSION['senha'])==true)) { 
	include("./login/index.php");
} else { 
	include("./home/index.php"); 
} 

?>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php SERVER_ROOT ?>/up/js/materialize.min.js"></script>

<script>
  	$(document).ready(function() {
	    $('select').material_select();
	    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
	    $('.modal').modal();
	    $(document).ready(function(){
   			$('ul.tabs').tabs();
   		});
	});  
</script>

</html>		