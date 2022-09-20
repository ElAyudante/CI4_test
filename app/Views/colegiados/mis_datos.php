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
	  
				  if (empty($_POST["direccion"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar la direcci�n del colegiado.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["localidad"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar la localidad del colegiado.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["cp"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el c�digo postal del colegiado.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["tlf"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el tel�fono del colegiado.</font> \n <br>";
				  } 
				 
	  
				  if (!eregi("^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+"."@[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\."."[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$", $_POST["mail"])){
					  $error .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe insertar un E-mail v�lido</font> \n <br>";
				  }			  
				  
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {	
			
				
				//CONSULTO LOS DATOS DEL COLEGIADO PARA MOSTRAR EL AVISO DE CAMBIOS
				$sql_col="SELECT * FROM colegiados WHERE Id='".$_SESSION['id_usuario']."'";
				$con_col=mysql_query($sql_col) or die (mysql_error());
				$mis_datos=mysql_fetch_array($con_col);
				
							 			
				//GUARDO LOS CAMBIOS
				$sql="UPDATE colegiados SET Direccion='".$_POST["direccion"]."', Localidad='".$_POST["localidad"]."', CP='".$_POST["cp"]."', Provincia='".$_POST["provincia"]."', Telefono='".str_replace(" ","",$_POST["tlf"])."', Movil='".str_replace(" ","",$_POST["movil"])."', Email='".$_POST["mail"]."'";
				
				$sql.=", TelefonoTrabajo='".str_replace(" ","",$_POST["tlftrabajo"])."', LugarTrabajo='".$_POST["lugartrabajo"]."',DireccionTrabajo='".$_POST["direcciontrabajo"]."', LocalidadTrabajo='".$_POST["localidadtrabajo"]."', AmbitoTrabajo='".$_POST["ambito"]."'";
				if(isset($_POST["publico"])) $sql.=", Publico='".$_POST["publico"]."'"; else $sql.=",Publico='0'";
				if(isset($_POST["privado"])) $sql.=", Privado='".$_POST["privado"]."'"; else $sql.=",Privado='0'";
				$sql.=",CuentaBancaria='".$_POST["cuenta"]."', AltaBolsaTrabajo='".$_POST["bolsa"]."', Usuario='".$_POST["usuario"]."', Pass='".$_POST["pass"]."', Publicidad='".$_POST["publi"]."' WHERE Id='".$_SESSION['id_usuario']."'";				
					
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);			

				echo"<h1>Actualizaci�n de datos</h1><p>Los cambios se han guardado correctamente.</p>";
				
				
				
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
							
								$cuerpo.="<h1>Aviso de sistema</h1>\n";
								$cuerpo.="El sistema de ventanilla �nica informa de que el colegiado ".$mis_datos["Nombre"]." ".$mis_datos["Apellidos"].", con n�mero de colegiado ".$mis_datos["Colegiado"]." ha realizado cambios en sus datos a trav�s de su �rea privada.";
								
								$cuerpo.="<p>Los datos que el colegiado ha modificado son:</p>\n";
								
								if($mis_datos["Direccion"]!=$_POST["direccion"]) $cuerpo.="Direcci�n:".$_POST["direccion"]."<br>\n";
								if($mis_datos["Localidad"]!=$_POST["localidad"]) $cuerpo.="Localidad:".$_POST["localidad"]."<br>\n";
								if($mis_datos["Provincia"]!=$_POST["provincia"]) $cuerpo.="Provincia:".$_POST["provincia"]."<br>\n";
								if($mis_datos["CP"]!=$_POST["cp"]) $cuerpo.="C�digo Postal:".$_POST["cp"]."<br>\n";
								if($mis_datos["Telefono"]!=$_POST["tlf"]) $cuerpo.="Tel�fono:".$_POST["tlf"]."<br>\n";
								if($mis_datos["Movil"]!=$_POST["movil"]) $cuerpo.="Movil:".$_POST["movil"]."<br>\n";
								if($mis_datos["Email"]!=$_POST["mail"]) $cuerpo.="Email:".$_POST["mail"]."<br>\n";
								if($mis_datos["CuentaBancaria"]!=$_POST["cuenta"]) $cuerpo.="Cuenta Bancaria:".$_POST["cuenta"]."<br>\n";
								if($mis_datos["TelefonoTrabajo"]!=$_POST["tlftrabajo"]) $cuerpo.="Tel�fono Trabajo:".$_POST["tlftrabajo"]."<br>\n";
								if($mis_datos["LugarTrabajo"]!=$_POST["lugartrabajo"]) $cuerpo.="Lugar Trabajo:".$_POST["lugartrabajo"]."<br>\n";
								if($mis_datos["DireccionTrabajo"]!=$_POST["direcciontrabajo"]) $cuerpo.="Direccion Trabajo:".$_POST["direcciontrabajo"]."<br>\n";
								if($mis_datos["LocalidadTrabajo"]!=$_POST["localidadtrabajo"]) $cuerpo.="Localidad Trabajo:".$_POST["localidadtrabajo"]."<br>\n";							
								
									
								
							
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
					  
					  $mail->AddAddress("colegio@logopedascantabria.org");
					
					  //Asignamos asunto y cuerpo del mensaje
					  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
					  //que se vea en negrita
					 //que se vea en negrita
					  
						$mail->Subject = "Cambio de datos de un colegiado";						
					 
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
				$sql_c="SELECT * FROM colegiados WHERE Id='".$_SESSION['id_usuario']."'";
				$con_c=mysql_query($sql_c) or die (mysql_error);
				if(mysql_num_rows($con_c)>0) {
					$colegiado=mysql_fetch_array($con_c);	
				}
				else {
					$error.="No existe nin�n colegiado con esos par�metros";	
				}
	?>
    <h1>Actualizaci�n de datos</h1>
    <?php if (isset($error)) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="mis_datos" action="mis_datos.php">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">      
        <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
        <tr>
        <td width="200" height="25" align="right" class="privada">Fecha de alta:&nbsp;&nbsp;</td>
        <td height="25"><input name="fechaalta" type="text" maxlength="100" size="25" value="<?php echo $colegiado["FechaAlta"]; ?>" disabled="disabled"></td>
      </tr>
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Nombre:&nbsp;&nbsp;</td>
        <td height="25"><input name="nombre" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; else echo $colegiado["Nombre"]; ?>" disabled="disabled"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Apellidos: &nbsp;</td>
        <td height="25"><input name="apellidos" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["apellidos"])) echo $_POST["apellidos"]; else echo $colegiado["Apellidos"]; ?>" disabled="disabled"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">NIF/DNI/CIF: &nbsp;</td>
        <td height="25">
        <?php 
			$cad_nif=explode("/",$colegiado["CaducidadCarnet"]);
		?>
        <input name="nif" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nif"])) echo $_POST["nif"]; else echo $colegiado["NIF"]; ?>"  disabled="disabled"> 
        </td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Direcci�n: &nbsp;</td>
        <td height="25"><input name="direccion" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["direccion"])) echo $_POST["direccion"]; else echo $colegiado["Direccion"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Localidad: &nbsp;</td>
        <td height="25"><input name="localidad" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["localidad"])) echo $_POST["localidad"]; else echo $colegiado["Localidad"]; ?>">
        &nbsp;&nbsp;&nbsp; C�digo Postal:
        <input name="cp" type="text" size="5" maxlength="5" value="<?php if(isset($_POST["cp"])) echo $_POST["cp"]; else echo $colegiado["CP"]; ?>" /></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Provincia: &nbsp;</td>
        <td height="25">
        <select name="provincia" tabindex="1">
         <option value="0" >Seleccione la provincia</option>
         <option value="Alava" <?php if($colegiado["Provincia"]=="Alava") echo "selected";?>>Alava</option>
         <option value="Albacete" <?php if($colegiado["Provincia"]=="Albacete") echo "selected";?>>Albacete</option>
         <option value="Alicante" <?php if($colegiado["Provincia"]=="Alicante") echo "selected";?>>Alicante</option>
         <option value="Almer�a" <?php if($colegiado["Provincia"]=="Almer�a") echo "selected";?>>Almer�a</option>
         <option value="Asturias" <?php if($colegiado["Provincia"]=="Asturias") echo "selected";?>>Asturias</option>
         <option value="Avila" <?php if($colegiado["Provincia"]=="Avila") echo "selected";?>>Avila</option>
         <option value="Badajoz" <?php if($colegiado["Provincia"]=="Badajoz") echo "selected";?>>Badajoz</option>
         <option value="Balears (Illes)" <?php if($colegiado["Provincia"]=="Balears (Illes)") echo "selected";?>>Balears (Illes)</option>
         <option value="Barcelona" <?php if($colegiado["Provincia"]=="Barcelona") echo "selected";?>>Barcelona</option>
         <option value="Burgos" <?php if($colegiado["Provincia"]=="Burgos") echo "selected";?>>Burgos</option>
         <option value="C�ceres" <?php if($colegiado["Provincia"]=="C�ceres") echo "selected";?>>C�ceres</option>
         <option value="C�diz" <?php if($colegiado["Provincia"]=="C�diz") echo "selected";?>>C�diz</option>
          <option value="C�diz" <?php if($colegiado["Provincia"]=="Canarias") echo "selected";?>>Canarias</option>
         <option value="Cantabria" <?php if($colegiado["Provincia"]=="Cantabria") echo "selected";?>>Cantabria</option>
         <option value="Castell�n" <?php if($colegiado["Provincia"]=="Castell�n") echo "selected";?>>Castell�n</option>
         <option value="Ciudad Real" <?php if($colegiado["Provincia"]=="Ciudad Real") echo "selected";?>>Ciudad Real</option>
         <option value="C�rdoba" <?php if($colegiado["Provincia"]=="C�rdoba") echo "selected";?>>C�rdoba</option>
         <option value="Coru�a (A)" <?php if($colegiado["Provincia"]=="Coru�a (A)") echo "selected";?>>Coru�a (A)</option>
         <option value="Cuenca" <?php if($colegiado["Provincia"]=="Cuenca") echo "selected";?>>Cuenca</option>
         <option value="Girona" <?php if($colegiado["Provincia"]=="Girona") echo "selected";?>>Girona</option>
         <option value="Granada" <?php if($colegiado["Provincia"]=="Granada") echo "selected";?>>Granada</option>
         <option value="Guadalajara" <?php if($colegiado["Provincia"]=="Guadalajara") echo "selected";?>>Guadalajara</option>
         <option value="Guip�zcoa" <?php if($colegiado["Provincia"]=="Guip�zcoa") echo "selected";?>>Guip�zcoa</option>
         <option value="Huelva" <?php if($colegiado["Provincia"]=="Huelva") echo "selected";?>>Huelva</option>
         <option value="Huesca" <?php if($colegiado["Provincia"]=="Huesca") echo "selected";?>>Huesca</option>
         <option value="Ja�n" <?php if($colegiado["Provincia"]=="Ja�n") echo "selected";?>>Ja�n</option>
         <option value="Le�n" <?php if($colegiado["Provincia"]=="Le�n") echo "selected";?>>Le�n</option>
         <option value="Lleida" <?php if($colegiado["Provincia"]=="Lleida") echo "selected";?>>Lleida</option>
         <option value="Lugo" <?php if($colegiado["Provincia"]=="Lugo") echo "selected";?>>Lugo</option>
         <option value="Madrid" <?php if($colegiado["Provincia"]=="Madrid") echo "selected";?>>Madrid</option>
         <option value="M�laga" <?php if($colegiado["Provincia"]=="M�laga") echo "selected";?>>M�laga</option>
         <option value="Murcia" <?php if($colegiado["Provincia"]=="Murcia") echo "selected";?>>Murcia</option>
         <option value="Navarra" <?php if($colegiado["Provincia"]=="Navarra") echo "selected";?>>Navarra</option>
         <option value="Ourense" <?php if($colegiado["Provincia"]=="Ourense") echo "selected";?>>Ourense</option>
         <option value="Palencia" <?php if($colegiado["Provincia"]=="Palencia") echo "selected";?>>Palencia</option>
         <option value="Pontevedra" <?php if($colegiado["Provincia"]=="Pontevedra") echo "selected";?>>Pontevedra</option>
         <option value="Rioja (La)" <?php if($colegiado["Provincia"]=="Rioja (La)") echo "selected";?>>Rioja (La)</option>
         <option value="Salamanca" <?php if($colegiado["Provincia"]=="Salamanca") echo "selected";?>>Salamanca</option>
         <option value="Segovia" <?php if($colegiado["Provincia"]=="Segovia") echo "selected";?>>Segovia</option>
         <option value="Sevilla" <?php if($colegiado["Provincia"]=="Sevilla") echo "selected";?>>Sevilla</option>
         <option value="Soria" <?php if($colegiado["Provincia"]=="Soria") echo "selected";?>>Soria</option>
         <option value="Tarragona" <?php if($colegiado["Provincia"]=="Tarragona") echo "selected";?>>Tarragona</option>
         <option value="Teruel" <?php if($colegiado["Provincia"]=="Teruel") echo "selected";?>>Teruel</option>
         <option value="Toledo" <?php if($colegiado["Provincia"]=="Toledo") echo "selected";?>>Toledo</option>
         <option value="Valencia" <?php if($colegiado["Provincia"]=="Valencia") echo "selected";?>>Valencia</option>
         <option value="Valladolid" <?php if($colegiado["Provincia"]=="Valladolid") echo "selected";?>>Valladolid</option>
         <option value="Vizcaya" <?php if($colegiado["Provincia"]=="Vizcaya") echo "selected";?>>Vizcaya</option>
         <option value="Zamora" <?php if($colegiado["Provincia"]=="Zamora") echo "selected";?>>Zamora</option>
         <option value="Zaragoza" <?php if($colegiado["Provincia"]=="Zaragoza") echo "selected";?>>Zaragoza</option>
       </select>
        </td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Tel�fono: &nbsp;</td>
        <td height="25"><input name="tlf" type="text" maxlength="12" size="25" value="<?php if(isset($_POST["tlf"])) echo $_POST["tlf"]; else echo $colegiado["Telefono"]; ?>"></td>
      </tr> 
      <tr>
        <td height="25" align="right" class="privada">M�vil: &nbsp;</td>
        <td height="25"><input name="movil" type="text" maxlength="12" size="25" value="<?php if(isset($_POST["movil"])) echo $_POST["movil"]; else echo $colegiado["Movil"]; ?>"></td>
      </tr>        
      <tr>
        <td height="25" align="right" class="privada">Email: &nbsp;</td>
        <td height="25"><input name="mail" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"]; else echo $colegiado["Email"]; ?>"></td>
      </tr> 
      <tr>
        <td height="25" align="right" class="privada">Lugar de Nacimiento*: &nbsp;</td>
        <td height="25"><input name="nacimiento" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nacimiento"])) echo $_POST["nacimiento"]; else echo $colegiado["LugarNacimiento"]; ?>" disabled="disabled"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Fecha de nacimiento*: &nbsp;</td>
        <td height="25">
        <?php $corte_naci=explode("-",$colegiado["FechaNacimiento"]); ?>
        <input name="fnacimiento" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["fnacimiento"])) echo $_POST["fnacimiento"]; else echo $corte_naci[2]."-".$corte_naci[1]."-".$corte_naci[0]; ?>" disabled="disabled"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Cuenta Bancaria: &nbsp;</td>
        <td height="25"><input name="cuenta" type="text" maxlength="25" size="25" value="<?php if(isset($_POST["cuenta"])) echo $_POST["cuenta"]; else echo $colegiado["CuentaBancaria"]; ?>"></td>
      </tr>  
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Tel�fono de Trabajo: &nbsp;</td>
        <td height="25"><input name="tlftrabajo" type="text" maxlength="12" size="25" value="<?php if(isset($_POST["tlftrabajo"])) echo $_POST["tlftrabajo"]; else echo $colegiado["TelefonoTrabajo"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Lugar de trabajo: &nbsp;</td>
        <td height="25"><input name="lugartrabajo" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["lugartrabajo"])) echo $_POST["lugartrabajo"]; else echo $colegiado["LugarTrabajo"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Direcci�n Trabajo: &nbsp;</td>
        <td height="25"><input name="direcciontrabajo" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["direcciontrabajo"])) echo $_POST["direcciontrabajo"]; else echo $colegiado["DireccionTrabajo"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Localidad de Trabajo: &nbsp;</td>
        <td height="25"><input name="localidadtrabajo" type="text" maxlength="50" size="25" value="<?php if(isset($_POST["localidadtrabajo"])) echo $_POST["localidadtrabajo"]; else echo $colegiado["LocalidadTrabajo"]; ?>"></td>
      </tr>  
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>   
       <tr>
        <td width="200" height="25" align="right" class="privada">N� de colegiado:&nbsp;&nbsp;</td>
        <td height="25"><input name="ncolegiado" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["ncolegiado"])) echo $_POST["ncolegiado"]; else echo $colegiado["Colegiado"]; ?>" disabled="disabled">&nbsp;&nbsp;&nbsp;Caducidad
        <input name="mes" type="text" size="2" maxlength="2" value="<?php if(isset($_POST["mes"])) echo $_POST["mes"]; else echo $cad_nif[0]; ?>" disabled="disabled"/>/<input name="anio" type="text" size="4" maxlength="4" value="<?php if(isset($_POST["anio"])) echo $_POST["anio"]; else echo $cad_nif[1]; ?>" disabled="disabled"/> <span class="pequeno">P. ej. <strong>06/2012</strong></span></td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Titulaci�n:&nbsp;&nbsp;</td>
        <td height="25"><input name="titulacion" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["titulacion"])) echo $_POST["titulacion"]; else echo $colegiado["Titulacion"]; ?>" disabled="disabled"></td>
      </tr>    
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">�mbito de trabajo:&nbsp;&nbsp;</td>
        <td height="25"><input name="ambito" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["ambito"])) echo $_POST["ambito"]; else echo $colegiado["AmbitoTrabajo"]; ?>"></td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Sector de trabajo:&nbsp;&nbsp;</td>
        <td height="25"><input type="checkbox" name="publico" id="publico" value="1" <?php if(isset($_POST["publico"])|| $colegiado["Publico"]==1) echo 'checked="checked"'; ?> /> <label for="publico">P�blico</label>&nbsp;&nbsp;<input type="checkbox" name="privado" id="privado" value="1" <?php if(isset($_POST["privado"])|| $colegiado["Privado"]==1) echo 'checked="checked"'; ?>/> <label for="privado">Privado</label></td>
      </tr> 
      <tr>
            <td width="200" height="25" align="right" class="privada">Bolsa de Trabajo:&nbsp;&nbsp;</td>
            <td height="25" align="left"><input type="radio" name="bolsa" id="bolsasi" value="1" <?php if(isset($_POST["bolsa"]) && $_POST["bolsa"]==1) echo 'checked="checked"'; elseif($colegiado["AltaBolsaTrabajo"]==1) echo "checked=checked"; ?> /> <label for="bolsasi">Si</label> &nbsp;<input type="radio" name="bolsa" id="bolsano" value="0" <?php if(isset($_POST["bolsa"]) && $_POST["bolsa"]==0) echo 'checked="checked"'; elseif($colegiado["AltaBolsaTrabajo"]==0) echo "checked=checked"; ?>/> <label for="bolsano">No</label></td>
          </tr> 
       <tr>
         <td width="200">&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
      <tr>
       <td width="200" height="25" align="right" class="privada">Usuario:&nbsp;&nbsp;</td>
        <td><input name="usuario" type="text" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"]; else echo $colegiado["Usuario"]; ?>" size="25" maxlength="25" /></td>
      </tr> 
      <tr>
       <td width="200" height="25" align="right" class="privada">Contrase�a:&nbsp;&nbsp;</td>
        <td><input name="pass" type="password" value="<?php if(isset($_POST["pass"])) echo $_POST["pass"]; else echo $colegiado["Pass"]; ?>" size="25" maxlength="25" /></td>
      </tr> 
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada"><span class="pequeno">�Desea recibir publicidad?:</span>&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="publi" id="publisi" value="1" <?php if((isset($_POST["publi"]) && $_POST["publi"]==1) || $colegiado["Publicidad"]==1) echo 'checked="checked"'; ?>/> <label for="publisi">Si</label> &nbsp;<input type="radio" name="publi" id="publino" value="0" <?php if((isset($_POST["publi"]) && $_POST["publi"]==0) || $colegiado["Publicidad"]==0) echo 'checked="checked"'; ?>/> <label for="publino">No</label></td>
      </tr>
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td height="25" colspan="2" align="center"><input type="submit" name="enviar" value="Guardar cambios"></td>
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
