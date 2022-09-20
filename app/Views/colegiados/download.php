<?php session_start(); include("includes/seguridad.php");

$ref=$_GET["ref"];
include("configuracion.php");

$sql="SELECT Archivo FROM documentos WHERE Id='$ref'";
$con=mysql_query($sql) or die (mysql_error());
if(mysql_num_rows($con)>0) {
	$referen=mysql_fetch_array($con);
	$path = "../docs";
	$archivo = $referen["Archivo"];
	$enlace = $path."/".$archivo;
	
	header("Content-type: application/force-download");  
    header("Content-Disposition: filename=".$enlace);  
    header("Content-Transfer-Encoding: binary");  
    readfile($enlace);
}
else {
	header("Location: index.php");	
}

?>
