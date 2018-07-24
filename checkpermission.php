<?php
$arquivo = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/php/sessao.php";
//Sua logica para verificar se o usuario esta logado...
if( $_SESSION['user'] == true) { 
        readfile($arquivo);
        exit;
} else {
    //Informo que ele não tem permissão
    echo '<h1>Arquivo disponível apenas para usuários autenticados!</h1>';
}
?>