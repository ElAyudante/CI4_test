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
				  if (empty($_POST["asunto"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el asunto del mensaje.</font> \n <br>";
				  }
				  
				  if (empty($_POST["mensaje"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe escribir el mensaje que desea enviar</font> \n <br>";
				  }				  
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {								
				$sql_nombre="SELECT Nombre, Apellidos, Email FROM colegiados WHERE Id='".$_POST["colegiado"]."'";
				$con_nombre=mysql_query($sql_nombre);
				$nn=mysql_fetch_array($con_nombre);
				$destina=$nn["Nombre"]." ".$nn["Apellidos"].", ";
										
				
				$mensaje_final=$_POST["mensaje"]."<br>----------------------------------<br>".$_POST["txt_respuesta"];
				
				$num=proximo_registro ($bd_base,"mensajes");				
				$sql_men="INSERT INTO mensajes VALUES ('', '".$_POST["asunto"]."', '".$mensaje_final."', '".$destina."', '".date("Y-m-d H:i:s")."','')";
				$con_men=mysql_query($sql_men) or die (mysql_error());							
					
				$sql="INSERT INTO destinatarios_mensaje VALUES ('', '".$num."', '".$_POST["colegiado"]."', '0', '".date("Y-m-d H:i:s")."')";		
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);	
						
						
				/**********************************************/
				/**********************************************/
				/**********************************************/
				/**********************************************/
				/**********************************************/				
				
				
				$cuerpo='<p>El Colegio Profesional de Logopedas de Cantabria le ha respondido en su <a href="http://www.logopedascantabria.org/colegiados/">�rea Privada</a></p>';		
	
				$mensaje= $cuerpo; 
	
	
				// primero hay que incluir la clase phpmailer para poder instanciar
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
				  $mail->AddAddress($nn["Email"]);
				
				  //Asignamos asunto y cuerpo del mensaje
				  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
				  //que se vea en negrita
				  $mail->Subject = "El colegio de Logopedas te ha respondido en tu �rea Privada";
				  $mail->Body = $mensaje;
				
				  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
				  $mail->AltBody = "";
				  
				  //Indicams el fichero a adjuntar si el usuario seleccion uno en el formulario  	 
				 
				  if (@$_FILES["file"]["name"] !="") {
					$mail->AddAttachment($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
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
			  
				
				/**********************************************/
				/**********************************************/
				/**********************************************/
				/**********************************************/
				/**********************************************/					
				
				
				echo "<h1>Respuesta mensajes</h1><p>El/Los mesaje/es se ha/han procesado correctamente.</p>";

			}
			else {													
					
	?>
    <h1>Respuesta mensajes</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  
	
	// obtengo los datos del mensaje para mostrarlos en pantalla
	$sql_mensaje="SELECT respuestas.*,colegiados.Nombre, colegiados.Apellidos, colegiados.Id FROM respuestas, colegiados WHERE respuestas.Id='".$_GET["mensaje"]."' AND respuestas.relColegiado=colegiados.Id";
	$con_mensaje=mysql_query($sql_mensaje);			
	if(mysql_num_rows($con_mensaje)>0) $estado=mysql_fetch_array($con_mensaje);
	
	//obtengo el asunto del mensaje original
	$sql_mensaje1="SELECT Asunto, Mensaje FROM mensajes WHERE Id='".$estado["relMensaje"]."'";
	$con_mensaje1=mysql_query($sql_mensaje1);
	$mens=mysql_fetch_array($con_mensaje1);			
	
	?>
	<form method="post" name="enviar_mensajes" action="mensaje-respuesta.php?mensaje=<?php echo $_GET["mensaje"]; ?>">
	<table width="700" style="border:none; font-size:0.8em" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Asunto*:&nbsp;&nbsp;</td>
        <td height="25"><input name="asunto2" type="text" maxlength="255" size="50" value="Re: <?php echo $mens["Asunto"]; ?>" disabled="disabled">
        <input name="asunto" type="hidden" value="Re: <?php echo $mens["Asunto"]; ?>"> </td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" valign="top" class="privada">Mensaje*:&nbsp;&nbsp;</td>
        <td height="25"><textarea name="mensaje" rows="6" cols="40"><?php if(isset($_POST["mensaje"])) echo $_POST["mensaje"]; ?></textarea> </td>
      </tr> 
      <tr>
        <td colspan="2" height="25"><strong>Respuesta al mensaje:</strong><br />
        <?php echo $estado["Nombre"]." ".$estado["Apellidos"]."<br> \n"; ?>
        <p><?php echo "<i>".$estado["Mensaje"]."</i>"; ?></p>
        <input type="hidden" name="colegiado" value="<?php echo $estado["Id"];  ?>" />
        <input type="hidden" name="txt_respuesta" value="<?php echo $estado["Mensaje"];  ?>" />
        </td>
      </tr>
       <tr>       
      <tr>
        <td height="45" colspan="2" valign="bottom" align="center"><input type="submit" name="enviar" value="Enviar"></td>
        </tr>
    </table>

	<!-- fin de tabla de contenido-->
	</form>	

    <?php					
		} 
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
