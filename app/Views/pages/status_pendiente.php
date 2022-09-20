<?php include("configuracion.php");
				// ACTUALIZADO EL PEDIDO A 2 --> Enviado
				$sql="UPDATE pedidos SET Estado='0' WHERE Referencia='".$_GET["id"]."'";
				$con_sql=mysql_query($sql) or die (mysql_error());	
				//INFORMACION DEL PEDIDO
				$sql_ped="SELECT * FROM pedidos WHERE Referencia='".$_GET["id"]."'";
				$con_ped=mysql_query($sql_ped) or die (mysql_error());	
				$ped=mysql_fetch_array($con_ped);
				
				//informacion detalla del pago
				$sql_ped2="SELECT * FROM relPedidos WHERE relPedido='".$_GET["id"]."'";
				$con_ped2=mysql_query($sql_ped2) or die (mysql_error());	
				$ped2=mysql_fetch_array($con_ped2);
				
				//SELECCIONO LOS DATOS DEL CLIENTE PARA ENVIARLE EL E-MAIL CON EL PEDIDO
				//OBTENGO EL PREFIJO PARA SABER EL TIPO DE PAGO QUE ES
				$tipo_pago=explode("ins",$ped["Referencia"]);
				
				if(count($tipo_pago)>0) {
					$sql_user="SELECT Nombre, Apellidos, Email FROM inscripciones WHERE Id='".str_replace("ins","",$ped["Cod_cliente"])."'";
				}
				else {
					$sql_user="SELECT Nombre, Apellidos, Email FROM colegiados WHERE Id='".$ped["Cod_cliente"]."'";
				}
				
				$con_user=mysql_query($sql_user) or die (mysql_error());
				
					if(mysql_num_rows($con_user)>0) {					
						$usuario=mysql_fetch_array($con_user);	
					}							
		
			// genero el email de confirmacion
				
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
							
							$cuerpo.="<p>Estimado ".$usuario["Nombre"]." ".$usuario["Apellidos"]."</p>\n";	
							
							$cuerpo.="<p>Le enviamos este email para indicarle que su pago con los datos que le detallamos a continuaci�n a cambiado de estado a: <strong>PENDIENTE DE CONFIRMACI�N</strong></p>\n";	
							
							$cuerpo.="<strong>Pago:</strong> ".$ped2["Articulo"]."<br> <strong>Importe:</strong> ".$ped2["Precio"];
							
							$cuerpo.="<p>Si necesita alguna informaci�n adicional, puede ponerse en contacto con el Colegio Profesional de Logopedas de Cantabria en el tel�fono 942 052099</p>\n";
							
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
					  require "phpmailer/class.phpmailer.php";
					
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
					   $mail->Mailer = "smtp";
								
								  //Asignamos a Host el nombre de nuestro servidor smtp
								  $mail->Host = "mail.logopedascantabria.org";
								
								  //Le indicamos que el servidor smtp requiere autenticacin
								  $mail->SMTPAuth = true;
								
								  //Le decimos cual es nuestro nombre de usuario y password
								  $mail->Username = "colegio@logopedascantabria.org"; 
								  $mail->Password = "cplc2013";
								
								  //Indicamos cual es nuestra direccin de correo y el nombre que 
								  //queremos que vea el usuario que lee nuestro correo
								  $mail->From = "colegio@logopedascantabria.org";
								  $mail->FromName = "LOGOPEDASCANTABRIA.ORG";
					
					  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
					  //una cuenta gratuita, por tanto lo pongo a 120  
					  $mail->Timeout=120;
					
					  //Indicamos cual es la direccin de destino del correo
					  
					  $mail->AddAddress($usuario["Email"]);
					
					  //Asignamos asunto y cuerpo del mensaje
					  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
					  //que se vea en negrita
					  $mail->Subject = "Su pago ha cambiado de estado";
					  $mail->Body = $cuerpo;
					
					  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
					  $mail->AltBody = "";
					  
					  //Indicamos el fichero a adjuntar si el usuario seleccion uno en el formulario
					  	$file="";						
						  if ($file !="") {
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
							echo $intentos;
					   }			
					   
					   
					   if(!$exito)
					   {
						echo "Problemas enviando correo electr�nico a ".$valor;
						echo "<br>".$mail->ErrorInfo;	
					   }
					   else {
						echo "El pago a cambiado de estado correctamente. <br> \n";
						}			
				  
					
               
   ?>
