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
	  
				  if (empty($_POST["nombre"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el nombre del evento.</font> \n <br>";
				  }				  
	  
				  if (empty($_POST["descripcion"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar una descripción para el evento</font> \n <br>";
				  }			  
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {
				
				//guardo el fichero si existe y le asigno un nombre
				if(!empty($_FILES["archivo"]["name"])) {
					$dir="../eventos/";	
					//obtengo la extensi�n del archivo
					$extension=explode(".",$_FILES["archivo"]["name"]);
				  $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
				  $referencia = "";
				  for($i=0;$i<19;$i++) {
				  $referencia .= substr($str,rand(0,62),1);
				  }
				  $nombre_archivo=$referencia.".".$extension[1];
				  if(move_uploaded_file($_FILES["archivo"]['tmp_name'], $dir.$_FILES["archivo"]['name'])) {		
					chmod($dir.$_FILES["archivo"]["name"], 0777);  		
					rename( $dir.$_FILES["archivo"]["name"], $dir.$nombre_archivo);				
				  } 
				}
				
				$sql="INSERT INTO eventos VALUES ('','".$_POST["nombre"]."','".$_POST["descripcion"]."'";
				if(!empty($_FILES["archivo"]["name"])) $sql.=",'".$nombre_archivo."'"; else $sql.=",''";
				$sql.=",'".str_replace(",",".",$_POST["precio"])."', '".str_replace(",",".",$_POST["precioNoEjercientes"])."', '".str_replace(",",".",$_POST["precioAsociaciones"])."', '".str_replace(",",".",$_POST["precioNoColegiados"])."', '".@$_POST["activo"]."')";		
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);		
				
				
				
				
				/***********************************************************************/
				/***********************************************************************/
				/*********************ENVIO DE EMAIL A COLEGIADOS***********************/
				/***********************************************************************/
				/***********************************************************************/
				/***********************************************************************/
				if($_POST["activo"]==1) {
				$sql_al="SELECT Nombre, Apellidos, Email FROM colegiados WHERE Email NOT LIKE ''";
				// $sql_al="SELECT Alumno FROM relCursoAlumno WHERE Curso='$curso'";
				$con_al=mysql_query($sql_al) or die (mysql_error());
				if(mysql_num_rows($con_al)<1) { 
					echo "No existen colegiados. No se ha enviado ning�n email."; 
				}				
				else {						
						while($dat=mysql_fetch_array($con_al)) {				
							$destino[]=$dat["Email"];
						}
									
						
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
										
											$cuerpo.='<p>Estimado/a colegiado <br>
											Le enviamos este email para informarle de que hemos dado de alta un nuevo evento.</p>';
										
										
										$cuerpo.='<p><strong>NUEVOS EVENTOS</strong></p>			
										
										
										<p><strong>EVENTO: </strong> '.$_POST["nombre"].'</p>
										<p><strong>Descripción: </strong> '.$_POST["descripcion"].'</p>';																							
										
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
							
							
				
			
				$mensaje= $cuerpo; 
			
				// primero hay que incluir la clase phpmailer para poder instanciar
				//un objeto de la misma
				require_once "phpmailer/class.phpmailer.php";			
			 
				for($j=0;$j<=count($destino);$j++) { 
				
				
						
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
				  $mail->FromName = "COLEGIO PROFESIONAL DE LOGOPEDAS DE CANTABRIA";
				
				  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
				  //una cuenta gratuita, por tanto lo pongo a 120  
				  $mail->Timeout=200;
				
				  //Indicamos cual es la direccin de destino del correo
				  $mail->AddAddress(@$destino[$j]);
				
				  //Asignamos asunto y cuerpo del mensaje
				  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
				  //que se vea en negrita
				  $mail->Subject = "Nuevo evento";
				  $mail->Body = $mensaje;
				
				  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
				  $mail->AltBody = "";
				  
				  //Indicams el fichero a adjuntar si el usuario seleccion uno en el formulario  	 
				 
				 if(!empty($_FILES["archivo"]["name"])){
					$mail->AddAttachment($dir.$nombre_archivo,$nombre_archivo);
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
			  
			  }				
			  
		}				
				
				
				/***********************************************************************/
				/***********************************************************************/
				/***********************************************************************/
				/***********************************************************************/
				/***********************************************************************/
				/***********************************************************************/
				
				}					

				echo "<h1>Alta de eventos</h1><p>El evento ha sido dado de alta correctamente.</p>";

			}
			else {						
				
					
	?>
    <h1>Alta de eventos</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="alta_evento" action="alta_evento.php" enctype="multipart/form-data">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="320" height="35" align="right" class="privada">Nombre del Evento*:&nbsp;&nbsp;</td>
        <td height="25"><input name="nombre" type="text" maxlength="200" size="55" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; ?>"></td>
      </tr> 
      <tr>
        <td width="320" height="35" align="right" class="privada" valign="top">Descripción*:&nbsp;&nbsp;</td>
        <td height="25"><textarea name="descripcion" style="width:365px; height:65px"><?php if(isset($_POST["descripcion"])) echo $_POST["descripcion"]; ?></textarea></td>
      </tr>   
      <tr>
        <td width="320" height="40" align="right" class="privada">Archivo Adjunto:&nbsp;&nbsp;</td>
        <td height="25"><input type="file" name="archivo" /></td>
      </tr>  
      <tr>
        <td width="320" height="35" align="right" class="privada">Colegiados ejercientes*:&nbsp;&nbsp;</td>
        <td height="25"><input name="precio" type="text" size="8" maxlength="8" value="<?php if(isset($_POST["precio"])) echo $_POST["precio"]; ?>"/> �</td>
      </tr> 
      <tr>
        <td width="320" height="35" align="right" class="privada">No ejercientes y otros colegios*:&nbsp;&nbsp;</td>
        <td height="25"><input name="precioNoEjercientes" type="text" size="8" maxlength="8" value="<?php if(isset($_POST["precioNoEjercientes"])) echo $_POST["precioNoEjercientes"]; ?>"/> �</td>
      </tr> 
      <tr>
        <td width="320" height="35" align="right" class="privada">Alumnos logopedia*:&nbsp;&nbsp;</td>
        <td height="25"><input name="precioAsociaciones" type="text" size="8" maxlength="8" value="<?php if(isset($_POST["precioAsociaciones"])) echo $_POST["precioAsociaciones"]; ?>"/> �</td>
      </tr> 
      <tr>
        <td width="320" height="35" align="right" class="privada">Logopedas no colegiados*:&nbsp;&nbsp;</td>
        <td height="25"><input name="precioNoColegiados" type="text" size="8" maxlength="8" value="<?php if(isset($_POST["precioNoColegiados"])) echo $_POST["precioNoColegiados"]; ?>"/> �</td>
      </tr> 
      <tr>
        <td width="320" height="45" align="right" class="privada">Activo:&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="activo" id="activosi" value="1" <?php if((isset($_POST["activo"]) && $_POST["activo"]==1)) echo 'checked="checked"'; ?>/> <label for="activosi">Si</label> &nbsp;<input type="radio" name="activo" id="activono" value="0" <?php if((isset($_POST["activo"]) && $_POST["activo"]==0)) echo 'checked="checked"'; ?>/> <label for="activono">No</label></td>
      </tr>    
      <tr>
        <td height="25" colspan="2" align="center"><input type="submit" name="enviar" value="Guardar Evento"></td>
        </tr>
    </table>

	<!-- fin de tabla de contenido-->
	</form>	

    <?php
			
		} // fin if (isset($_POST['enviar']) && !$error) {	
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
