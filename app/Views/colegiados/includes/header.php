<?php session_start();
include("configuracion.php");
include ("includes/seguridad.php");
include("includes/functions.php");
?>
<html>
<head>
<title> [ �rea de Administraci�n ] </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/estilos.css" type="text/css">
<script language="javascript" src="textarea/wysiwyg.js" type="text/javascript"></script>
<script language="Javascript"><!-- 
function printContents(idRef) { 
var elem=document.getElementById(idRef); 
if (!elem) { 
alert('El elemento indicado no existe.'); 
return false; 
} 
var html='<html><head><\/head><body onload="focus();print()">'; 
html+=elem.innerHTML; 
html+='<\/body><\/html>'; 
document.write(html); 
document.close(); 
} 
// --></script> 
</head>
<body>
<div id="superior">
  <div id="logo"><img src="images/logo.jpg" width="161" height="40"></div>
</div>
<div id="menu">&nbsp;</div>
<div id="main">
