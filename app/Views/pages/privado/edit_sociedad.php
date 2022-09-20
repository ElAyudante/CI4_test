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
<h1>Editar sociedad</h1>
<?php 
			
			//VALIDAMOS EL FORMULARIO
$error ="";

			if (isset($_POST["enviar"])) {			  					  
				  
				  if (empty($_POST["nombre"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el nombre del colegiado.</font> \n <br>";
				  }			  				  		 	 
	  
				  if (empty($_POST["direccion"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar su direcci&oacute;n.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["localidad"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar su localidad.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["cp"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar su c&oacute;digo postal.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["tlf"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar su tel&eacute;fono.</font> \n <br>";
				  }
				  
				 				  
				  if (empty($_POST["cuenta"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar una cuenta bancaria donde domiciliar sus coutas.</font> \n <br>";
				  }	  
				  	
	  
				  if (!eregi("^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+"."@[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\."."[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$", $_POST["mail"])){
					  $error .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe insertar un E-mail v&aacute;lido</font> \n <br>";
				  }
				  
				  if (empty($_POST["nif"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el CIF de la sociedad.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["tiposociedad"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el tipo de sociedad.</font> \n <br>";
				  }	
				  
				  if (empty($_POST["capitalsocial"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el capital social.</font> \n <br>";
				  }	
				 	
				 
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {
				
				$num_inscrito=@proximo_registro($bd_base,"sociedades");
				
				//INGRESO LOS DATOS DE LA SOCIEDAD
				$sql="UPDATE sociedades SET  Colegiado='".$_POST["ncol"]."', Sociedad='".$_POST["nombre"]."', NIF='".$_POST["nif"]."', Direccion='".$_POST["direccion"]."', CP='".$_POST["cp"]."', Poblacion='".$_POST["localidad"]."', Provincia='".$_POST["provincia"]."', Telefono='".$_POST["tlf"]."', Fax='".$_POST["fax"]."', Email='".$_POST["mail"]."', RegistroMercantil='".$_POST["registromercantil"]."', TipoSociedad='".$_POST["tiposociedad"]."', CapitalSocial='".$_POST["capitalsocial"]."', CuentaBancaria='".$_POST["cuenta"]."' WHERE Id='".$_GET["id"]."'";	
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);	
				
				// A�ADO LOS DATOS DE LOS SOCIOS
				$sql_d1="DELETE FROM relSociedades WHERE relSocidad='".$_GET["id"]."'";
				$con_d1=mysql_query($sql_d1) or die (mysql_error());
				for($o=1;$o<5;$o++) {
					if(!empty($_POST["ncolegiado".$o])) {
						$sql2="INSERT INTO relSociedades VALUES ('', '".$_GET["id"]."','1','".$_POST["ncolegiado".$o]."','".$_POST["nombre".$o]."','','".$_POST["cargo".$o]."','".$_POST["participacion".$o]."')";
						$con2=mysql_query($sql2) or die (mysql_error());
					}
				}
				
				// A�ADO LOS DATOS DE LOS colegiados empleados
				for($o=1;$o<5;$o++) {
					if(!empty($_POST["ncolegiadoe".$o])) {
						$sql3="INSERT INTO relSociedades VALUES ('', '".$_GET["id"]."','2','".$_POST["ncolegiadoe".$o]."','".$_POST["nombree".$o]."','','','')";
						$con3=mysql_query($sql3) or die (mysql_error());
					}
				}
				
				// A�ADO LOS DATOS DE LOS OTROS SOCIOS
				for($o=1;$o<5;$o++) {
					if(!empty($_POST["nombreo".$o])) {
						$sql4="INSERT INTO relSociedades VALUES ('', '".$_GET["id"]."','3','','".$_POST["nombreo".$o]."','".$_POST["dni".$o]."','".$_POST["cargoo".$o]."','".$_POST["participaciono".$o]."')";
						$con4=mysql_query($sql4) or die (mysql_error());
					}
				}
				
				
				echo "Los cambios se han guardado correctamente.";
				
				
			}
			else {
				
				$sql_c="SELECT * FROM sociedades WHERE Id='".$_GET["id"]."'";
				$con_c=mysql_query($sql_c) or die (mysql_error);
				if(mysql_num_rows($con_c)>0) {
					$colegiado=mysql_fetch_array($con_c);	
				}
				else {
					$error.="No existe ninguna socidad con esos par�metros";	
				}			
		  	 
		  ?>       
          <div align="center">
          
			 
		  	  <?php  if (isset($error)) { echo "<p style='float:left; text-align:left; clear:both'>".$error."</p>"; }	  ?>
        <form method="post" name="edit_colegiado" action="edit_sociedad.php?id=<?php echo $_GET["id"]; ?>">
        <table width="580" style="border:none" cellpadding="0" cellspacing="0">      
           <tr>
            <td width="210">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
         
          <tr>
            <td width="210" height="25" align="right" class="privada">Denominaci&oacute;n social*:&nbsp;&nbsp;</td>
            <td height="25" align="left"><input name="nombre" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"];else echo $colegiado["Sociedad"]; ?>"></td>
          </tr>
          <tr>
            <td width="210" height="25" align="right" class="privada">NIF/DNI/CIF*: &nbsp;</td>
            <td height="25" align="left"><input name="nif" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nif"])) echo $_POST["nif"]; else echo $colegiado["NIF"]; ?>"></td>
          </tr>
          <tr>
            <td width="210" height="25" align="right" class="privada">N� Colegiado*: &nbsp;</td>
            <td height="25" align="left"><input name="ncol" type="text" maxlength="20" size="25" value="<?php if(isset($_POST["ncol"])) echo $_POST["ncol"]; else echo $colegiado["Colegiado"]; ?>"></td>
          </tr>
          <tr>
            <td width="210" height="25" align="right" class="privada">Direcci&oacute;n*: &nbsp;</td>
            <td height="25" align="left"><input name="direccion" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["direccion"])) echo $_POST["direccion"]; else echo $colegiado["Direccion"]; ?>"></td>
          </tr>
          <tr>
            <td width="210" height="25" align="right" class="privada">Localidad*: &nbsp;</td>
            <td height="25" align="left"><input name="localidad" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["localidad"])) echo $_POST["localidad"]; else echo $colegiado["Poblacion"]; ?>">
            &nbsp;&nbsp;&nbsp; C&oacute;digo Posta<span class="privada">l*</span>:
            <input name="cp" type="text" size="5" maxlength="5" value="<?php if(isset($_POST["cp"])) echo $_POST["cp"]; else echo $colegiado["CP"]; ?>" /></td>
          </tr>
          <tr>
            <td width="210" height="25" align="right" class="privada">Provincia*: &nbsp;</td>
            <td height="25" align="left">
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
            <td width="210" height="25" align="right" class="privada">Tel&eacute;fono*: &nbsp;</td>
            <td height="25" align="left"><input name="tlf" type="text" maxlength="12" size="25" value="<?php if(isset($_POST["tlf"])) echo $_POST["tlf"]; else echo $colegiado["Telefono"]; ?>"></td>
          </tr> 
          <tr>
            <td width="210" height="25" align="right" class="privada">Fax: &nbsp;</td>
            <td height="25" align="left"><input name="fax" type="text" maxlength="12" size="25" value="<?php if(isset($_POST["fax"])) echo $_POST["fax"]; else echo $colegiado["Fax"]; ?>"></td>
          </tr>        
          <tr>
            <td width="210" height="25" align="right" class="privada">Email*: &nbsp;</td>
            <td height="25" align="left"><input name="mail" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"]; else echo $colegiado["Email"]; ?>"></td>
          </tr>
          <tr>
            <td width="210" height="25" align="right" class="privada">Reg. mercantil de*: &nbsp;</td>
            <td height="25" align="left">
            <select name="registromercantil" tabindex="1">
         <option value="0" >Seleccione la provincia</option>
         <option value="Alava" <?php if($colegiado["RegistroMercantil"]=="Alava") echo "selected";?>>Alava</option>
         <option value="Albacete" <?php if($colegiado["RegistroMercantil"]=="Albacete") echo "selected";?>>Albacete</option>
         <option value="Alicante" <?php if($colegiado["RegistroMercantil"]=="Alicante") echo "selected";?>>Alicante</option>
         <option value="Almer�a" <?php if($colegiado["RegistroMercantil"]=="Almer�a") echo "selected";?>>Almer�a</option>
         <option value="Asturias" <?php if($colegiado["RegistroMercantil"]=="Asturias") echo "selected";?>>Asturias</option>
         <option value="Avila" <?php if($colegiado["RegistroMercantil"]=="Avila") echo "selected";?>>Avila</option>
         <option value="Badajoz" <?php if($colegiado["RegistroMercantil"]=="Badajoz") echo "selected";?>>Badajoz</option>
         <option value="Balears (Illes)" <?php if($colegiado["RegistroMercantil"]=="Balears (Illes)") echo "selected";?>>Balears (Illes)</option>
         <option value="Barcelona" <?php if($colegiado["RegistroMercantil"]=="Barcelona") echo "selected";?>>Barcelona</option>
         <option value="Burgos" <?php if($colegiado["RegistroMercantil"]=="Burgos") echo "selected";?>>Burgos</option>
         <option value="C�ceres" <?php if($colegiado["RegistroMercantil"]=="C�ceres") echo "selected";?>>C�ceres</option>
         <option value="C�diz" <?php if($colegiado["RegistroMercantil"]=="C�diz") echo "selected";?>>C�diz</option>
          <option value="C�diz" <?php if($colegiado["RegistroMercantil"]=="Canarias") echo "selected";?>>Canarias</option>
         <option value="Cantabria" <?php if($colegiado["RegistroMercantil"]=="Cantabria") echo "selected";?>>Cantabria</option>
         <option value="Castell�n" <?php if($colegiado["RegistroMercantil"]=="Castell�n") echo "selected";?>>Castell�n</option>
         <option value="Ciudad Real" <?php if($colegiado["RegistroMercantil"]=="Ciudad Real") echo "selected";?>>Ciudad Real</option>
         <option value="C�rdoba" <?php if($colegiado["RegistroMercantil"]=="C�rdoba") echo "selected";?>>C�rdoba</option>
         <option value="Coru�a (A)" <?php if($colegiado["RegistroMercantil"]=="Coru�a (A)") echo "selected";?>>Coru�a (A)</option>
         <option value="Cuenca" <?php if($colegiado["RegistroMercantil"]=="Cuenca") echo "selected";?>>Cuenca</option>
         <option value="Girona" <?php if($colegiado["RegistroMercantil"]=="Girona") echo "selected";?>>Girona</option>
         <option value="Granada" <?php if($colegiado["RegistroMercantil"]=="Granada") echo "selected";?>>Granada</option>
         <option value="Guadalajara" <?php if($colegiado["RegistroMercantil"]=="Guadalajara") echo "selected";?>>Guadalajara</option>
         <option value="Guip�zcoa" <?php if($colegiado["RegistroMercantil"]=="Guip�zcoa") echo "selected";?>>Guip�zcoa</option>
         <option value="Huelva" <?php if($colegiado["RegistroMercantil"]=="Huelva") echo "selected";?>>Huelva</option>
         <option value="Huesca" <?php if($colegiado["RegistroMercantil"]=="Huesca") echo "selected";?>>Huesca</option>
         <option value="Ja�n" <?php if($colegiado["RegistroMercantil"]=="Ja�n") echo "selected";?>>Ja�n</option>
         <option value="Le�n" <?php if($colegiado["RegistroMercantil"]=="Le�n") echo "selected";?>>Le�n</option>
         <option value="Lleida" <?php if($colegiado["RegistroMercantil"]=="Lleida") echo "selected";?>>Lleida</option>
         <option value="Lugo" <?php if($colegiado["RegistroMercantil"]=="Lugo") echo "selected";?>>Lugo</option>
         <option value="Madrid" <?php if($colegiado["RegistroMercantil"]=="Madrid") echo "selected";?>>Madrid</option>
         <option value="M�laga" <?php if($colegiado["RegistroMercantil"]=="M�laga") echo "selected";?>>M�laga</option>
         <option value="Murcia" <?php if($colegiado["RegistroMercantil"]=="Murcia") echo "selected";?>>Murcia</option>
         <option value="Navarra" <?php if($colegiado["RegistroMercantil"]=="Navarra") echo "selected";?>>Navarra</option>
         <option value="Ourense" <?php if($colegiado["RegistroMercantil"]=="Ourense") echo "selected";?>>Ourense</option>
         <option value="Palencia" <?php if($colegiado["RegistroMercantil"]=="Palencia") echo "selected";?>>Palencia</option>
         <option value="Pontevedra" <?php if($colegiado["RegistroMercantil"]=="Pontevedra") echo "selected";?>>Pontevedra</option>
         <option value="Rioja (La)" <?php if($colegiado["RegistroMercantil"]=="Rioja (La)") echo "selected";?>>Rioja (La)</option>
         <option value="Salamanca" <?php if($colegiado["RegistroMercantil"]=="Salamanca") echo "selected";?>>Salamanca</option>
         <option value="Segovia" <?php if($colegiado["RegistroMercantil"]=="Segovia") echo "selected";?>>Segovia</option>
         <option value="Sevilla" <?php if($colegiado["RegistroMercantil"]=="Sevilla") echo "selected";?>>Sevilla</option>
         <option value="Soria" <?php if($colegiado["RegistroMercantil"]=="Soria") echo "selected";?>>Soria</option>
         <option value="Tarragona" <?php if($colegiado["RegistroMercantil"]=="Tarragona") echo "selected";?>>Tarragona</option>
         <option value="Teruel" <?php if($colegiado["RegistroMercantil"]=="Teruel") echo "selected";?>>Teruel</option>
         <option value="Toledo" <?php if($colegiado["RegistroMercantil"]=="Toledo") echo "selected";?>>Toledo</option>
         <option value="Valencia" <?php if($colegiado["RegistroMercantil"]=="Valencia") echo "selected";?>>Valencia</option>
         <option value="Valladolid" <?php if($colegiado["RegistroMercantil"]=="Valladolid") echo "selected";?>>Valladolid</option>
         <option value="Vizcaya" <?php if($colegiado["RegistroMercantil"]=="Vizcaya") echo "selected";?>>Vizcaya</option>
         <option value="Zamora" <?php if($colegiado["RegistroMercantil"]=="Zamora") echo "selected";?>>Zamora</option>
         <option value="Zaragoza" <?php if($colegiado["RegistroMercantil"]=="Zaragoza") echo "selected";?>>Zaragoza</option>
       </select>
            </td>
          </tr>
           <tr>
            <td width="210" height="25" align="right" class="privada">Tipo sociedad*: &nbsp;</td>
            <td height="25" align="left"><input name="tiposociedad" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["tiposociedad"])) echo $_POST["tiposociedad"]; else echo $colegiado["TipoSociedad"]; ?>"></td>
          </tr>
          <tr>
            <td width="210" height="25" align="right" class="privada">Capital social*: &nbsp;</td>
            <td height="25" align="left"><input name="capitalsocial" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["capitalsocial"])) echo $_POST["capitalsocial"]; else echo $colegiado["CapitalSocial"]; ?>"></td>
          </tr>
          <tr>
            <td width="210" height="25" align="right" class="privada">Cuenta Bancaria*: &nbsp;</td>
            <td height="25" align="left"><input name="cuenta" type="text" maxlength="25" size="25" value="<?php if(isset($_POST["cuenta"])) echo $_POST["cuenta"];  else echo $colegiado["CuentaBancaria"]; ?>"> Para domicilar las cuotas</td>
          </tr>  
          <tr>
            <td width="210">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr> 
          </table>
          
          <!-- TABLA SOCIOS -->
          
          <fieldset>
 	  	  <legend>Socios de la Sociedad Profesional</legend>
          <table width="700" style="border:none" cellpadding="0" cellspacing="0">  
          <?php
		  		$sql_c2="SELECT * FROM relSociedades WHERE relSocidad='".$_GET["id"]."' AND TipoSocio='1'";
				$con_c2=mysql_query($sql_c2) or die (mysql_error);
				
					$y=1;
					while($colegiado2=mysql_fetch_array($con_c2)) {			  	
						//numero colegiado
						echo "<tr>\n";
						echo"<td width='150' align='right'>\n N&ordm; colegiado*: \n";
						echo "</td>\n";
						echo"<td height='25' align='left'>\n";
						echo "<input name='ncolegiado".$y."' type='text' size='25' maxlengh='12' value='";
						if(isset($_POST["ncolegiado".$y])) echo $_POST["ncolegiado".$y]; else echo $colegiado2["Colegiado"];
						echo "'>";
						echo "</td>\n";
						echo"<td width='200' align='right'>\n Nombre completo*: \n";
						echo "</td>\n";
						echo"<td height='25' align='left'>\n";
						echo "<input name='nombre".$y."' type='text' size='25' maxlengh='120' value='";
						if(isset($_POST["nombre".$y])) echo $_POST["nombre".$y]; else echo $colegiado2["Nombre"];
						echo "'>";
						echo "</td>\n";
						echo"</tr>\n";				
						//cargo
						echo "<tr>\n";
						echo"<td width='150' align='right'>\n Cargo*: \n";
						echo "</td>\n";
						echo "<td height='25' align='left'>\n";
						echo "<input name='cargo".$y."' type='text' size='25' maxlengh='80' value='";
						if(isset($_POST["cargo".$y])) echo $_POST["cargo".$y]; else echo $colegiado2["Cargo"];
						echo "'>";
						echo "</td>\n";
						echo"<td width='200' align='right'>\n Participaci&oacute;n*: \n";
						echo "</td>\n";
						echo "<td height='25' align='left'>\n";
						echo "<input name='participacion".$y."' type='text' size='25' maxlengh='80' value='";
						if(isset($_POST["participacion".$y])) echo $_POST["participacion".$y]; else echo $colegiado2["CuotaParticipacion"];
						echo "'>";
						echo "</td>\n";
						
						echo"</tr>\n";				
						echo "<tr>\n
							<td width='90' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td width='120' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
						  </tr>\n";
						  $y++;
					}
					
					if($y<6) {
						for($y;$y<6;$y++) {
							//numero colegiado
						echo "<tr>\n";
						echo"<td width='150' align='right'>\n N&ordm; colegiado*: \n";
						echo "</td>\n";
						echo"<td height='25' align='left'>\n";
						echo "<input name='ncolegiado".$y."' type='text' size='25' maxlengh='12' value='";
						if(isset($_POST["ncolegiado".$y])) echo $_POST["ncolegiado".$y];
						echo "'>";
						echo "</td>\n";
						echo"<td width='200' align='right'>\n Nombre completo*: \n";
						echo "</td>\n";
						echo"<td height='25' align='left'>\n";
						echo "<input name='nombre".$y."' type='text' size='25' maxlengh='120' value='";
						if(isset($_POST["nombre".$y])) echo $_POST["nombre".$y];
						echo "'>";
						echo "</td>\n";
						echo"</tr>\n";				
						//cargo
						echo "<tr>\n";
						echo"<td width='150' align='right'>\n Cargo*: \n";
						echo "</td>\n";
						echo "<td height='25' align='left'>\n";
						echo "<input name='cargo".$y."' type='text' size='25' maxlengh='80' value='";
						if(isset($_POST["cargo".$y])) echo $_POST["cargo".$y];
						echo "'>";
						echo "</td>\n";
						echo"<td width='200' align='right'>\n Participaci&oacute;n*: \n";
						echo "</td>\n";
						echo "<td height='25' align='left'>\n";
						echo "<input name='participacion".$y."' type='text' size='25' maxlengh='80' value='";
						if(isset($_POST["participacion".$y])) echo $_POST["participacion".$y];
						echo "'>";
						echo "</td>\n";
						
						echo"</tr>\n";				
						echo "<tr>\n
							<td width='90' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td width='120' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
						  </tr>\n";	
						}
					}
			
		  ?>
          </table>
          </fieldset>
          
          <!-- TABLA EMPLEADOS -->
          
          <fieldset style="margin-top:20px">
 	  	  <legend>Trabajadores Logopedas</legend>
          <table width="580" style="border:none" cellpadding="0" cellspacing="0">  
          <?php
		  	$sql_c2="SELECT * FROM relSociedades WHERE relSocidad='".$_GET["id"]."' AND TipoSocio='2'";
			$con_c2=mysql_query($sql_c2) or die (mysql_error);
				
					$y=1;
					while($colegiado2=mysql_fetch_array($con_c2)) {		
						//numero colegiado
						echo "<tr>\n";
						echo"<td width='90' align='right'>\n N&ordm; colegiado*: \n";
						echo "</td>\n";
						echo"<td height='25' align='left'>\n";
						echo "<input name='ncolegiadoe".$y."' type='text' size='25' maxlengh='12' value='";
						if(isset($_POST["ncolegiadoe".$y])) echo $_POST["ncolegiadoe".$y]; else echo $colegiado2["Colegiado"];
						echo "'>";
						echo "</td>\n";
						echo"<td width='120' align='right'>\n Nombre completo*: \n";
						echo "</td>\n";
						echo"<td height='25' align='left'>\n";
						echo "<input name='nombree".$y."' type='text' size='25' maxlengh='120' value='";
						if(isset($_POST["nombree".$y])) echo $_POST["nombree".$y]; else echo $colegiado2["Nombre"];
						echo "'>";
						echo "</td>\n";
						echo"</tr>\n";								
						echo"</tr>\n";				
						echo "<tr>\n
							<td width='90' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td width='120' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
						  </tr>\n";
					}
					
					if($y<6) {
						for($y;$y<6;$y++) {
							//numero colegiado
							echo "<tr>\n";
							echo"<td width='90' align='right'>\n N&ordm; colegiado*: \n";
							echo "</td>\n";
							echo"<td height='25' align='left'>\n";
							echo "<input name='ncolegiadoe".$y."' type='text' size='25' maxlengh='12' value='";
							if(isset($_POST["ncolegiadoe".$y])) echo $_POST["ncolegiadoe".$y];
							echo "'>";
							echo "</td>\n";
							echo"<td width='120' align='right'>\n Nombre completo*: \n";
							echo "</td>\n";
							echo"<td height='25' align='left'>\n";
							echo "<input name='nombree".$y."' type='text' size='25' maxlengh='120' value='";
							if(isset($_POST["nombree".$y])) echo $_POST["nombree".$y];
							echo "'>";
							echo "</td>\n";
							echo"</tr>\n";								
							echo"</tr>\n";				
							echo "<tr>\n
								<td width='90' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
								<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
								<td width='120' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
								<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							  </tr>\n";
							}
					}
				
		  ?>
          </table>
          </fieldset>
          
          <!-- TABLA OTROS SOCIOS -->
          
          <fieldset style="margin-top:20px">
 	  	  <legend>Otros Socios</legend>
          <table width="580" style="border:none" cellpadding="0" cellspacing="0">  
          <?php
		  	$sql_c2="SELECT * FROM relSociedades WHERE relSocidad='".$_GET["id"]."' AND TipoSocio='3'";
			$con_c2=mysql_query($sql_c2) or die (mysql_error);
				
					$y=1;
					while($colegiado2=mysql_fetch_array($con_c2)) {	
						//numero colegiado
						echo "<tr>\n";
						echo"<td width='90' align='right'>\n DNI*: \n";
						echo "</td>\n";
						echo"<td height='25' align='left'>\n";
						echo "<input name='dni".$y."' type='text' size='25' maxlengh='12' value='";
						if(isset($_POST["dni".$y])) echo $_POST["dni".$y]; else echo $colegiado2["DNI"];
						echo "'>";
						echo "</td>\n";
						echo"<td width='120' align='right'>\n Nombre completo*: \n";
						echo "</td>\n";
						echo"<td height='25' align='left'>\n";
						echo "<input name='nombreo".$y."' type='text' size='25' maxlengh='120' value='";
						if(isset($_POST["nombreo".$y])) echo $_POST["nombreo".$y]; else echo $colegiado2["Nombre"];
						echo "'>";
						echo "</td>\n";
						echo"</tr>\n";				
						//cargo
						echo "<tr>\n";
						echo"<td width='90' align='right'>\n Cargo: \n";
						echo "</td>\n";
						echo "<td height='25' align='left'>\n";
						echo "<input name='cargoo".$y."' type='text' size='25' maxlengh='80' value='";
						if(isset($_POST["cargoo".$y])) echo $_POST["cargoo".$y]; else echo $colegiado2["Cargo"];
						echo "'>";
						echo "</td>\n";
						echo"<td width='120' align='right'>\n Participaci&oacute;n*: \n";
						echo "</td>\n";
						echo "<td height='25' align='left'>\n";
						echo "<input name='participaciono".$y."' type='text' size='25' maxlengh='80' value='";
						if(isset($_POST["participaciono".$y])) echo $_POST["participaciono".$y]; else echo $colegiado2["CuotaParticipacion"];
						echo "'>";
						echo "</td>\n";
						
						echo"</tr>\n";				
						echo "<tr>\n
							<td width='90' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td width='120' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
						  </tr>\n";
					}
					
					if($y<6) {
						for($y;$y<6;$y++) {
							//numero colegiado
							echo "<tr>\n";
						echo"<td width='90' align='right'>\n DNI*: \n";
						echo "</td>\n";
						echo"<td height='25' align='left'>\n";
						echo "<input name='dni".$y."' type='text' size='25' maxlengh='12' value='";
						if(isset($_POST["dni".$y])) echo $_POST["dni".$y];
						echo "'>";
						echo "</td>\n";
						echo"<td width='120' align='right'>\n Nombre completo*: \n";
						echo "</td>\n";
						echo"<td height='25' align='left'>\n";
						echo "<input name='nombreo".$y."' type='text' size='25' maxlengh='120' value='";
						if(isset($_POST["nombreo".$y])) echo $_POST["nombreo".$y];
						echo "'>";
						echo "</td>\n";
						echo"</tr>\n";				
						//cargo
						echo "<tr>\n";
						echo"<td width='90' align='right'>\n Cargo: \n";
						echo "</td>\n";
						echo "<td height='25' align='left'>\n";
						echo "<input name='cargoo".$y."' type='text' size='25' maxlengh='80' value='";
						if(isset($_POST["cargoo".$y])) echo $_POST["cargoo".$y];
						echo "'>";
						echo "</td>\n";
						echo"<td width='120' align='right'>\n Participaci&oacute;n*: \n";
						echo "</td>\n";
						echo "<td height='25' align='left'>\n";
						echo "<input name='participaciono".$y."' type='text' size='25' maxlengh='80' value='";
						if(isset($_POST["participaciono".$y])) echo $_POST["participaciono".$y];
						echo "'>";
						echo "</td>\n";
						
						echo"</tr>\n";				
						echo "<tr>\n
							<td width='90' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td width='120' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
							<td align='left' style='border-bottom:1px solid #CCC'>&nbsp;</td>\n
						  </tr>\n";
							}
					}
				
		  ?>
          </table>
          </fieldset>
          
          <table>                 
            <tr>
            <td height="25" colspan="2" align="center"><input type="submit" name="enviar" value="Guardar datos"></td>
            </tr>
        </table>
        <!-- fin de tabla de contenido-->
        </form>	
        </div>
       <?php
		  }
	   ?>      
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
