<?php session_start(); ?>
<html>
<head>
<title> [ &Aacute;rea de Administraci&oacute;n ] </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/estilos.css" type="text/css">
<script language="javascript" src="textarea/wysiwyg.js" type="text/javascript"></script>
<script language="javascript" src="js/ts_picker2.js" type="text/javascript"></script>
<head>
<body>
<div id="superior">
 <img src="images/logo.jpg" width="161" height="40" style="margin-bottom:3px;" >
  <div class="menu" id="menu"><?php include ("includes/menu.php"); ?></div>
</div>
<div id="main">
<?php include("../php/configuracion.php");
	include("includes/functions.php"); 
?>
