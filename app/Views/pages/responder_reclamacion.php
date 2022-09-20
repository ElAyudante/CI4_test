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
<?php 
			// VALIDAR FORMULARIO
			$error ="";

			if (isset($_POST["enviar"])) {				  		
	  
				  if (empty($_POST["respuesta"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe completar la respuesta de la reclamaci�n.</font> \n <br>";
				  }				  			  
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {				
				
				$sql="UPDATE reclamaciones SET MiRespuesta='".$_POST["respuesta"]."',Respuesta='1' WHERE Id='".$_GET["id"]."'";				
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);			

				echo "<h1>Responder reclamaci�n</h1><p>La respuesta se ha enviado correctamente.</p>";
				
				
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
							
								$cuerpo.=$_POST["respuesta"];																					
							
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
					  
						$mail->Subject = "Respuesta a su queja";						
					 
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
			else {						
				$sql_r="SELECT * FROM reclamaciones WHERE Id='".$_GET["id"]."'";
				$con_r=mysql_query($sql_r) or die (mysql_error());
				if(mysql_num_rows($con_r)>0) {
					$rec=mysql_fetch_array($con_r);
					
	?>
    <h1>Responder reclamaci�n</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="responder_reclamacion" action="responder_reclamacion.php?id=<?php echo $_GET["id"]; ?>">
    <input name="email" type="hidden" value="<?php echo $rec["Email"] ?>" />
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" valign="top">Datos de la reclamaci�n</td>
        <td>
        <strong>Fecha:</strong><?php echo $rec["Fecha"]; ?><br />
        <strong>Nombre:</strong><?php echo $rec["Nombre"]." ".$rec["Apellidos"]; ?><br />
        <strong>Email:</strong><?php echo $rec["Email"]; ?><br />
        <strong>Tel�fono:</strong><?php echo $rec["Telefono"]; ?><br />
        <?php
			if(!empty($rec["Archivo"])&& file_exists("../reclamaciones/".$rec["Archivo"])) {
				echo"<strong>Archivo adjunto:</strong><a href='../reclamaciones/".$rec["Archivo"]."' target='_blanck'>Mostrar archivo adjunto</a><br/>";	
			}
		?>
        <strong>Comentarios:</strong><br /><?php echo utf8_decode($rec["Comentarios"]); ?>
        </td>
      </tr>
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada" valign="top">Respuesta*:&nbsp;&nbsp;</td>
        <td height="25"><textarea name="respuesta" id="respuesta"><?php if(isset($_POST["respuesta"])) echo $_POST["respuesta"]; else echo $rec["MiRespuesta"]; ?></textarea>
		<script>
		  generate_wysiwyg("respuesta");
		</script></td>
      </tr>       
      <tr>
        <td height="25" colspan="2" align="center"><input type="submit" name="enviar" value="Enviar respuesta"></td>
        </tr>
    </table>

	<!-- fin de tabla de contenido-->
	</form>	

    <?php
				}
				else {
					echo "<h1>Responder reclamaci�n</h1><p>No hay ninguna reclamaci�n con esas caracter�sticas</p>";	
				}
			
		} // fin if (isset($_POST['enviar']) && !$error) {	
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
