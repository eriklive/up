<?php 

$endereco_db="mysql.hostinger.com.br"; 
$login_db="u934787498_dce"; 
$senha_db="M4lf31t0f31t0"; 
$nome_db="u934787498_dce";

$link = mysqli_connect($endereco_db,$login_db,$senha_db) or die(mysqli_error( $link ));
mysqli_select_db($link, $nome_db) or die(mysqli_error( $link )); /* Conexão com o banco de dados */
?>