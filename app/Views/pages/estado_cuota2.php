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
</head>
<body>
<div id="superior">
  <div id="logo"><img src="images/logo.jpg" width="161" height="40"></div>
</div>
<div id="menu"><?php include ("includes/menu.php"); ?></div>
<div id="main">
<!-- *******************************************************-->
<div id="menu_lat">
<?php
	include("menus/switch_menus.php");	
?>
</div>
<!-- *******************************************************-->
<!-- *******************************************************-->
<div id="cont_2">
<h1>Estado de cuotas de colegiado</h1>
<?php 
			// VALIDAR FORMULARIO
			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar'])) {
				
				echo "hola";
			}
			else {		
							
				
					
	?>
    
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>      
      <tr>
        <td height="40" width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">
       		<form name='cuota_colegiado' method='post' action='estado_cuota2.php'>
			<input name='couta' value='8' type='hidden'>
			<table width='700' style='border:none' cellpadding='0' cellspacing='0'>
			<tr bgcolor='#CCCCCC'>
				<td width='450' height='30'>&nbsp;<strong>Colegiado</strong></td>
				<td align='center'>&nbsp;<strong>Cobrado</strong></td>
			</tr>
        	<tr> 
            <td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;Alas-Pumari�o Sela, Isabel de las</td> 
            <td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota1' value='1' checked>  
					<input name='colegiado1' value='2' type='hidden'>  
                    <input type='hidden' value='1' name='numero_colegiados'>
			</td> 
			</tr> 
      		<tr>
			<td height='25'>&nbsp;</td>
				<td align='right'>
				<input name="enviar" value="Guardar Cambios" type="submit" /></td>
				</tr>
				</table>
                 </form>
      </td>
      </tr>     
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>    
      <tr>
        <td height="25" colspan="2" align="center">&nbsp;</td>
      </tr>
    </table>

	<!-- fin de tabla de contenido-->
    <?php
			
		} // fin if (isset($_POST['enviar']) && !$error) {	
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
