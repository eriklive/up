<!DOCTYPE html>
<html>
<head>
	<?php 
    include_once("analyticstracking.php");
    define ('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
  ?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo "$nomeDaPágina"; ?></title>
	<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/up/menus/fonts.css">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="http://localhost/up/css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
   	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
