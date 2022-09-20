<?php session_start();
include("configuracion.php");
include ("includes/seguridad.php");
include("includes/functions.php");

?>
<html>
<head>
<title> [ Area de Administración ] </title>

<link rel="stylesheet" href="css/estilos.css" type="text/css">
<script language="javascript" src="textarea/wysiwyg.js" type="text/javascript"></script>
<script language="javascript" src="js/ts_picker2.js" type="text/javascript"></script> 
<script language="javascript" src="js/scripts.js" type="text/javascript"></script> 
</head>
<body>
<div id="superior">
  <div id="logo"><img src="images/logo.jpg" width="161" height="40"></div>
</div>
<div id="menu"><?php include ("includes/menu.php"); ?></div>
<div id="main">
