<?php session_start(); 
include("configuracion.php");
include("includes/functions.php");
if(isset($_POST["enviar"])) {
	switch($_POST["tipo"]) {
		case 1:
		include("includes/validar_ejercientes.php");
		break;
		
		case 2:
		include("includes/validar_noejercientes.php");
		break;
		
		case 3:
		include("includes/validar_asociados.php");
		break;
		
		case 4:
		include("includes/validar_nocolegiados.php");
		break;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1s" />
<title>Ventanilla &uacute;nica del Colegio Procesional de Logopedas de Cantabria</title>
<link rel="stylesheet" href="css/estilos.css" type="text/css" />
</head>

<body<?php  if(isset($_POST["enviar"]) && $error=="" && $_POST["pago"]=="online") echo ' onLoad="javascript:document.compra.submit();"'; ?>>
<div align="center">
  <table width="856" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><img src="principal_archivos/9999.gif" width="856" height="256" /></td>
    </tr>
    <tr>
      <td width="125" bgcolor="#000000">&nbsp;</td>
      <td width="586" bgcolor="#000000"><?php include("includes/menu.php"); ?></td>
      <td width="150" bgcolor="#000000">&nbsp;</td>
    </tr>
    <tr>
      <td width="125" bgcolor="#CCCCCC">&nbsp;</td>
      <td width="586" height="300" align="left" valign="top" style="padding:5px">
      <?php
	  	
		if(isset($_GET["ref"])) $refe=$_GET["ref"]; else {if(isset($_POST["ref"])) $refe=$_POST["ref"];}
		  $SQL1="SELECT * FROM eventos WHERE Activo='1' AND Id='".@$refe."'";
		  $res_con1=mysql_query($SQL1) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		  $num_res1=mysql_num_rows($res_con1);
		  if ($num_res1>0) {
			  $curso=mysql_fetch_array($res_con1);
			 
	  ?>
        <h1>Inscripcion para <?php echo $curso["Evento"] ?></h1>  
        
        <div class="alerta">
        	<p>- Para evitar errores en el proceso de pago recomendamos que utilicen el navegador<strong> Internet Explorer</strong> y tengan desactivado el bloqueo de ventanas emergentes</p>
        </div>        
          
        
          <?php
		  if(isset($_POST["enviar"]) && $error=="" && $_POST["pago"]=="online") { // SI EXISTE LA VARIABLE DEL ENVÍO PROCESO LA INSCRIPCION, SINO MUESTRO EL FORMULARIO		 
			  // OBTENGO EL NUMERO DEL PROXIMO PAGO			  
			  $num=@proximo_registro($bd_base,"pedidos"); /**********************************************************************************/
			  
			  //METO EL PEDIDO A LAS BASES DE DATOS
			  $sql_articulos="INSERT INTO relPedidos VALUES ('','ins".$num."-".date("Y")."', '".$curso["Id"]."', 'Inscripcion ".$curso["Evento"]."', '1', '".$_SESSION["precio_curso"]."')";			  
			  $con_articulos=mysql_query($sql_articulos) or die (mysql_error());
			  
			  $sql_pedido="INSERT INTO pedidos VALUES ('','ins".$num."-".date("Y")."', '', '".$_SESSION["precio_curso"]."', '0', '0', '0', '1', 'ins".$num_inscrito."', '3', '".date("Y-m_d H:i:s")."','','Tarjeta', '0')";			  
			  $con_pedido=mysql_query($sql_pedido) or die (mysql_error());
			  
			  if($_SESSION["precio_curso"]>0) {
			  ?>
              <p style="clear:both;">Estamos procesando su pago</p>
              <img src="images/ajax-loader2.gif" width="128" height="15" />
              	<!--https://tpv.4b.es/tpvv/teargral.exe-->
            
            <form method="post" name="compra" action="https://tpv.4b.es/tpvv/teargral.exe">
                <input type="hidden" name="order" value="<?php echo "ins".$num."-".date("Y"); ?>">
                <input type="hidden" name="store" value="PI00015395">
                <input type="hidden" value="es">
            </form>	
              	
              <?php
			  }
		  }
		  elseif(isset($_POST["enviar"]) && $error=="" && $_POST["pago"]=="transferencia"){
			  switch($_POST["tipo"]) {
				case 1:  
				$precio_curso=$curso["ImporteColegiados"];
				break;
				
				case 2:  
				$precio_curso=$curso["ImporteNoEjercientes"];
				break;
				
				case 3:  
				$precio_curso=$curso["ImporteAsociaciones"];
				break;
				
				case 4:  
				$precio_curso=$curso["NoColegiadoss"];
				break;
				
			  }
			  echo "<h2>Importe de la inscripci&oacute;n: <strong>".$precio_curso." &euro;</strong></h2>";
				echo "<p style='text-align:left;clear:both'> Para completar el proceso de colegiaci&oacute;n debe realizar la transfrencia a la cuenta bancaria del Colegio Profesional de Logopedas de Cantabria del Banco Santander: <strong>0049-5863-61-2616027546</strong>, indicando en el concepto su DNI o CIF, y enviar el justificante del pago a nuestra direcci&oacute;n de email: <strong>colegio@logopedascantabria.org</strong></p>\n<br>";
		  }
		  elseif(isset($_POST["enviar"]) && $error=="" && !isset($_POST["pago"])){
			  echo "<p>Gracias por realizar su inscripci&oacute;n, se ha realizado correctamente.</p>";
		  }
		  else{
			  if(isset($_POST["enviar"])) $tip=$_POST["tipo"]; else $tip=$_GET["tipo"];
		  	switch($tip) {
				case 1:
				$_SESSION["precio_curso"]=$curso["ImporteColegiados"];
				echo "<h2>Importe de la inscripci&oacute;n: <strong>".$curso["ImporteColegiados"]." &euro;</strong></h2>";
				echo "<p style='text-align:left;clear:both'>Indique su N&uacute;mero de colegiado para formalizar la inscripci&oacute;n. Una vez lo haya hecho, haga click en el bot&oacute;n \"<strong>Guardar Datos y Pagar</strong>\" para proceder al cobro del importe de la inscripci&oacute;n mediante tarjeta de cr&eacute;dito o d&eacute;bito.</p>\n<br>";
				include("includes/form_ejercientes.php");
				break;
				
				case 2:
				$_SESSION["precio_curso"]=$curso["ImporteNoEjercientes"];
				echo "<h2>Importe de la inscripci&oacute;n: <strong>".$curso["ImporteNoEjercientes"]." &euro;</strong></h2>";
				echo "<p style='text-align:left;clear:both'>Indique su N&uacute;mero de colegiado para formalizar la inscripci&oacute;n. Una vez lo haya hecho, haga click en el bot&oacute;n \"<strong>Guardar Datos y Pagar</strong>\" para proceder al cobro del importe de la inscripci&oacute; mediante tarjeta de cr&eacute;dito o d&eacute;bito.</p>\n<br>";
				include("includes/form_noejercientes.php");
				break;
				
				case 3:
				$_SESSION["precio_curso"]=$curso["ImporteAsociaciones"];
				echo "<h2>Importe de la inscripci&oacute;n: <strong>".$curso["ImporteAsociaciones"]." &euro;</strong></h2>";
				echo "<p style='text-align:left;clear:both'>Rellene el siguiente formulario para formalizar la inscripci&oacute;n. Una vez lo haya hecho, haga click en el bot&oacute;n \"<strong>Guardar Datos y Pagar</strong>\" para proceder al cobro del importe de la inscripci&oacute; mediante tarjeta de cr&eacute;dito o d&eacute;bito.</p>\n<br>";
				echo "<p style='text-align:left'>Desde el Colegio de Logopedas se le pedir&aacute; acreditaci&oacute;n de su afiliaci&oacute;n de la asociaci&oacute;n o colegio al que pertenece.</p>\n";
				include("includes/form_asociados.php");
				break;
				
				case 4:
				$_SESSION["precio_curso"]=$curso["NoColegiados"];
				echo "<h2>Importe de la inscripci&oacute;n: <strong>".$curso["NoColegiados"]." &euro;</strong></h2>";
				echo "<p style='text-align:left;clear:both'>Rellene el siguiente formulario para formalizar la inscripci&oacute;n. Una vez lo haya hecho, haga click en el bot&oacute;n \"<strong>Guardar Datos y Pagar</strong>\" para proceder al cobro del importe de la inscripci&oacute; mediante tarjeta de cr&eacute;dito o d&eacute;bito.</p>\n<br>";
				include("includes/form_nocolegiados.php");
				break;
			}
			
			echo '<p style="font-size:0.8em">En relaci&oacute;n al cumplimiento de la Ley Org&aacute;nica 15/1999, de 13 de Diciembre, de Protecci&oacute;n de Datos de Car&aacute;cter Personal, le informamos que los datos personales facilitados por Ud. en cualquiera de los formularios incluidos en este sitio web www.logopedascantabria.org son incluidos en unos ficheros inform&aacute;ticos propiedad y responsabilidad del Colegio Profesional de Logopedas de Cantabria y ser&aacute;n tratados por m&eacute;todos automatizados con la &uacute;nica finalidad de hacer posible la gesti&oacute;n administrativa de nuestras relaciones profesionales.</p>
    <p style="font-size:0.8em">El usuario autoriza expresamente al Colegio Profesional de Logopedas de Cantabria para que cuantos datos se obtengan en este sitio web  puedan ser facilitados a terceras empresas para el mejor cumplimiento de sus servicios -transportistas, entidades financieras, correo etc.- en caso de que fuese necesario. En todos los casos, dichos datos, ser&aacute;n los estrictamente necesarios.</p>
    <p style="font-size:0.8em">En cualquier momento puede Ud. ejercer los derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n y oposici&oacute;n que le otorga la vigente Ley 15/1999, de 13 de Diciembre, de Protecci&oacute;n de Datos de Car&aacute;cter Personal, simplemente notific&aacute;ndonoslo por tel&eacute;fono, correo, fax o email</p>';
		  }
		  ?>
        
       <?php
		  }
	   ?>
      </td>
      <td width="150" bgcolor="#000000">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center"><span class='pie'>&copy; 2004 - <?php echo date("Y"); ?> <strong>Colegio Profesional de Logopedas  de Cantabria</strong> | CIF: Q3900765C <br /> C/ Calder&oacute;n de la Barca N&ordm; 15 Ppal Izq. Of. 4 | Santander (Cantabria)<br />
      Tel. /Fax: 942 052 099  / colegio@logopedascantabria.org / <a href="/aviso-legal.php">Aviso Legal</a> / <a href="/politica-privacidad.php">Pol&iacute;tica de Privacidad</a></span></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
</body>
</html>
