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

				  $SQL_1="SELECT Id FROM colegiados WHERE NIF LIKE '".str_replace(" ","",$_POST["nif"])."'";
				  $res_SQL_1=mysql_query($SQL_1) or die (mysql_error());
				  if (mysql_num_rows($res_SQL_1) > 0) {
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Este colegiado ya está registrado</font> \n <br>";
				  }				
	  
				   if (empty($_POST["date"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar la fecha de alta para este colegiado.</font> \n <br>";
				  }
				  
				  if (empty($_POST["nombre"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el nombre del colegiado.</font> \n <br>";
				  }
	  
				  if (empty($_POST["apellidos"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar los apellidos del colegiado.</font> \n <br>";
				  }
	  
				  if (empty($_POST["mes"]) || empty($_POST["anio"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe completar la fecha de cadicidad del carnet de  colegiado.</font> \n <br>";
				  }			 	 
	  
				  if (empty($_POST["direccion"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar la dirección del colegiado.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["localidad"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar la localidad del colegiado.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["cp"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el código postal del colegiado.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["tlf"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el teléfono del colegiado.</font> \n <br>";
				  }
				  
				  if (empty($_POST["nacimiento"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el lugar de nacimiento del colegiado.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["fnacimiento"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar fecha de nacimiento del colegiado.</font> \n <br>";
				  }	
				  
				  $corte_fecha=explode("-",$_POST["fnacimiento"]);	
				  if (!@checkdate ($corte_fecha[1], $corte_fecha[0], $corte_fecha[2])){
					$error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>La fecha de nacimiento no es correcta.</font> \n <br>";
				  }
	  
				  if (!eregi("^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+"."@[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\."."[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$", $_POST["mail"])){
					  $error .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe insertar un E-mail válido</font> \n <br>";
				  }	 
				  
				  if (empty($_POST["ncolegiado"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el número de colegiado.</font> \n <br>";
				  }	
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {
				
				// obtengo el proximo registro de colegiados
				$num_p=proximo_registro ($bd_base,"colegiados");
				
				$fecha_bruta=$_POST["date"];
				$fecha_corte=explode("-",$_POST["date"]);
				
				$sql="INSERT INTO colegiados VALUES ('', '".$_POST["ncolegiado"]."', '".$fecha_corte[2]."-".$fecha_corte[1]."-".$fecha_corte[0]."', '".$_POST["mes"]."/".$_POST["anio"]."', '".$_POST["nombre"]."', '".$_POST["apellidos"]."', '".$_POST["nif"]."', '".$_POST["nacimiento"]."'";
				
				
				$corte_fecha=explode("-",$_POST["fnacimiento"]);																																																																									                $sql.=", '".$corte_fecha[2]."-".$corte_fecha[1]."-".$corte_fecha[0]."'";
																																																															                
				$sql .=", '".$_POST["direccion"]."', '".$_POST["localidad"]."', '".$_POST["cp"]."', '".$_POST["provincia"]."', '".$_POST["comunidad"]."', '".str_replace(" ","",$_POST["tlf"])."', '".str_replace(" ","",$_POST["movil"])."', '".$_POST["mail"]."', '".$_POST["ejerciente"]."', '".$_POST["bolsa"]."'";
				$sql.=",'0'";
				$sql.=", '".str_replace(" ","",$_POST["tlftrabajo"])."', '".$_POST["lugartrabajo"]."','".$_POST["direcciontrabajo"]."', '".$_POST["localidadtrabajo"]."', '".$_POST["ambito"]."'";
				if(isset($_POST["publico"])) $sql.=", '".$_POST["publico"]."'"; else $sql.=",'0'";
				if(isset($_POST["privado"])) $sql.=", '".$_POST["privado"]."'"; else $sql.=",'0'";
				$sql.=", '".$_POST["habilitacion"]."', '', ''";
				if(isset($_POST["trasladado"])) $sql.=", '".$_POST["trasladado"]."'"; else $sql.=",'0'";
				$sql.=", '".$_POST["colegioorigen"]."', '".$_POST["norigen"]."', '".$_POST["especialidad"]."', '".$_POST["cuenta"]."', '".$_POST["observaciones"]."', '".$_POST["titulacion_oficial"]."','".$_POST["nif"]."','".$_POST["nif"]."', '".$_POST["publi"]."', '".$_POST["colegiadoactual"]."','')";	
				
				
				$consulta=mysql_query($sql) or die(mysql_error());	/*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/		
				
				
				
				
				// SI SE LE ASIGNA UNA CUOTA SE SUMA AL COLEGIADO A LA COUTA A COBRAR
				if($_POST["cuota"]!=0) {
					// saco el importe de la cuota seleccionada
					$sql_cuot="SELECT * FROM cuotas WHERE Id='".$_POST["cuota"]."'";
					$con_cuot=mysql_query($sql_cuot);
					$importes_cuotas=mysql_fetch_array($con_cuot);
					
					if($_POST["ejerciente"]==1) $imp_couta=$importes_cuotas["Ordinaria"];
					elseif($_POST["ejerciente"]==3) $imp_couta=$importes_cuotas["Estudiantes"];
					elseif($_POST["ejerciente"]==2) $imp_couta=$importes_cuotas["Jubilados"];
					else $imp_couta=$importes_cuotas["NoEjerciente"];
					
					$sql_cobrado="INSERT INTO estadocobrocuotas VALUES ('', '".$num_p."', '".$_POST["cuota"]."','1','".$imp_couta."');";	
					$con_cobrado=mysql_query($sql_cobrado) or die (mysql_error());	
				}
				
				// SI SE LE ASIGNA UNA CUOTA DE INSCRIPCION SE SUMA AL COLEGIADO A LA COUTA A COBRAR
				if($_POST["inscripcion"]!=0) {
					// saco el importe de la cuota seleccionada
					$sql_cuot="SELECT * FROM cuotas WHERE Id='1'";
					$con_cuot=mysql_query($sql_cuot);
					$importes_cuotas=mysql_fetch_array($con_cuot);
					
					$imp_couta=$importes_cuotas["Inscripcion"];
					
					$sql_cobrado="INSERT INTO estadocobrocuotas VALUES ('', '".$num_p."', '0','1','".$imp_couta."');";	
					$con_cobrado=mysql_query($sql_cobrado) or die (mysql_error());	
				}
				
				

				echo"<h1>Alta de usuarios</h1><p>El colegiado ha sido dado de alta correctamente.<br> <a href='alta_colegiado.php'>Dar de alta otro colegiado</a></p>";
				
				
				
				//SI QUIERE ENVIAR EL EMAIL DE BIENVENIDA
				if($_POST["bienvenida"]==1) {
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
							
								$cuerpo.='<p>Estimado/a '.$_POST["nombre"].' '.$_POST["apellidos"].' </p>
								<p>Ya se encuentra registrado en el sistema del Colegio Profesional de Logopedas de Cantabria.</p>
								<p>A partir de este momento ya puede acceder al �rea privada del Colegio, donde podr� acceder a documentaci�n e informaci�n de su inter�s</p>';
							
							
							$cuerpo.='<p><strong>DATOS DE ACCESO</strong></p>			
							
							
							<p><strong>Usuario: </strong> '.str_replace("","",$_POST["nif"]).'<br>
							<strong>Contrase�a: </strong> '.str_replace("","",$_POST["nif"]).'</p>';																							
							
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
					  
					  $mail->AddAddress($_POST["mail"]);
					
					  //Asignamos asunto y cuerpo del mensaje
					  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
					  //que se vea en negrita
					 //que se vea en negrita
					  
						$mail->Subject = "Has sido dado de alta";						
					 
					  $mail->Body = $cuerpo;	
					  $file="";				  
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
				}
				// FIN EMAIL DE BIENVENIDA
				
				

			}
			else {																					    		
	?>
    <h1>Alta de Colegiados</h1>
    <?php if (isset($error)) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="alta_colegiados" action="alta_colegiado.php">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">      
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td width="200" height="25" align="right" class="privada">Fecha Alta*:&nbsp;&nbsp;</td>
        <td> <INPUT name=date value="<?php if (isset($_GET["date"])) echo $_GET["date"]; elseif(isset($_POST["date"])) echo $_POST["date"]; ?>"> <A href="javascript:show_calendar2('document.alta_colegiados.date', document.alta_colegiados.date.value);"><img alt="Haga click aqu� para seleccionar una fecha" src="images/cal.gif" width="31" height="28" border="0" align="absmiddle"></A></td>
      </tr>
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Nombre*:&nbsp;&nbsp;</td>
        <td height="25"><input name="nombre" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Apellidos*: &nbsp;</td>
        <td height="25"><input name="apellidos" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["apellidos"])) echo $_POST["apellidos"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">NIF/DNI/CIF*: &nbsp;</td>
        <td height="25"><input name="nif" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nif"])) echo $_POST["nif"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Dirección*: &nbsp;</td>
        <td height="25"><input name="direccion" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["direccion"])) echo $_POST["direccion"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Localidad*: &nbsp;</td>
        <td height="25"><input name="localidad" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["localidad"])) echo $_POST["localidad"] ?>">
        &nbsp;&nbsp;&nbsp; Código Posta<span class="privada">l*</span>:
        <input name="cp" type="text" size="5" maxlength="5" value="<?php if(isset($_POST["cp"])) echo $_POST["cp"] ?>" /></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Provincia*: &nbsp;</td>
        <td height="25">
        <select name="provincia" tabindex="1">
         <option value="0" >Seleccione la provincia</option>
         <option value="Alava" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Alava") echo "selected";?>>Alava</option>
         <option value="Albacete" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Albacete") echo "selected";?>>Albacete</option>
         <option value="Alicante" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Alicante") echo "selected";?>>Alicante</option>
         <option value="Almer�a" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Almer�a") echo "selected";?>>Almería</option>
         <option value="Asturias" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Asturias") echo "selected";?>>Asturias</option>
         <option value="Avila" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Avila") echo "selected";?>>Avila</option>
         <option value="Badajoz" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Badajoz") echo "selected";?>>Badajoz</option>
         <option value="Balears (Illes)" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Balears (Illes)") echo "selected";?>>Balears (Illes)</option>
         <option value="Barcelona" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Barcelona") echo "selected";?>>Barcelona</option>
         <option value="Burgos" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Burgos") echo "selected";?>>Burgos</option>
         <option value="C�ceres" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="C�ceres") echo "selected";?>>Cáceres</option>
         <option value="C�diz" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="C�diz") echo "selected";?>>Cádiz</option>
          <option value="C�diz" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Canarias") echo "selected";?>>Canarias</option>
         <option value="Cantabria" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Cantabria") echo "selected";?>>Cantabria</option>
         <option value="Castell�n" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Castell�n") echo "selected";?>>Castellón</option>
         <option value="Ciudad Real" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Ciudad Real") echo "selected";?>>Ciudad Real</option>
         <option value="C�rdoba" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="C�rdoba") echo "selected";?>>Córdoba</option>
         <option value="Coru�a (A)" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Coru�a (A)") echo "selected";?>>Coruña (A)</option>
         <option value="Cuenca" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Cuenca") echo "selected";?>>Cuenca</option>
         <option value="Girona" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Girona") echo "selected";?>>Girona</option>
         <option value="Granada" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Granada") echo "selected";?>>Granada</option>
         <option value="Guadalajara" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Guadalajara") echo "selected";?>>Guadalajara</option>
         <option value="Guip�zcoa" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Guip�zcoa") echo "selected";?>>Guipúzcoa</option>
         <option value="Huelva" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Huelva") echo "selected";?>>Huelva</option>
         <option value="Huesca" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Huesca") echo "selected";?>>Huesca</option>
         <option value="Ja�n" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Ja�n") echo "selected";?>>Jaén</option>
         <option value="Le�n" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Le�n") echo "selected";?>>León</option>
         <option value="Lleida" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Lleida") echo "selected";?>>Lleida</option>
         <option value="Lugo" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Lugo") echo "selected";?>>Lugo</option>
         <option value="Madrid" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Madrid") echo "selected";?>>Madrid</option>
         <option value="M�laga" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="M�laga") echo "selected";?>>Málaga</option>
         <option value="Murcia" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Murcia") echo "selected";?>>Murcia</option>
         <option value="Navarra" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Navarra") echo "selected";?>>Navarra</option>
         <option value="Ourense" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Ourense") echo "selected";?>>Ourense</option>
         <option value="Palencia" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Palencia") echo "selected";?>>Palencia</option>
         <option value="Pontevedra" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Pontevedra") echo "selected";?>>Pontevedra</option>
         <option value="Rioja (La)" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Rioja (La)") echo "selected";?>>Rioja (La)</option>
         <option value="Salamanca" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Salamanca") echo "selected";?>>Salamanca</option>
         <option value="Segovia" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Segovia") echo "selected";?>>Segovia</option>
         <option value="Sevilla" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Sevilla") echo "selected";?>>
           Sevilla</option>
         <option value="Soria" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Soria") echo "selected";?>>Soria</option>
         <option value="Tarragona" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Tarragona") echo "selected";?>>Tarragona</option>
         <option value="Teruel" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Teruel") echo "selected";?>>Teruel</option>
         <option value="Toledo" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Toledo") echo "selected";?>>Toledo</option>
         <option value="Valencia" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Valencia") echo "selected";?>>Valencia</option>
         <option value="Valladolid" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Valladolid") echo "selected";?>>Valladolid</option>
         <option value="Vizcaya" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Vizcaya") echo "selected";?>>Vizcaya</option>
         <option value="Zamora" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Zamora") echo "selected";?>>Zamora</option>
         <option value="Zaragoza" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Zaragoza") echo "selected";?>>Zaragoza</option>
       </select>
        </td>
      </tr>
       <tr>
        <td height="25" align="right" class="privada">Comunidad*: &nbsp;</td>
        <td height="25">
        <select name="comunidad" tabindex="1">
         <option value="0" >Comunidad Autónoma</option>
         <option value="Andalucia" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Andalucia") echo "selected";?>>Andalucia</option>
         <option value="Aragon" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Aragon") echo "selected";?>>Aragon</option>
         <option value="Asturias" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Asturias") echo "selected";?>>Asturias</option>
         <option value="Baleares" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Baleares") echo "selected";?>>Baleares</option>  
         <option value="Canarias" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Canarias") echo "selected";?>>Canarias</option>
         <option value="Cantabria" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Cantabria") echo "selected";?>>Cantabria</option>
         <option value="Castilla La Mancha" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Castilla La Mancha") echo "selected";?>>Castilla La Mancha</option>  
         <option value="Castilla Leon" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Castilla Leon") echo "selected";?>>Castilla Leon</option>
         <option value="Catalu�a" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Catalu�a") echo "selected";?>>Cataluña</option>
         <option value="Ceuta" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Ceuta") echo "selected";?>>Ceuta</option>
         <option value="Comunidad Valenciana" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Comunidad Valenciana") echo "selected";?>>Comunidad Valenciana</option>
         <option value="Extremadura" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Extremadura") echo "selected";?>>Extremadura</option>
         <option value="Galicia" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Galicia") echo "selected";?>>Galicia</option>
         <option value="La Rioja" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="La Rioja") echo "selected";?>>La Rioja</option>
         <option value="Madrid" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Madrid") echo "selected";?>>Madrid</option> 
         <option value="Melilla" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Melilla") echo "selected";?>>Melilla</option>
         <option value="Navarra" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Navarra") echo "selected";?>>Navarra</option> 
         <option value="Pais Vasco" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Pais Vasco") echo "selected";?>>Pais Vasco</option>
         <option value="Region de Murcia" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Region de Murcia") echo "selected";?>>Region de Murcia</option>         
       </select>
        </td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Teléfono*: &nbsp;</td>
        <td height="25"><input name="tlf" type="text" maxlength="12" size="25" value="<?php if(isset($_POST["tlf"])) echo $_POST["tlf"] ?>"></td>
      </tr> 
      <tr>
        <td height="25" align="right" class="privada">Móvil: &nbsp;</td>
        <td height="25"><input name="movil" type="text" maxlength="12" size="25" value="<?php if(isset($_POST["movil"])) echo $_POST["movil"] ?>"></td>
      </tr>        
      <tr>
        <td height="25" align="right" class="privada">Email: &nbsp;</td>
        <td height="25"><input name="mail" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"] ?>"></td>
      </tr> 
      <tr>
        <td height="25" align="right" class="privada">Lugar de Nacimiento*: &nbsp;</td>
        <td height="25"><input name="nacimiento" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nacimiento"])) echo $_POST["nacimiento"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Fecha de nacimiento*: &nbsp;</td>
        <td height="25"><input name="fnacimiento" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["fnacimiento"])) echo $_POST["fnacimiento"] ?>"> <span class="pequeno">P. Ej. 23-05-1977</span></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Cuenta Bancaria: &nbsp;</td>
        <td height="25"><input name="cuenta" type="text" maxlength="25" size="25" value="<?php if(isset($_POST["cuenta"])) echo $_POST["cuenta"] ?>"></td>
      </tr>  
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Teléfono de Trabajo: &nbsp;</td>
        <td height="25"><input name="tlftrabajo" type="text" maxlength="12" size="25" value="<?php if(isset($_POST["tlftrabajo"])) echo $_POST["tlftrabajo"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Lugar de trabajo: &nbsp;</td>
        <td height="25"><input name="lugartrabajo" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["lugartrabajo"])) echo $_POST["lugartrabajo"] ?>"></td>
      </tr>
       <tr>
        <td height="25" align="right" class="privada">Dirección Trabajo: &nbsp;</td>
        <td height="25"><input name="direcciontrabajo" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["direcciontrabajo"])) echo $_POST["direcciontrabajo"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Localidad de Trabajo: &nbsp;</td>
        <td height="25"><input name="localidadtrabajo" type="text" maxlength="50" size="25" value="<?php if(isset($_POST["localidadtrabajo"])) echo $_POST["localidadtrabajo"] ?>"></td>
      </tr>  
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>   
       <tr>
        <td width="200" height="25" align="right" class="privada">Nº de colegiado:&nbsp;&nbsp;</td>
        <td height="25"><input name="ncolegiado" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["ncolegiado"])) echo $_POST["ncolegiado"]; ?>"> &nbsp;&nbsp;&nbsp;Caducidad<span class="privada">*</span>
        <input name="mes" type="text" size="2" maxlength="2" value="<?php if(isset($_POST["mes"])) echo $_POST["mes"] ?>" />/<input name="anio" type="text" size="4" maxlength="4" value="<?php if(isset($_POST["anio"])) echo $_POST["anio"] ?>" /> <span class="pequeno">P. ej. <strong>06/2012</strong></span></td>
      </tr>    
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Tipo Colegiado:&nbsp;&nbsp;</td>
        <td height="25">
        <select name="ejerciente">
        	<option value="1" <?php if(isset($_POST["ejerciente"]) && $_POST["ejerciente"]==1) echo 'selected"'; ?>>Ejerciente</option>
            <option value="0"  <?php if(isset($_POST["ejerciente"]) && $_POST["ejerciente"]==0) echo 'selected"'; ?>>No Ejerciente</option>
            <option value="2"  <?php if(isset($_POST["ejerciente"]) && $_POST["ejerciente"]==2) echo 'selected"'; ?>>Jubilado</option>
            <option value="3"  <?php if(isset($_POST["ejerciente"]) && $_POST["ejerciente"]==3) echo 'selected"'; ?>>Estudiante</option>
        </select>
       </td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Titulacion:&nbsp;&nbsp;</td>
        <td height="25"><input name="titulacion_oficial" type="text" maxlength="255" size="25" value="<?php if(isset($_POST["titulacion_oficial"])) echo $_POST["titulacion_oficial"]; ?>"></td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Especialidad:&nbsp;&nbsp;</td>
        <td height="25"><input name="especialidad" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["especialidad"])) echo $_POST["especialidad"]; ?>"></td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Ámbito de trabajo:&nbsp;&nbsp;</td>
        <td height="25"><input name="ambito" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["ambito"])) echo $_POST["ambito"]; ?>"></td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Sector de trabajo:&nbsp;&nbsp;</td>
        <td height="25"><input type="checkbox" name="publico" id="publico" value="1" <?php if(isset($_POST["publico"])) echo 'checked="checked"'; ?> /> <label for="publico">P�blico</label>&nbsp;&nbsp;<input type="checkbox" name="privado" id="privado" value="1" <?php if(isset($_POST["privado"])) echo 'checked="checked"'; ?>/> <label for="privado">Privado</label></td>
      </tr>   
      <tr>
        <td width="200" height="25" align="right" class="privada">Solicita habilitacion:&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="habilitacion" id="habilitacionsi" value="1" checked="checked" /> <label for="habilitacionsi">Si</label> &nbsp;<input type="radio" name="habilitacion" id="habilitacionno" value="0" <?php if(isset($_POST["habilitacion"]) && $_POST["habilitacion"]==0) echo 'checked="checked"'; ?>/> <label for="habilitacionno">No</label></td>
      </tr>        
      <tr>
        <td width="200" height="25" align="right" class="privada">Diplomado Logopedia:&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="diplomatura" id="diplomaturasi" value="1" checked="checked" /> <label for="diplomaturasi">Si</label> &nbsp;<input type="radio" name="diplomatura" id="diplomaturano" value="0" <?php if(isset($_POST["diplomatura"]) && $_POST["diplomatura"]==0) echo 'checked="checked"'; ?>/> <label for="diplomaturano">No</label></td>
      </tr>       
      <tr>
        <td width="200" height="25" align="right" class="privada">Bolsa de Trabajo:&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="bolsa" id="bolsasi" value="1" checked="checked" /> <label for="bolsasi">Si</label> &nbsp;<input type="radio" name="bolsa" id="bolsano" value="0" <?php if(isset($_POST["bolsa"]) && $_POST["bolsa"]==0) echo 'checked="checked"'; ?>/> <label for="bolsano">No</label></td>
      </tr>       
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
        <tr>
        <td width="200" height="25" align="right" class="privada">Trasladado:&nbsp;&nbsp;</td>
        <td height="25"><input type="checkbox" name="trasladado" id="trasladado" value="1" <?php if(isset($_POST["trasladado"])) echo 'checked="checked" '; ?>/></td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Colegio de origen:&nbsp;&nbsp;</td>
        <td height="25"><input name="colegioorigen" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["colegioorigen"])) echo $_POST["colegioorigen"]; ?>"></td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Nº colegiado origen:&nbsp;&nbsp;</td>
        <td height="25"><input name="norigen" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["norigen"])) echo $_POST["norigen"]; ?>"></td>
      </tr>
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada" valign="top">Observaciones:&nbsp;&nbsp;</td>
        <td><textarea name="observaciones" style="width:250px; height:60px"><?php if(isset($_POST["observaciones"])) echo $_POST["observaciones"]; ?></textarea></td>
      </tr> 
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
       <tr>
        <td width="200" height="25" align="right" class="privada" valign="top">Asignar 1ª couta:&nbsp;&nbsp;</td>
        <td>
        <?php
        $concat="SELECT * FROM cobroscuotas ORDER BY Id DESC";
		$concat=mysql_query($concat) or die (mysql_error());
		if (mysql_num_rows($concat)>0) {
			echo '<select name="cuota">
						<option value="0">Ninguna</option>';
			while($cat=mysql_fetch_array($concat)) {
				echo "<option value='".$cat["Id"]."' ";
				if(isset($_GET["c"])) if($cat["Id"]==$_GET["c"]) echo "selected";
				echo ">".$cat["Descripcion"]."</option> \n";
			}
			echo '</select>';
		}
		?>
        
        </td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada" valign="top">Paga inscripción:&nbsp;&nbsp;</td>
        <td>
        <input type="radio" name="inscripcion" id="inscripcionsi" value="1" <?php if(isset($_POST["inscripcion"]) && $_POST["inscripcion"]==1) echo 'checked="checked"'; ?>/> <label for="inscripcionsi">Si</label> &nbsp;<input type="radio" name="inscripcion" id="inscripcionno" value="0" <?php if((isset($_POST["inscripcion"]) && $_POST["inscripcion"]==0) || !isset($_POST["inscripcion"])) echo 'checked="checked"'; ?>/> <label for="inscripcionno">No</label>      
        </td>
      </tr> 
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada"><span class="pequeno">¿Desea recibir publicidad?:</span>&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="publi" id="publisi" value="1" <?php if(isset($_POST["publi"]) && $_POST["publi"]==1) echo 'checked="checked"'; ?>/> <label for="publisi">Si</label> &nbsp;<input type="radio" name="publi" id="publino" value="0" <?php if((isset($_POST["publi"]) && $_POST["publi"]==0) || !isset($_POST["publi"])) echo 'checked="checked"'; ?>/> <label for="publino">No</label></td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada"><span class="pequeno">¿Enviar email de bienvenida?:</span>&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="bienvenida" id="bienvenidasi" value="1" checked="checked" /> <label for="bienvenidasi">Si</label> &nbsp;<input type="radio" name="bienvenida" id="bienvenidano" value="0" <?php if(isset($_POST["bienvenida"]) && $_POST["bienvenida"]==0) echo 'checked="checked"'; ?>/> <label for="bienvenidano">No</label></td>
      </tr> 
       <tr>
        <td width="200" height="25" align="right" class="privada"><span class="pequeno">¿Esta colegiado actualmente?:</span>&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="colegiadoactual" id="colegiadoactualsi" value="1" checked="checked" /> <label for="colegiadoactualsi">Si</label> &nbsp;<input type="radio" name="colegiadoactual" id="colegiadoactualno" value="0" <?php if(isset($_POST["colegiadoactual"]) && $_POST["colegiadoactual"]==0) echo 'checked="checked"'; ?>/> <label for="colegiadoactualno">No</label></td>
      </tr> 
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td height="25" colspan="2" align="center"><input type="submit" name="enviar" value="Dar de alta"></td>
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
