</div>
<div id="main">		
			<?php
				// VALIDAR FORMULARIO
			$error ="";
				if (isset($_POST["enviar"])) {				
				if (empty($_POST["email"])){
			 $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe insertar tu e-mail.</font> \n <br>";}			 
			 
			 $SQL_1="SELECT * FROM admin WHERE Email LIKE '".$_POST["email"]."'";
			 $res_SQL_1=mysqli_query($SQL_1);
			 if (mysqli_num_rows($res_SQL_1) <1) {
			 	$error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Esta direcci�n de correo no est� registrada en nuestras bases de datos</font> \n <br>";}
				}
			
				// PROCESAMOS EL FORMULARIO
			  
			  if (isset($_POST['enviar']) && !$error) {				
					
					// ASIGNO UNA REFERENCIA ALEATORIA PARA MODIFICAR LA CONTRASE�A
					
					$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
					$referencia = "";
						for($i=0;$i<12;$i++) {
						$referencia .= substr($str,rand(0,62),1);
						}
					$sql_ref="SELECT Cod_recuperacion FROM admin WHERE Cod_recuperacion='$referencia'";
					$con_ref=mysql_query($sql_ref) or die (mysql_error());
					$resultado=mysql_num_rows($con_ref);
					
					while ($resultado !=0) {		
					$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
					$referencia = "";
						for($i=0;$i<12;$i++) {
						$referencia .= substr($str,rand(0,62),1);
						}		
					}
					
					$sql_recu="UPDATE admin SET Cod_recuperacion='$referencia' WHERE Email='".$_POST["email"]."'";
					$con_recu=mysql_query($sql_recu) or die (mysql_error());	
					
					
					
					
																								
					//ENVIO DEL FORMULARIO DE CONSULTA AL EMAIL ASIGNADO
					
					$sql="SELECT Email FROM admin WHERE Email LIKE '".$_POST["email"]."'";					
					$consulta=mysql_query($sql) or die(mysql_error());
					$datos=mysql_fetch_array($consulta);
					
					
					
					$cuerpo='<html>
						<head>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
						<title>CPLC</title>
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
							
								$cuerpo .="Recuperacion de datos: \n";
					$cuerpo .="</font></p> \n";
					$cuerpo .="<p> \n";
					$cuerpo .="<font face='Arial narrow, Arial, Helvetica, sans-serif' size='2'> \n";
					$cuerpo .="Para cambiar su contrase�a debe acceder al enlace que le indicamos a continuaci�n: \n";
					$cuerpo.="<p><a href='http://www.logopedascantabria.org/privado/rec_password.php?rec=".$referencia."'>Quiero seleccionar una nueva contrase�a</a></p> \n";
								 																					
							
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
				  $mail->Mailer = "mail";
					
					  //Asignamos a Host el nombre de nuestro servidor smtp
					  $mail->Host = "mail.LOGOPEDASCANTABRIA.ORG";
					
					  //Le indicamos que el servidor smtp requiere autenticacin
					  $mail->SMTPAuth = true;
					
					  //Le decimos cual es nuestro nombre de usuario y password
					  $mail->Username = "colegio@logopedascantabria.org"; 
					  $mail->Password = "avequetzal";
					
					  //Indicamos cual es nuestra direccin de correo y el nombre que 
					  //queremos que vea el usuario que lee nuestro correo
					  $mail->From = "info@mail.LOGOPEDASCANTABRIA.ORG";
					  $mail->FromName = "LOGOPEDASCANTABRIA.ORG";
				
				  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
				  //una cuenta gratuita, por tanto lo pongo a 120  
				  $mail->Timeout=120;
				
				  //Indicamos cual es la direccin de destino del correo
				  if(isset($_GET["email"])) $mail->AddAddress($_GET["email"]);
				  else  $mail->AddAddress($datos["Email"]);
				
				  //Asignamos asunto y cuerpo del mensaje
				  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
				  //que se vea en negrita
				  $mail->Subject = "Recuperación de Contraseña";
				  $mail->Body = $cuerpo;
				
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
				 
						
				   if(!$exito)
				   {
					echo "Problemas enviando correo electrónico a ".$valor;
					echo "<br>".$mail->ErrorInfo;	
				   }
				   else {
					echo "Revise su cuenta de correo. Le hemos enviado un enlace para que pueda seleccionar una nueva contraseña";
					}
				}
				else {							
					if ($error) { echo "<div align='left'>".$error."</div><br>";
					}
				?>			
				Si ha olvidado su contraseña puede cambiarla indicandonos la dirección de e-mail con la que se registró.
				
				<form name="contacto" action="<?php echo base_url(),'/'; ?>password" method="post">
                    
                      <table width="650" style="border:none" cellpadding="0" cellspacing="2" class="texto">
                        <tr bgcolor="#F3F3F3">
                          <td width="30%" height="22" align="right"><font face="Arial, Helvetica, sans-serif" size="1">Indicanos tu e-mail:</font></td>
                          <td height="22"> <input type="text" name="email" class="formulario" size="20" maxlength="120" value="<?php if (isset($_POST["email"])) echo $_POST["email"]; ?>"></td>
                        </tr>
                        <tr bgcolor="#F3F3F3">
                          <td height="30" colspan="2" align="center" valign="bottom"><input type="submit" name="enviar" value="Enviar"></td>
                        </tr>
                        </table>
                
				</form>
			
					<?php
					}
					?>
</div>
