<?php include ("includes/header.php");
?>
<!-- *******************************************************-->
<div id="menu_lat">
<?php
	include("menus/switch_menus.php");	
?>
</div>
<!-- *******************************************************-->
<!-- *******************************************************-->
<div id="cont_2">
   <h1>Confirmar la baja del colegiado</h1>
    <?php 
			
			if(isset($_POST["enviar"])) {
				
				$sql_con="UPDATE solicitudes_baja SET Confirmada='1' AND Fecha='".date("Y-m-d H:i:s")."'";
				$con_con=mysql_query($sql_con) or die (mysql_error());
				
				
				/***********************************************/
				/***********************************************/
				/***********************************************/
				/***********************************************/
				/***********************************************/
				/***********************************************/
				/***********************************************/
				
				//ENVIO RESPUESTA
				$cuerpo='<html>
						<head>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
						<title>LOGOPEDASCANTABRIA.ORG</title>
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
						
						h1{
							font-size:14px	
						}
						
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
							
								$cuerpo.="<h1>Confirmaci�n de Baja</h1>\n";
								$cuerpo.="El sistema de ventanilla �nica informa de que la baja est� siendo tramitada por el Colegio Profesional de Logopedas de Cantabria.<br> Si tiene alguna duda al respecto o usted no ha solicitado la baja del colegio, por favor p�ngase en contacto con nosotros.";
							
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
					  
					  $mail->AddAddress($_POST["email"]);
					
					  //Asignamos asunto y cuerpo del mensaje
					  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
					  //que se vea en negrita
					 //que se vea en negrita
					  
						$mail->Subject = "Solicitud de Baja";						
					 
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
				
				/***********************************************/
				/***********************************************/
				/***********************************************/
				/***********************************************/
				/***********************************************/
				/***********************************************/
				/***********************************************/
				
				echo "<p>La solicitud de baja ha sido confirmada. Se le ha enviado un email al colegiado para confirmarle su baja.</p>";
				
				
			}
			else {
				
		  $SQL1="SELECT colegiados.Nombre, colegiados.Apellidos, colegiados.Colegiado, colegiados.Email, colegiados.NIF, colegiados.Localidad, colegiados.Provincia, solicitudes_baja.relColegiado , solicitudes_baja.Comentarios FROM colegiados, solicitudes_baja WHERE colegiados.Id=solicitudes_baja.relColegiado AND colegiados.Id='".$_GET["id"]."'";  		  		  
		  $res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		  $num_res1=mysql_num_rows($res_con1);
		  if ($num_res1<1) {
			echo "<p>No existen colegiados pendientes de validar</p>\n";  
		  } // fin IF mysql_num_rows($SQL1)<0		
		  else {			
			  echo "<table cellpadding='0' cellspacing='0' width='585'> \n";
			  echo "<tr> \n
				  <td colspan='2'> &nbsp;</td> \n
				  </tr> \n";				  
			  $campo=mysql_fetch_array($res_con1);
			  
			  echo "<tr> \n
				<td width='200' height='25' align='right' class='privada'>Nombre:&nbsp;&nbsp;</td> \n
				<td height='25'>".$campo["Nombre"]." ". $campo["Apellidos"]."</td> \n
				</tr>\n";
				
				echo "<tr> \n
				<td width='200' height='25' align='right' class='privada'>N� Colegiado:&nbsp;&nbsp;</td> \n
				<td height='25'>".$campo["Colegiado"]."</td> \n
				</tr>\n";
				
				echo "<tr> \n
				<td width='200' height='25' align='right' class='privada'>Localidad:&nbsp;&nbsp;</td> \n
				<td height='25'>".$campo["Localidad"]." &nbsp;Provincia: ".$campo["Provincia"]."</td> \n
				</tr>\n";
				
				echo "<tr> \n
				<td width='200' height='25' align='right' class='privada' valign='top'>Comentarios:&nbsp;&nbsp;</td> \n
				<td height='25'>".$campo["Comentarios"]."</td> \n
				</tr>\n";
				
				//OBTENGO LAS COUTAS QUE EL COLEGIADO TIENE PENDIENTE
				$sql_cu="SELECT Importe FROM estadocobrocuotas WHERE relColegiado='".$_GET["id"]."' AND Estado='0'";
				$con_cu=mysql_query($sql_cu) or die (mysql_error);
				if(mysql_num_rows($con_cu)>0) {
					$suma=0;
					while($cuo=mysql_fetch_array($con_cu)) {
						$suma+=$cuo["Importe"];
					}
					$mensaje="Cuotas: ".mysql_num_rows($con_cu)." &nbsp; Importe: ".$suma." &euro;";
				}
				else {
					$mensaje="Este colegiado no tiene cuotas pendientes.";	
				}
				
				echo "<tr> \n
				<td width='200' height='25' align='right' class='privada'>Pendiente de pago:&nbsp;&nbsp;</td> \n
				<td height='25'>$mensaje</td> \n
				</tr>\n";
				
				
				
				
				echo" <tr>
				  <td height='35' align='right' valign='bottom'>&nbsp;</td>
				  </tr>";
				
				echo "<tr> \n
				<td width='200' height='25' align='right' class='privada' valign='top'>&nbsp;</td> \n
				<td height='25' align='right'><form action='baja.php' method='post'><input type='hidden' name='confirmado' value='".$_GET["id"]."'><input type='hidden' name='email' value='".$campo["Email"]."'><input name='enviar' value='Confirmar Baja' type='submit'></form></td> \n
				</tr>\n";
				
				echo "<tr> \n
				<td width='200' height='25' align='right' class='privada' valign='top'>&nbsp;</td> \n
				<td height='25' align='right'><a href='imprimir_baja.php?id=".$_GET["id"]."' target='_blank'>PDF para imprimir</a></td> \n
				</tr>\n";
				
			  				
			echo" <tr>
				  <td height='35' align='right' valign='bottom'>&nbsp;</td>
				  </tr>";
		   echo "</table> \n";		   
			
		   }
			}
		   
		?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
