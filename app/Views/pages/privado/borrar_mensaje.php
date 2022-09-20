<?php
	include("configuracion.php");
	$sql="UPDATE ".$_GET["tabla"]." SET Borrado='1' WHERE Id='".$_GET["id"]."'";
	$con=mysql_query($sql);
	
	if($_GET["tabla"]=="respuestas") $destino="bandeja_de_entrada.php";
	if($_GET["tabla"]=="mensajes") $destino="mensajes_enviado.php";
	
	header ("Location: ".$destino);
?>
