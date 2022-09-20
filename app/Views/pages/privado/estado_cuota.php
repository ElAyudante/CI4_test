<?php session_start();
ini_set('post_max_size','100M'); 
ini_set('upload_max_filesize','100M'); 
ini_set('max_execution_time','1000'); 
ini_set('max_input_time','1000'); 
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
				
				//ACTUALIZO LOS COBROS PARA LA CUOTA
				for($l=1;$l<$_POST["numero_colegiados"];$l++) {
					if(isset($_POST["cuota".$l])) $stado=$_POST["cuota".$l]; else $stado=0;
					$sql_cobrado="UPDATE estadocobrocuotas SET Estado='$stado' WHERE relCuota='".$_POST["couta"]."' AND relColegiado='".$_POST["colegiado".$l]."'";	
					$con_cobrado=mysql_query($sql_cobrado) or die (mysql_error());					
					
					if($stado==0) {	// SI LA CUOTA RESULTA IMPAGADA SE LE ENVIA UN EMAIL					
						$sql_us="SELECT Nombre, Apellidos,Email FROM colegiados WHERE Id='".$_POST["colegiado".$l]."'";
						$con_us=mysql_query($sql_us) or die (mysql_error());
						if(mysql_num_rows($con_us)>0) {							
						
							$dato_col=mysql_fetch_array($con_us);
							$cuerpo='<html>
							<head>
							<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
							<title>LOGOPEDASCANTABRIA</title>
							<style>
							
							.texto {
								font-family:Verdana, Arial, Helvetica, sans-serif;
								font-size:11px;
							}
							
							a.corp:active{font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; text-decoration:none} 
							a.corp:visited{font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; text-decoration:none} 
							a.corp:link{font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF;  text-decoration:none} 
							a.corp:hover{font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; text-decoration:underline}
							 
							.Estilo1 {
								color: #FFFFFF;
								font-family: Arial, Helvetica, sans-serif;
								font-size: 10px;
							}
							.Estilo2 {color: #FFFFFF}
							</style>
							</head>
							
							<body leftmargin="0" topmargin="0">
							<table width="100%" style="border:none" cellpadding="0" cellspacing="0">
							  <tr>
								<td>&nbsp;</td>
								<td width="740" height="80" style="background-color:#ff0000; color:#FFF; font-family:Arial, Helvetica, sans-serif; font-size:22px">&nbsp;&nbsp;Colegio Profesional de Logopedas de Cantabria</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td width="740" bgcolor="#FFFFFF">
								<table width="680" style="border:none" cellpadding="0" cellspacing="12">
							  <tr>
								<td class="texto" height="350" valign="top">';							
								
								$cuerpo.="<p>Estimado ".$dato_col["Nombre"]."</p> \n";
								$cuerpo.="Le enviamos este email porque se ha producido un error en el cobro de la cuota del Colegio Profesional de Logopedas de Cantabria.<br> Para abonar su cuota puede hacerlo a trav�s de la <a href='http://www.logopedascantabria.org'>web del Colegio</a>\n";
								$cuerpo.="<p>Si tiene cualquier duda al respecto, puede ponerse en contacto con el Colegio en el tel�fono 942 052 099 o bien en la direcci�n de correo electr�nico <a href='mailto:colegio@logopedascantabria.org'>colegio@logopedascantabria.org</a></p>\n";
								
								$cuerpo.='<p><strong>CPLC<br>
								C/ Calder�n de la Barca, 15 Ppal Iz Of4<br>
								Santander (Cantabria)<br>
								Tlf/FAX: 942 052099 <br>							
								colegio@logopedascantabria.org - www.logopedascantabria.org</strong></p>
								
								<br>&nbsp;<br>
								<br>&nbsp;<br>
								<p>Este correo y los documentos que pudiera llevar anexos, son confidenciales y pueden constituir informaci�n reservada. Est� dirigido exclusivamente a los destinatarios que en �l aparecen. Por ello, se informa a quien lo reciba por error que la informaci�n contenida en el mismo es reservada y su uso no autorizado est� prohibido legalmente. Si ha recibido este correo por error, le rogamos que lo notifique al remitente, lo borre de su sistema y, se abstenga de usar, revelar, distribuir, imprimir o copiar ninguna de las partes del mismo. Gracias por su colaboraci�n.</p>
	
							  </tr>
							</table>
							
								</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td bgcolor="#000000">
								<table width="100%" height="25" style="border:none" cellpadding="0" cellspacing="0">
							  <tr>
								<td width="55%" bgcolor="#ff0000" class="texto"><font color="#FFFFFF">Colegio Profesional de Logopedas de Cantabria</font><font color="#FFFFFF">. </font></td>
								<td width="45%" align="right" bgcolor="#ff0000"><a href="http://www.logopedascantabria.org" class="corp">Visita nuestra web</a></td>
							  </tr>
							</table>
								</td>
								<td>&nbsp;</td>
							  </tr>
							</table>						
							</body>
							</html>';
							
								//un objeto de la misma
							  require_once "phpmailer/class.phpmailer.php";
							
							  //instanciamos un objeto de la clase phpmailer al que llamamos 
							  //por ejemplo mail
							  $mail = new phpmailer();
							
							  //Definimos las propiedades y llamamos a los mtodos 
							  //correspondientes del objeto mail
							
							  //Con PluginDir le indicamos a la clase phpmailer donde se 
							  //encuentra la clase smtp que como he comentado al principio de 
							  //este ejemplo va a estar en el subdirectorio includes
							  $mail->PluginDir = "phpmailer/";
							
							  //Con la propiedad Mailer le indicamos que vamos a usar un 
							  //servidor smtp
							  $mail->Mailer = "mail";
										
							  //Asignamos a Host el nombre de nuestro servidor smtp
							  $mail->Host = "mail.logopedascantabria.org";
							
							  //Le indicamos que el servidor smtp requiere autenticacin
							  $mail->SMTPAuth = true;
							
							  //Le decimos cual es nuestro nombre de usuario y password
							  $mail->Username = "colegio@logopedascantabria.org"; 
							  $mail->Password = "contrasena";
							
							  //Indicamos cual es nuestra direccin de correo y el nombre que 
							  //queremos que vea el usuario que lee nuestro correo
							  $mail->From = "colegio@logopedascantabria.org";
							  $mail->FromName = "Colegio Profesional de Logopedas de Cantabria";
							
							  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
							  //una cuenta gratuita, por tanto lo pongo a 120  
							  $mail->Timeout=120;
							
							  //Indicamos cual es la direccin de destino del correo
							  
							  $mail->AddAddress($dato_col["Email"]);
							
							  //Asignamos asunto y cuerpo del mensaje
							  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
							  //que se vea en negrita
							  //que se vea en negrita
							  
							  $mail->Subject = "Error en el cobro de su cuota";						
							 
							  $mail->Body = $cuerpo;	
							  $file="none";				  
							  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
							  $mail->AltBody = "";
							  
							  //Indicamos el fichero a adjuntar si el usuario seleccion uno en el formulario					  						
								  if ($file !="none") {
								$mail->AddAttachment($file,$file_name);
								  }
							
							  //se envia el mensaje, si no ha habido problemas 
							  //la variable $exito tendra el valor true
							  $exito = $mail->Send();
							
							  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
							  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
							  //del anterior, para ello se usa la funcion sleep	
							  $intentos=1; 
							  while ((!$exito) && ($intentos < 5)) {
								sleep(5);
									//echo $mail->ErrorInfo;
									$exito = $mail->Send();
									$intentos=$intentos+1;				
							   }	
					//FIN ENVIO RESPUESTA
				
						}
					}	
					
				}
				$mensaje="Los datos se han actualizado correctamente.";
				echo $mensaje;

			}
			else {		
							
				
					
	?>
    
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="225" height="25" align="right" class="privada">&nbsp;</td>
        <td height="25" align="right">
        <?php
        $concat="SELECT * FROM cobroscuotas ORDER BY Id DESC";
		$concat=mysql_query($concat) or die (mysql_error());
		if (mysql_num_rows($concat)>0) {
			echo '<form name="estado_cuota"><select name="cuota" onChange="self.location.href=\'estado_cuota.php?c=\'+document.estado_cuota.cuota.options[document.estado_cuota.cuota.selectedIndex].value">
						<option>Seleccion la cuota que quiere comprobar</option>';
			while($cat=mysql_fetch_array($concat)) {
				echo "<option value='".$cat["Id"]."' ";
				if(isset($_GET["c"])) if($cat["Id"]==$_GET["c"]) echo "selected";
				echo ">".$cat["Descripcion"]."</option> \n";
			}
			echo '</select> </form>';
		}
		else {
			echo "No existe ninguna cuota en la Base de Datos";	
		}
		?>
		</td>
      </tr>
      <tr>
        <td height="40" width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">
      <?php
	  	if(isset($_GET["c"])) {
			$sql_ecu="SELECT colegiados.Nombre, colegiados.Apellidos, colegiados.Id, cobroscuotas.Descripcion, estadocobrocuotas.relColegiado, estadocobrocuotas.Estado FROM colegiados, cobroscuotas, estadocobrocuotas WHERE cobroscuotas.Id='".$_GET["c"]."' AND colegiados.Id=estadocobrocuotas.relColegiado AND estadocobrocuotas.relCuota='".$_GET["c"]."' AND colegiados.Ejerciente NOT LIKE '2' ORDER BY colegiados.Apellidos";
			$con_ecu=mysql_query($sql_ecu) or die (mysql_error());
			$filas=mysql_num_rows($con_ecu);
			if(mysql_num_rows($con_ecu)>0) {
				
				
				$TAMANO_PAGINA = 80;
				//examino la p�gina a mostrar y el inicio del registro a mostrar
				$pagina = @$_GET["pagina"];
				if (!$pagina) {
					$inicio = 0;
					$pagina=1;
				}
				else {
					$inicio = ($pagina - 1) * $TAMANO_PAGINA;
				}
				
				//calculo el total de p�ginas		
				$total_paginas = ceil($filas / $TAMANO_PAGINA);
				
				$sql_ecu="SELECT colegiados.Nombre, colegiados.Apellidos, colegiados.Id, cobroscuotas.Descripcion, estadocobrocuotas.relColegiado, estadocobrocuotas.Estado FROM colegiados, cobroscuotas, estadocobrocuotas WHERE cobroscuotas.Id='".$_GET["c"]."' AND colegiados.Id=estadocobrocuotas.relColegiado AND estadocobrocuotas.relCuota='".$_GET["c"]."' ORDER BY colegiados.Apellidos LIMIT ".$inicio."," .$TAMANO_PAGINA;
				$con_ecu=mysql_query($sql_ecu) or die (mysql_error());
				
				echo "<form name='cuota_colegiado' method='post' action='estado_cuota.php'>\n";
				echo "<input name='couta' value='".$_GET["c"]."' type='hidden'>\n";
				echo "<table width='700' style='border:none' cellpadding='0' cellspacing='0'>\n";
				echo "<tr bgcolor='#CCCCCC'> \n";
					echo "<td width='450' height='30'>&nbsp;<strong>Colegiado</strong></td>\n";
					echo "<td align='center'>&nbsp;<strong>Cobrado</strong></td>\n";
					echo "</tr>\n";
					$g=1;
				while($estado=mysql_fetch_array($con_ecu)) {
					echo "<tr> \n";
					echo "<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;".$estado["Apellidos"].", ".$estado["Nombre"]."</td>\n";
					echo "<td align='center' style='border-bottom:1px solid #CCC'><input type='checkbox' name='cuota".$g."' value='1'";
					if($estado["Estado"]==1) echo " checked";
					echo "> \n
					<input name='colegiado".$g."' value='".$estado["relColegiado"]."' type='hidden'>\n
					</td>\n";
					echo "</tr>\n";
					$g++;
				}				
				echo "<tr> \n";
				echo "<td width='450' height='25'>&nbsp;</td>\n";
				echo "<td align='center'>&nbsp;<input type='hidden' value='".$g."' name='numero_colegiados'>\n
				</td>\n";
				echo "</tr>\n";
				echo "<tr> \n";
				echo "<td height='25'>&nbsp;</td>\n";
				echo "<td align='right'>";
				echo '<input name="enviar" value="Guardar Cambios" type="submit" /></td>';
				echo "</tr>\n";
				echo "<tr> \n";
				echo "<td height='25'>&nbsp;</td>\n";
				echo "<td align='right'>&nbsp;</tr>\n";
				echo "<tr> \n";
				echo "<td height='25'>&nbsp;</td>\n";
				echo "<td align='right'>";
				
					if ($total_paginas > 1){
						for ($i=1;$i<=$total_paginas;$i++){
							if ($pagina == $i) {
							//si muestro el �ndice de la p�gina actual, no coloco enlace
								echo "[$pagina]" . " ";
							}
							else {
										//si el �ndice no corresponde con la p�gina mostrada actualmente, coloco el enlace para ir a esa p�gina
										
										echo "<a  href='estado_cuota.php?c=" . $_GET["c"] ;
										echo "&pagina=".$i;
										echo "'>" . $i . "</a> "; 
							}
						}
					}
				
				echo"</tr>\n";
				echo "<tr> \n";
				echo "<td height='25'>&nbsp;</td>\n";
				echo "<td align='right'>&nbsp;</tr>\n";
				echo "</table>\n </form>\n";
			}
			else {
				echo "<p>No existe ning�n colegiado asignado a esta cuota.</p>";	
			}
		}
	  ?>  
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
