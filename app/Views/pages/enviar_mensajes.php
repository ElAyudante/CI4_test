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
				  
				  if (!empty($_FILES["adjunto"]["name"])){
					  $extension=explode(".",$_FILES["adjunto"]['name']);
					  $numero_cortes=count($extension);
					  if($extension[$numero_cortes-1]!="pdf") {
					  	$error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>El fichero debe est�r en formato pdf</font> \n <br>";
					  }
				  }				  
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {				
				// obtengo los destinatarios para la BBDD
				$destina="";
				if($_SESSION["eee"]==0) {
					foreach ($_POST['colegiados'] as $colegg){ 
						$ides_de_colegiados[]=$colegg;
						$sql_nombre="SELECT Nombre, Apellidos FROM colegiados WHERE Id='$colegg'";
						$con_nombre=mysql_query($sql_nombre);
						$nn=mysql_fetch_array($con_nombre);
						$destina.=$nn["Nombre"]." ".$nn["Apellidos"].", ";
					}
				}
				else {
					$ides_de_colegiados=$_SESSION["coleg"];
					$destina="Todos";
				}			
				
				$num=proximo_registro ($bd_base,"mensajes");
				
				//SUBO EL FICHERO ADJUNTO SI EXIXTE				
				if(!empty($_FILES["adjunto"]["name"])) {
					$direc="../adjuntos/";
					subir_archivo("adjunto", $direc, $num);
				}
												
				$sql_men="INSERT INTO mensajes VALUES ('', '".$_POST["asunto"]."', '".$_POST["mensaje"]."', '".$destina."', '".date("Y-m-d H:i:s")."','')";
				$con_men=mysql_query($sql_men) or die (mysql_error());			
				
				
					for($t=0;$t<count($ides_de_colegiados);$t++) {
						$sql="INSERT INTO destinatarios_mensaje VALUES ('', '".$num."', '".$ides_de_colegiados[$t]."', '0', '".date("Y-m-d H:i:s")."')";		
						$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);	
						
						
						/**********************************************/
						/**********************************************/
						/**********************************************/
						/**********************************************/
						/**********************************************/
						
						//OBTENGO EL EMAIL DE CADA COLEGIADO
						$sql_dm="SELECT Email FROM colegiados WHERE Id='".$ides_de_colegiados[$t]."'";
						$con_dm=mysql_query($sql_dm);
						$email=mysql_fetch_array($con_dm);
						
						
						$cuerpo='<p>El Colegio Profesional de Logopedas de Cantabria le ha enviado un nuevo mensaje a su <a href="http://www.logopedascantabria.org/colegiados/">�rea Privada</a></p>';		
			
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
						  $mail->AddAddress($email["Email"]);
						
						  //Asignamos asunto y cuerpo del mensaje
						  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
						  //que se vea en negrita
						  $mail->Subject = "Tienes un nuevo mensaje en tu �rea Privada";
						  $mail->Body = $mensaje;
						
						  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
						  $mail->AltBody = "";
						  
						  //Indicams el fichero a adjuntar si el usuario seleccion uno en el formulario  	 
						 
						  if (@$_FILES["adjunto"]["name"] !="") {
							$mail->AddAttachment($direc.$num.".pdf",$num.".pdf");
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
		
					}
				
				
				echo "<h1>Enviar mensajes</h1><p>El/Los mesaje/es se ha/han procesado correctamente.</p><p>Se han enviado ".count($ides_de_colegiados)." mensajes</p>";

			}
			else {													
					
	?>
    <h1>Enviar mensajes</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="enviar_mensajes" action="enviar_mensajes.php" enctype="multipart/form-data">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Asunto*:&nbsp;&nbsp;</td>
        <td height="25"><input name="asunto" type="text" maxlength="255" size="50" value="<?php if(isset($_POST["asunto"])) echo $_POST["asunto"]; ?>"> </td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" valign="top" class="privada">Mensaje*:&nbsp;&nbsp;</td>
        <td height="25"><textarea name="mensaje" rows="6" cols="40"><?php if(isset($_POST["mensaje"])) echo $_POST["mensaje"]; ?></textarea> </td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Adjunto:&nbsp;&nbsp;</td>
        <td height="25"><input name="adjunto" type="file" size="50"> </td>
      </tr> 
      <tr>
        <td colspan="2" height="25">&nbsp;&nbsp; Destinatarios</td>
      </tr>
       <tr>
        <td width="200" height="25" align="right" class="privada">Ejercientes:&nbsp;&nbsp;</td>
        <td><select name="ejercientes" onChange="self.location.href='enviar_mensajes.php?ejercientes='+document.enviar_mensajes.ejercientes.options[document.enviar_mensajes.ejercientes.selectedIndex].value+'&bolsa='+document.enviar_mensajes.bolsa.options[document.enviar_mensajes.bolsa.selectedIndex].value+'&sector='+document.enviar_mensajes.sector.options[document.enviar_mensajes.sector.selectedIndex].value+'&diplomados='+document.enviar_mensajes.diplomados.options[document.enviar_mensajes.diplomados.selectedIndex].value+'&comunidad='+document.enviar_mensajes.comunidad.options[document.enviar_mensajes.comunidad.selectedIndex].value">
        	<option value="todos" <?php if(isset($_GET["ejercientes"]) && $_GET["ejercientes"]=="todos")  echo "selected";?>>Todos</option>	
            <option value="1" <?php if(isset($_GET["ejercientes"]) && $_GET["ejercientes"]=="1")  echo "selected";?>>Ejercientes</option>	
        	<option value="0" <?php if(isset($_GET["ejercientes"]) && $_GET["ejercientes"]=="0")  echo "selected";?>>No ejercientes</option>	
            <option value="2" <?php if(isset($_GET["ejercientes"]) && $_GET["ejercientes"]=="2")  echo "selected";?>>Jubilados</option>	
            <option value="3" <?php if(isset($_GET["ejercientes"]) && $_GET["ejercientes"]=="3")  echo "selected";?>>Estudiantes</option>	
        </select>        
        </td>
      </tr>
      <tr>
      <td width="200" height="25" align="right" class="privada">Bolsa de Trabajo:&nbsp;&nbsp;</td>
      <td>       
        <select name="bolsa"  onChange="self.location.href='enviar_mensajes.php?ejercientes='+document.enviar_mensajes.ejercientes.options[document.enviar_mensajes.ejercientes.selectedIndex].value+'&bolsa='+document.enviar_mensajes.bolsa.options[document.enviar_mensajes.bolsa.selectedIndex].value+'&sector='+document.enviar_mensajes.sector.options[document.enviar_mensajes.sector.selectedIndex].value+'&diplomados='+document.enviar_mensajes.diplomados.options[document.enviar_mensajes.diplomados.selectedIndex].value+'&comunidad='+document.enviar_mensajes.comunidad.options[document.enviar_mensajes.comunidad.selectedIndex].value">
        	<option value="todos"  <?php if(isset($_GET["bolsa"]) && $_GET["bolsa"]=="todos")  echo "selected";?>>Todos</option>	
        	<option value="1" <?php if(isset($_GET["bolsa"]) && $_GET["bolsa"]=="1")  echo "selected";?>>Apuntados</option>	
        	<option value="0" <?php if(isset($_GET["bolsa"]) && $_GET["bolsa"]=="0")  echo "selected";?>>No apuntados</option>	
        </select>
        </td>
      </tr>
      <tr>
      <td width="200" height="25" align="right" class="privada">Sector: &nbsp;&nbsp;</td>
      <td><select name="sector" onChange="self.location.href='enviar_mensajes.php?ejercientes='+document.enviar_mensajes.ejercientes.options[document.enviar_mensajes.ejercientes.selectedIndex].value+'&bolsa='+document.enviar_mensajes.bolsa.options[document.enviar_mensajes.bolsa.selectedIndex].value+'&sector='+document.enviar_mensajes.sector.options[document.enviar_mensajes.sector.selectedIndex].value+'&diplomados='+document.enviar_mensajes.diplomados.options[document.enviar_mensajes.diplomados.selectedIndex].value+'&comunidad='+document.enviar_mensajes.comunidad.options[document.enviar_mensajes.comunidad.selectedIndex].value">
      		<option value="todos" <?php if(isset($_GET["sector"]) && $_GET["sector"]=="todos")  echo "selected";?>>Todos</option>	
        	<option value="1" <?php if(isset($_GET["sector"]) && $_GET["sector"]=="1")  echo "selected";?>>Publico</option>	
        	<option value="0" <?php if(isset($_GET["sector"]) && $_GET["sector"]=="0")  echo "selected";?>>Privado</option>	
        </select> 
        </td>
      </tr>      
      <tr>
      	<td width="200" height="25" align="right" class="privada">Titulaci�n: &nbsp;&nbsp;</td>
        <td><select name="diplomados" onChange="self.location.href='enviar_mensajes.php?ejercientes='+document.enviar_mensajes.ejercientes.options[document.enviar_mensajes.ejercientes.selectedIndex].value+'&bolsa='+document.enviar_mensajes.bolsa.options[document.enviar_mensajes.bolsa.selectedIndex].value+'&sector='+document.enviar_mensajes.sector.options[document.enviar_mensajes.sector.selectedIndex].value+'&diplomados='+document.enviar_mensajes.diplomados.options[document.enviar_mensajes.diplomados.selectedIndex].value+'&comunidad='+document.enviar_mensajes.comunidad.options[document.enviar_mensajes.comunidad.selectedIndex].value">
        	<option value="todos" <?php if(isset($_GET["diplomados"]) && $_GET["diplomados"]=="todos")  echo "selected";?>>Todos</option>	
        	<option value="1" <?php if(isset($_GET["diplomados"]) && $_GET["diplomados"]=="1")  echo "selected";?>>Con diplomatura</option>	
        	<option value="0" <?php if(isset($_GET["diplomados"]) && $_GET["diplomados"]=="0")  echo "selected";?>>Habilitados</option>	
        </select></td>
      </tr>
      <tr>
      	<td width="200" height="25" align="right" class="privada">Comunidad: &nbsp;&nbsp;</td>
        <td><select name="comunidad" onChange="self.location.href='enviar_mensajes.php?ejercientes='+document.enviar_mensajes.ejercientes.options[document.enviar_mensajes.ejercientes.selectedIndex].value+'&bolsa='+document.enviar_mensajes.bolsa.options[document.enviar_mensajes.bolsa.selectedIndex].value+'&sector='+document.enviar_mensajes.sector.options[document.enviar_mensajes.sector.selectedIndex].value+'&diplomados='+document.enviar_mensajes.diplomados.options[document.enviar_mensajes.diplomados.selectedIndex].value+'&comunidad='+document.enviar_mensajes.comunidad.options[document.enviar_mensajes.comunidad.selectedIndex].value">
         <option value="todos" <?php if(isset($_GET["comunidad"]) && $_GET["comunidad"]=="todos")  echo "selected";?>>Todas</option>
         <?php
		 	$sql_com="SELECT DISTINCT Comunidad FROM colegiados ORDER BY Comunidad";
			$con_com=mysql_query($sql_com) or die(mysql_error());
			if(mysql_num_rows($con_com)>0) {
				while($pro=mysql_fetch_array($con_com)) {
					echo "<option value='".$pro["Comunidad"]."'";
					if(isset($_GET["comunidad"]) && $_GET["comunidad"]==$pro["Comunidad"]) echo "selected";
					echo ">".$pro["Comunidad"]."</option>\n";	
				}
			}
			
		 ?>                
       </select></td>
      </tr>        
         
       <?php
	   if(isset($_GET["ejercientes"])) {
		  //SI EXISTEN LAS VARIABLES GET -->
	   	if(isset($_GET["ejercientes"]) && ($_GET["ejercientes"]!="todos" || $_GET["bolsa"]!="todos" || $_GET["sector"]!="todos" || $_GET["diplomados"]!="todos" || $_GET["comunidad"]!="todos")) {
			$_SESSION["eee"]=0;		
			//compongo la consulta
			$sql="SELECT Id FROM colegiados WHERE Id>0";
			if($_GET["ejercientes"]!="todos") $sql.=" AND Ejerciente='".$_GET["ejercientes"]."'";
			if($_GET["bolsa"]!="todos") $sql.=" AND AltaBolsaTrabajo='".$_GET["bolsa"]."'";
			
			if($_GET["sector"]=="1")$sql.=" AND Publico='1'";
			if($_GET["sector"]=="0")$sql.=" AND Privado='1'";
			
			if($_GET["diplomados"]!="todos") $sql.=" AND DiplomaturaLogopedia='".$_GET["diplomados"]."'";
			if($_GET["comunidad"]!="todos") $sql.=" AND Comunidad='".$_GET["comunidad"]."'";
		  
			$sql.=" AND Activo='1'";
			
			$consulta = mysql_query($sql) or die(mysql_error());			
			/*****************Comprobamos las filas afectadas por la consulta *****************/
				
			$filas = mysql_num_rows($consulta);			
			
			//Limito la busqueda
			$TAMANO_PAGINA = 300;
			$total_paginas = ceil($filas / $TAMANO_PAGINA);

			//examino la p�gina a mostrar y el inicio del registro a mostrar
			$pagina = @$_GET["pagina"];
			if (!$pagina) {
				$inicio = 0;
				$pagina=1;
			}
			else {
				$inicio = ($pagina - 1) * $TAMANO_PAGINA;
			}
			
			$sqll="SELECT Id, Nombre, Apellidos FROM colegiados WHERE Id>0";
			if($_GET["ejercientes"]!="todos") $sqll.=" AND Ejerciente='".$_GET["ejercientes"]."'";
			if($_GET["bolsa"]!="todos") $sqll.=" AND AltaBolsaTrabajo='".$_GET["bolsa"]."'";
			
			if($_GET["sector"]=="1")$sqll.=" AND Publico='1'";
			if($_GET["sector"]=="0")$sqll.=" AND Privado='1'";
			
			if($_GET["diplomados"]!="todos") $sqll.=" AND DiplomaturaLogopedia='".$_GET["diplomados"]."'";
			if($_GET["comunidad"]!="todos") $sqll.=" AND Comunidad='".$_GET["comunidad"]."'";
			$sqll.=" AND Activo='1'";
			$sqll.=" ORDER BY Apellidos LIMIT " . $inicio ."," .$TAMANO_PAGINA;
			$consulta2 = mysql_query($sqll) or die (mysql_error());
			
			echo "<table align='center' border='0' style='font-size:0.8em'>";
			
			$columnes = 3; # N�mero de columnas (variable)
						
			if (($rows=mysql_num_rows($consulta2))==0) {
			  echo "<tr><td colspan='$columnes' >No hay resultados en la BD.</td></tr> ";
			} 
			echo "<tr><td colspan='$columnes' >&nbsp;</td></tr> ";			
			echo "<tr><td colspan='$columnes' >&nbsp;Resultado: ".mysql_num_rows($consulta2)."</td></tr> ";			
			echo "<tr><td colspan='$columnes' ><a href='#' onclick='javascript:seleccionar_todo()'>MARCAR TODOS</a> | <a href='#' onclick='javascript:desseleccionar_todo()'>DESMARCAR TODOS</a></td></tr> ";
			echo "<tr><td colspan='$columnes' >&nbsp;</td></tr> ";
			
			for ($i=1; $row = mysql_fetch_array ($consulta2); $i++) {
			  $resto = ($i % $columnes); # N�mero de celda del <tr> en que nos encontramos
			  if ($resto == 1) {echo "<tr>";} # Si es la primera celda, abrimos <tr>
				  echo "<td height='25' width='33%' align='left' valign='middle'><input type='checkbox' value='".$row["Id"]."' name='colegiados[]' style='float:left'> ".$row["Apellidos"]." ".$row["Nombre"]."</td> \n"; 
			  if ($resto == 0) {echo "</tr>";} # Si es la �ltima celda, cerramos </tr>
			  }
			  if (@$resto <> 0) { # Si el resultado no es m�ltiple de $columnes acabamos de rellenar los huecos
			  $ajust = $columnes - $resto; # N�mero de huecos necesarios
			  for ($j = 0; $j < $ajust; $j++) {echo "<td>&nbsp;</td>";}
			  echo "</tr>"; # Cerramos la �ltima l�nea </tr>
			  }
			  echo "<tr><td colspan='3' align='right'> \n";
			  if ($total_paginas > 1){
			  for ($u=1;$u<=$total_paginas;$u++){
				  if ($pagina == $i) 
					  //si muestro el �ndice de la p�gina actual, no coloco enlace
					  echo "[$pagina]" . " ";
				  else
					  //si el �ndice no corresponde con la p�gina mostrada actualmente, coloco el enlace para ir a esa p�gina
					  echo "<a  href='enviar_mensajes.php?pagina=" . $u . "'>" . $u . "</a>";
				  }
			  }
			  
			  echo "</td></tr></table>";
  
			
			
		}	
		else {
			$_SESSION["eee"]=1;			
			$sql="SELECT Id, Email FROM colegiados WHERE Activo='1'";
			$con=mysql_query($sql) or die (mysql_error());
			if(mysql_num_rows($con)>0) {
				while($cole=mysql_fetch_array($con)) {
					$coleg[]=$cole["Id"];				
				}
				$_SESSION["coleg"]=$coleg;				
			}			
		}
	   }
	   // SI NO EXISTEN LAS VARIABLES GET
	   else {
		  
		  
		  $_SESSION["eee"]=0;
		  $sqll="SELECT Id, Nombre, Apellidos FROM colegiados WHERE Activo='1'";
		  $consulta2 = mysql_query($sqll) or die (mysql_error());
			
			echo "<table align='center' border='0' style='font-size:0.8em'>";
			
			$columnes = 3; # N�mero de columnas (variable)
						
			if (($rows=mysql_num_rows($consulta2))==0) {
			  echo "<tr><td colspan='$columnes' >No hay resultados en la BD.</td></tr> ";
			} 
			
			echo "<tr><td colspan='$columnes' >&nbsp;</td></tr> ";			
			echo "<tr><td colspan='$columnes' >&nbsp;Resultado: ".mysql_num_rows($consulta2)."</td></tr> ";			
			echo "<tr><td colspan='$columnes' ><a href='#' onclick='javascript:seleccionar_todo()'>MARCAR TODOS</a> | <a href='#' onclick='javascript:desseleccionar_todo()'>DESMARCAR TODOS</a></td></tr> ";
			echo "<tr><td colspan='$columnes' >&nbsp;</td></tr> ";
			
			
			for ($i=1; $row = mysql_fetch_array ($consulta2); $i++) {
			  $resto = ($i % $columnes); # N�mero de celda del <tr> en que nos encontramos
			  if ($resto == 1) {echo "<tr>";} # Si es la primera celda, abrimos <tr>
				  echo "<td height='25' width='33%' align='left' valign='middle'><input type='checkbox' value='".$row["Id"]."' name='colegiados[]' style='float:left'> ".$row["Apellidos"]." ".$row["Nombre"]."</td> \n"; 
			  if ($resto == 0) {echo "</tr>";} # Si es la �ltima celda, cerramos </tr>
			  }
			  if (@$resto <> 0) { # Si el resultado no es m�ltiple de $columnes acabamos de rellenar los huecos
			  $ajust = $columnes - $resto; # N�mero de huecos necesarios
			  for ($j = 0; $j < $ajust; $j++) {echo "<td>&nbsp;</td>";}
			  echo "</tr>"; # Cerramos la �ltima l�nea </tr>
			  }
			  echo "<tr><td colspan='3' align='right'> \n";			  
			  echo "</td></tr></table>";  
		   
	   }
	   ?>  
         
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
