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
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el nombre del colegiado.</font> \n <br>";
				  }
	  
				  if (empty($_POST["apellidos"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar los apellidos del colegiado.</font> \n <br>";
				  }
	  
				  if (empty($_POST["mes"]) || empty($_POST["anio"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe completar la fecha de cadicidad del NIF del colegiado.</font> \n <br>";
				  }			 	 
	  
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
				  
				  if (empty($_POST["nacimiento"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el lugar de nacimiento del colegiado.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["fnacimiento"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar fecha de nacimiento del colegiado.</font> \n <br>";
				  }	
	  
				  if (!eregi("^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+"."@[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\."."[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$", $_POST["mail"])){
					  $error .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe insertar un E-mail v�lido</font> \n <br>";
				  }	 
				  
				  if (empty($_POST["ncolegiado"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el n�mero de colegiado.</font> \n <br>";
				  }	
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {
				
				$fecha_bruta=$_POST["date"];
				$fecha_corte=explode("-",$_POST["date"]);				 			
				
				$sql="UPDATE colegiados SET Colegiado='".$_POST["ncolegiado"]."', FechaAlta='".$fecha_corte[2]."-".$fecha_corte[1]."-".$fecha_corte[0]."', CaducidadCarnet='".$_POST["mes"]."/".$_POST["anio"]."', Nombre='".$_POST["nombre"]."', Apellidos='".$_POST["apellidos"]."', NIF='".$_POST["nif"]."', LugarNacimiento='".$_POST["nacimiento"]."'";
				
				$corte_fecha=explode("-",$_POST["fnacimiento"]);
				$sql.=", FechaNacimiento='".$corte_fecha[2]."-".$corte_fecha[1]."-".$corte_fecha[0]."'";
				$sql.=", Direccion='".$_POST["direccion"]."', Localidad='".$_POST["localidad"]."', CP='".$_POST["cp"]."', Provincia='".$_POST["provincia"]."', Comunidad='".$_POST["comunidad"]."', Telefono='".str_replace(" ","",$_POST["tlf"])."', Movil='".str_replace(" ","",$_POST["movil"])."', Email='".$_POST["mail"]."', Ejerciente='".$_POST["ejerciente"]."', AltaBolsaTrabajo='".$_POST["bolsa"]."'";				
				$sql.=", TelefonoTrabajo='".str_replace(" ","",$_POST["tlftrabajo"])."', LugarTrabajo='".$_POST["lugartrabajo"]."',DireccionTrabajo='".$_POST["direcciontrabajo"]."', LocalidadTrabajo='".$_POST["localidadtrabajo"]."', AmbitoTrabajo='".$_POST["ambito"]."'";
				if(isset($_POST["publico"])) $sql.=", Publico='".$_POST["publico"]."'"; else $sql.=",Publico='0'";
				if(isset($_POST["privado"])) $sql.=", Privado='".$_POST["privado"]."'"; else $sql.=",Privado='0'";
				$sql.=", SolicitaHabilitacion='".$_POST["habil"]."', DiplomaturaLogopedia='".$_POST["diplomatura"]."'";
				if(isset($_POST["trasladado"])) $sql.=", Trasladado='".$_POST["trasladado"]."'"; else $sql.=",Trasladado='0'";
				$sql.=", ColegioOrigen='".$_POST["colegioorigen"]."', NumColegiado='".$_POST["norigen"]."', Especialidad='".$_POST["especialidad"]."', CuentaBancaria='".$_POST["cuenta"]."', Observaciones='".$_POST["observaciones"]."', Titulacion='".$_POST["titulacion_oficial"]."', Usuario='".$_POST["usuario"]."', Pass='".$_POST["pass"]."', Publicidad='".$_POST["publi"]."', Activo='".$_POST["colegiadoactual"]."' WHERE Id='".$_GET["id"]."'";				
					
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);			

				echo"<h1>Actualizaci�n de datos</h1><p>Los cambios se han guardado correctamente.<br> <a href='lista_colegiados.php'>Volver a la lista de colegiados</a></p>";

			}
			else {
				$sql_c="SELECT * FROM colegiados WHERE Id='".$_GET["id"]."'";
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
	<form method="post" name="edit_colegiados" action="edit_colegiado.php?id=<?php echo $_GET["id"]; ?>">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">      
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Fecha Alta*:&nbsp;&nbsp;</td>
        <td> 
        <?php
			$fecha_bruta=$colegiado["FechaAlta"];
			$fecha_corte=explode("-",$fecha_bruta);
		?>
        <INPUT name="date" value="<?php if (isset($_GET["date"])) echo $_GET["date"]; elseif(isset($_POST["date"])) echo $_POST["date"]; else echo $fecha_corte[2]."-".$fecha_corte[1]."-".$fecha_corte[0]; ?>"> <A href="javascript:show_calendar2('document.edit_colegiados.date', document.edit_colegiados.date.value);"><img alt="Haga click aqu� para seleccionar una fecha" src="images/cal.gif" width="31" height="28" border="0" align="absmiddle"></A></td>
      </tr>
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Nombre*:&nbsp;&nbsp;</td>
        <td height="25"><input name="nombre" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; else echo $colegiado["Nombre"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Apellidos*: &nbsp;</td>
        <td height="25"><input name="apellidos" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["apellidos"])) echo $_POST["apellidos"]; else echo $colegiado["Apellidos"]; ?>"></td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Usuario*:&nbsp;&nbsp;</td>
        <td height="25"><input name="usuario" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"]; else echo $colegiado["Usuario"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Contrase�a*: &nbsp;</td>
        <td height="25"><input name="pass" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["pass"])) echo $_POST["pass"]; else echo $colegiado["Pass"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">NIF/DNI/CIF*: &nbsp;</td>
        <td height="25">
        <?php 
			$cad_nif=explode("/",$colegiado["CaducidadCarnet"]);
		?>
        <input name="nif" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nif"])) echo $_POST["nif"]; else echo $colegiado["NIF"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Direcci�n*: &nbsp;</td>
        <td height="25"><input name="direccion" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["direccion"])) echo $_POST["direccion"]; else echo $colegiado["Direccion"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Localidad*: &nbsp;</td>
        <td height="25"><input name="localidad" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["localidad"])) echo $_POST["localidad"]; else echo $colegiado["Localidad"]; ?>">
        &nbsp;&nbsp;&nbsp; C�digo Posta<span class="privada">l*</span>:
        <input name="cp" type="text" size="5" maxlength="5" value="<?php if(isset($_POST["cp"])) echo $_POST["cp"]; else echo $colegiado["CP"]; ?>" /></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Provincia*: &nbsp;</td>
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
        <td height="25" align="right" class="privada">Comunidad*: &nbsp;</td>
        <td height="25">
        <select name="comunidad" tabindex="1">
         <option value="0" >Comunidad Aut�noma</option>
         <option value="Andalucia" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Andalucia") echo "selected"; else {if($colegiado["Comunidad"]=="Andalucia") echo "selected";} ?>>Andalucia</option>
         <option value="Aragon" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Aragon") echo "selected"; else {if($colegiado["Comunidad"]=="Aragon") echo "selected"; }?>>Aragon</option>
         <option value="Asturias" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Asturias") echo "selected"; else {if($colegiado["Comunidad"]=="Asturias") echo "selected";} ?>>Asturias</option>
         <option value="Baleares" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Baleares") echo "selected"; else {if($colegiado["Comunidad"]=="Baleares") echo "selected"; }?>>Baleares</option>  
         <option value="Canarias" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Canarias") echo "selected"; else {if($colegiado["Comunidad"]=="Canarias") echo "selected";} ?>>Canarias</option>
         <option value="Cantabria" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Cantabria") echo "selected"; else {if($colegiado["Comunidad"]=="Cantabria") echo "selected";} ?>>Cantabria</option>
         <option value="Castilla La Mancha" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Castilla La Mancha") echo "selected"; else {if($colegiado["Comunidad"]=="Castilla La Mancha") echo "selected";} ?>>Castilla La Mancha</option>  
         <option value="Castilla Leon" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Castilla Leon") echo "selected"; else {if($colegiado["Comunidad"]=="Castilla Leon") echo "selected";} ?>>Castilla Leon</option>
         <option value="Catalu�a" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Catalu�a") echo "selected"; else {if($colegiado["Comunidad"]=="Catalu�a") echo "selected";} ?>>Catalu�a</option>
         <option value="Ceuta" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Ceuta") echo "selected"; else {if($colegiado["Comunidad"]=="Ceuta") echo "Ceuta"; }?>>Ceuta</option>
         <option value="Comunidad Valenciana" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Comunidad Valenciana") echo "selected"; else {if($colegiado["Comunidad"]=="Comunidad Valenciana") echo "selected"; }?>>Comunidad Valenciana</option>
         <option value="Extremadura" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Extremadura") echo "selected"; else {if($colegiado["Comunidad"]=="Extremadura") echo "selected";} ?>>Extremadura</option>
         <option value="Galicia" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Galicia") echo "selected"; else {if($colegiado["Comunidad"]=="Galicia") echo "Galicia";} ?>>Galicia</option>
         <option value="La Rioja" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="La Rioja") echo "selected"; else {if($colegiado["Comunidad"]=="La Rioja") echo "selected";} ?>>La Rioja</option>
         <option value="Madrid" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Madrid") echo "selected"; else {if($colegiado["Comunidad"]=="Madrid") echo "Madrid";} ?>>Madrid</option> 
         <option value="Melilla" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Melilla") echo "selected"; else {if($colegiado["Comunidad"]=="Melilla") echo "Melilla";} ?>>Melilla</option>
         <option value="Navarra" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Navarra") echo "selected"; else {if($colegiado["Comunidad"]=="Navarra") echo "Navarra";} ?>>Navarra</option> 
         <option value="Pais Vasco" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Pais Vasco") echo "selected";else {if($colegiado["Comunidad"]=="Pais Vasco") echo "selected";} ?>>Pais Vasco</option>
         <option value="Region de Murcia" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Region de Murcia") echo "selected"; else {if($colegiado["Comunidad"]=="Region de Murcia")echo "selected";} ?>>Region de Murcia</option>         
       </select>
        </td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Tel�fono*: &nbsp;</td>
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
        <td height="25"><input name="nacimiento" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nacimiento"])) echo $_POST["nacimiento"]; else echo $colegiado["LugarNacimiento"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Fecha de nacimiento*: &nbsp;</td>
        <td height="25">
        <?php $corte_naci=explode("-",$colegiado["FechaNacimiento"]); ?>
        <input name="fnacimiento" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["fnacimiento"])) echo $_POST["fnacimiento"]; else echo $corte_naci[2]."-".$corte_naci[1]."-".$corte_naci[0]; ?>"> <span class="pequeno">P. Ej. 23-05-1977</span></td>
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
        <td height="25"><input name="ncolegiado" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["ncolegiado"])) echo $_POST["ncolegiado"]; else echo $colegiado["Colegiado"]; ?>">&nbsp;&nbsp;&nbsp;Caducidad<span class="privada">*</span>
        <input name="mes" type="text" size="2" maxlength="2" value="<?php if(isset($_POST["mes"])) echo $_POST["mes"]; else echo $cad_nif[0]; ?>" />/<input name="anio" type="text" size="4" maxlength="4" value="<?php if(isset($_POST["anio"])) echo $_POST["anio"]; else echo $cad_nif[1]; ?>" /> <span class="pequeno">P. ej. <strong>06/2012</strong></span></td>
      </tr>    
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Tipo colegiado:&nbsp;&nbsp;</td>
        <td height="25">
         <select name="ejerciente">
        	<option value="1" <?php if((isset($_POST["ejerciente"]) && $_POST["ejerciente"]==1) || $colegiado["Ejerciente"]==1) echo 'selected"';?>>Ejerciente</option>
            <option value="0" <?php if((isset($_POST["ejerciente"]) && $_POST["ejerciente"]==0) || $colegiado["Ejerciente"]==0) echo 'selected"';?>>No Ejerciente</option>
            <option value="2" <?php if((isset($_POST["ejerciente"]) && $_POST["ejerciente"]==2) || $colegiado["Ejerciente"]==2) echo 'selected"';?>>Jubilado</option>
            <option value="3" <?php if((isset($_POST["ejerciente"]) && $_POST["ejerciente"]==3) || $colegiado["Ejerciente"]==3) echo 'selected"';?>>Estudiante</option>
        </select>
        
      </td>
      </tr> 
       <tr>
        <td width="200" height="25" align="right" class="privada">Titulacion:&nbsp;&nbsp;</td>
        <td height="25"><input name="titulacion_oficial" type="text" maxlength="255" size="25" value="<?php if(isset($_POST["titulacion_oficial"])) echo $_POST["titulacion_oficial"]; else echo $colegiado["Titulacion"]; ?>"></td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Especialidad:&nbsp;&nbsp;</td>
        <td height="25"><input name="especialidad" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["especialidad"])) echo $_POST["especialidad"]; else echo $colegiado["Especialidad"]; ?>"></td>
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
        <td width="200" height="25" align="right" class="privada">Solicita habilitaci�n:&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="habil" id="habilsi" value="1" <?php if((isset($_POST["habil"]) && $_POST["habil"]==1) || $colegiado["SolicitaHabilitacion"]==1) echo 'checked="checked"'; ?>/> <label for="habilsi">Si</label> &nbsp;<input type="radio" name="habil" id="habilno" value="0" <?php if((isset($_POST["habil"]) && $_POST["habil"]==0) || $colegiado["SolicitaHabilitacion"]==0) echo 'checked="checked"'; ?>/> <label for="habilno">No</label></td>
      </tr>       
      <tr>
        <td width="200" height="25" align="right" class="privada">Diplomado Logopedia:&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="diplomatura" id="diplomaturasi" value="1" <?php if((isset($_POST["diplomatura"]) && $_POST["diplomatura"]==1) || $colegiado["DiplomaturaLogopedia"]==1) echo 'checked="checked"'; ?>/> <label for="diplomaturasi">Si</label> &nbsp;<input type="radio" name="diplomatura" id="diplomaturano" value="0" <?php if((isset($_POST["diplomatura"]) && $_POST["diplomatura"]==0) || $colegiado["DiplomaturaLogopedia"]==0) echo 'checked="checked"'; ?>/> <label for="diplomaturano">No</label></td>
      </tr>       
      <tr>
        <td width="200" height="25" align="right" class="privada">Bolsa de Trabajo:&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="bolsa" id="bolsasi" value="1" <?php if((isset($_POST["bolsa"]) && $_POST["bolsa"]==1) || $colegiado["AltaBolsaTrabajo"]==1) echo 'checked="checked"'; ?>/> <label for="bolsasi">Si</label> &nbsp;<input type="radio" name="bolsa" id="bolsano" value="0" <?php if((isset($_POST["bolsa"]) && $_POST["bolsa"]==0) || $colegiado["AltaBolsaTrabajo"]==0) echo 'checked="checked"'; ?>/> <label for="bolsano">No</label></td>
      </tr>       
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
        <tr>
        <td width="200" height="25" align="right" class="privada">Trasladado:&nbsp;&nbsp;</td>
        <td height="25"><input type="checkbox" name="trasladado" id="trasladado" value="1" <?php if(isset($_POST["trasladado"])|| $colegiado["Trasladado"]==1) echo 'checked="checked" '; ?>/></td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Colegio de origen:&nbsp;&nbsp;</td>
        <td height="25"><input name="colegioorigen" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["colegioorigen"])) echo $_POST["colegioorigen"]; else echo $colegiado["ColegioOrigen"]; ?>"></td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">N� colegiado origen:&nbsp;&nbsp;</td>
        <td height="25"><input name="norigen" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["norigen"])) echo $_POST["norigen"]; else echo $colegiado["NumColegiado"]; ?>"></td>
      </tr>
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada" valign="top">Observaciones:&nbsp;&nbsp;</td>
        <td><textarea name="observaciones" style="width:250px; height:60px"><?php if(isset($_POST["observaciones"])) echo $_POST["observaciones"]; else echo $colegiado["Observaciones"]; ?></textarea></td>
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
        <td width="200" height="25" align="right" class="privada"><span class="pequeno">�Esta colegiado actualmente?:</span>&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="colegiadoactual" id="colegiadoactualsi" value="1" <?php if((isset($_POST["colegiadoactual"]) && $_POST["colegiadoactual"]==1) || $colegiado["Activo"]==1) echo 'checked="checked"'; ?>/> <label for="colegiadoactualsi">Si</label> &nbsp;<input type="radio" name="colegiadoactual" id="colegiadoactualno" value="0" <?php if((isset($_POST["colegiadoactual"]) && $_POST["colegiadoactual"]==0) || $colegiado["Activo"]==0) echo 'checked="checked"'; ?>/> <label for="colegiadoactualno">No</label></td>
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
