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
	  	
			//VALIDAMOS EL FORMULARIO
$error ="";

			if (isset($_POST["enviar"])) {

				  $SQL_1="SELECT Id FROM sociedades WHERE NIF LIKE '".str_replace(" ","",$_POST["nif"])."'";
				  $res_SQL_1=mysql_query($SQL_1) or die (mysql_error());
				  if (mysql_num_rows($res_SQL_1) > 0) {
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Ya est&aacute; registrado como Sociedad Profesional</font> \n <br>";
				  }							  
				  
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
				  
				  if (empty($_POST["ncolegiado1"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar al menos los datos de uno de los socios.</font> \n <br>";
				  }	
				 
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {
				
				$num_inscrito=@proximo_registro($bd_base,"sociedades");
				
				//INGRESO LOS DATOS DE LA SOCIEDAD
				$sql="INSERT INTO sociedades VALUES ('', '".$_POST["num_colegiado"]."', '".$_POST["nombre"]."', '".$_POST["nif"]."', '".$_POST["direccion"]."', '".$_POST["cp"]."', '".$_POST["localidad"]."', '".$_POST["provincia"]."', '".$_POST["tlf"]."', '".$_POST["fax"]."', '".$_POST["mail"]."', '".$_POST["registromercantil"]."', '".$_POST["tiposociedad"]."', '".$_POST["capitalsocial"]."', '".$_POST["cuenta"]."', '".date("Y-m-d")."')";	
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);	
				
				// A�ADO LOS DATOS DE LOS SOCIOS
				for($o=1;$o<5;$o++) {
					if(!empty($_POST["ncolegiado".$o])) {
						$sql2="INSERT INTO relSociedades VALUES ('', '$num_inscrito','1','".$_POST["ncolegiado".$o]."','".$_POST["nombre".$o]."','','".$_POST["cargo".$o]."','".$_POST["participacion".$o]."')";
						$con2=mysql_query($sql2) or die (mysql_error());
					}
				}
				
				// A�ADO LOS DATOS DE LOS colegiados empleados
				for($o=1;$o<5;$o++) {
					if(!empty($_POST["ncolegiadoe".$o])) {
						$sql3="INSERT INTO relSociedades VALUES ('', '$num_inscrito','2','".$_POST["ncolegiadoe".$o]."','".$_POST["nombree".$o]."','','','')";
						$con3=mysql_query($sql3) or die (mysql_error());
					}
				}
				
				// A�ADO LOS DATOS DE LOS OTROS SOCIOS
				for($o=1;$o<5;$o++) {
					if(!empty($_POST["nombreo".$o])) {
						$sql4="INSERT INTO relSociedades VALUES ('', '$num_inscrito','3','','".$_POST["nombreo".$o]."','".$_POST["dni".$o]."','".$_POST["cargoo".$o]."','".$_POST["participaciono".$o]."')";
						$con4=mysql_query($sql4) or die (mysql_error());
					}
				}
				
				
				echo "La Sociedad se ha guardado correctamente.";
				
				
			}
			else {
			
		  ?>       
          <div align="center">
          
			 
		  	  <?php  if (isset($error)) { echo "<p style='float:left; text-align:left; clear:both'>".$error."</p>"; }	  ?>
        <form method="post" name="alta_colegiado" action="alta_sociedades.php">
        <table width="580" style="border:none" cellpadding="0" cellspacing="0">      
           <tr>
            <td width="150">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
         
          <tr>
            <td width="150" height="25" align="right" class="privada">N&uacute;m Colegiada*:&nbsp;&nbsp;</td>
            <td height="25" align="left"><input name="num_colegiado" type="text" maxlength="10" size="10" value="<?php if(isset($_POST["num_colegiado"])) echo $_POST["num_colegiado"]; ?>"></td>
          </tr>
          <tr>
            <td width="150" height="25" align="right" class="privada">Denominaci&oacute;n social*:&nbsp;&nbsp;</td>
            <td height="25" align="left"><input name="nombre" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; ?>"></td>
          </tr>
          <tr>
            <td width="150" height="25" align="right" class="privada">NIF/DNI/CIF*: &nbsp;</td>
            <td height="25" align="left"><input name="nif" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nif"])) echo $_POST["nif"] ?>"></td>
          </tr>
          <tr>
            <td width="150" height="25" align="right" class="privada">Direcci&oacute;n*: &nbsp;</td>
            <td height="25" align="left"><input name="direccion" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["direccion"])) echo $_POST["direccion"] ?>"></td>
          </tr>
          <tr>
            <td width="150" height="25" align="right" class="privada">Localidad*: &nbsp;</td>
            <td height="25" align="left"><input name="localidad" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["localidad"])) echo $_POST["localidad"] ?>">
            &nbsp;&nbsp;&nbsp; C&oacute;digo Posta<span class="privada">l*</span>:
            <input name="cp" type="text" size="5" maxlength="5" value="<?php if(isset($_POST["cp"])) echo $_POST["cp"] ?>" /></td>
          </tr>
          <tr>
            <td width="150" height="25" align="right" class="privada">Provincia*: &nbsp;</td>
            <td height="25" align="left">
            <select name="provincia" tabindex="1">
             <option value="0" >Seleccione la provincia</option>
             <option value="Alava" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Alava") echo "selected";?>>Alava</option>
             <option value="Albacete" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Albacete") echo "selected";?>>Albacete</option>
             <option value="Alicante" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Alicante") echo "selected";?>>Alicante</option>
             <option value="Almer&iacute;a" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Almer&iacute;a") echo "selected";?>>Almer&iacute;a</option>
             <option value="Asturias" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Asturias") echo "selected";?>>Asturias</option>
             <option value="Avila" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Avila") echo "selected";?>>Avila</option>
             <option value="Badajoz" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Badajoz") echo "selected";?>>Badajoz</option>
             <option value="Balears (Illes)" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Balears (Illes)") echo "selected";?>>Balears (Illes)</option>
             <option value="Barcelona" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Barcelona") echo "selected";?>>Barcelona</option>
             <option value="Burgos" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Burgos") echo "selected";?>>Burgos</option>
             <option value="C&aacute;ceres" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="C&aacute;ceres") echo "selected";?>>C&aacute;ceres</option>
             <option value="C&aacute;diz" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="C&aacute;diz") echo "selected";?>>C&aacute;diz</option>
              <option value="Canarias" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Canarias") echo "selected";?>>Canarias</option>
             <option value="Cantabria" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Cantabria") echo "selected";?>>Cantabria</option>
             <option value="Castell&oacute;n" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Castell&oacute;n") echo "selected";?>>Castell&oacute;n</option>
             <option value="Ciudad Real" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Ciudad Real") echo "selected";?>>Ciudad Real</option>
             <option value="C&oacute;rdoba" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="C&oacute;rdoba") echo "selected";?>>C&oacute;rdoba</option>
             <option value="Coru&ntilde;a (A)" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Coru&ntilde;a (A)") echo "selected";?>>Coru&ntilde;a (A)</option>
             <option value="Cuenca" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Cuenca") echo "selected";?>>Cuenca</option>
             <option value="Girona" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Girona") echo "selected";?>>Girona</option>
             <option value="Granada" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Granada") echo "selected";?>>Granada</option>
             <option value="Guadalajara" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Guadalajara") echo "selected";?>>Guadalajara</option>
             <option value="Guip&uacute;zcoa" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Guip&uacute;zcoa") echo "selected";?>>Guip&uacute;zcoa</option>
             <option value="Huelva" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Huelva") echo "selected";?>>Huelva</option>
             <option value="Huesca" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Huesca") echo "selected";?>>Huesca</option>
             <option value="Ja&eacute;n" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Ja&eacute;n") echo "selected";?>>Ja&eacute;n</option>
             <option value="Le&oacute;n" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Le&oacute;n") echo "selected";?>>Le&oacute;n</option>
             <option value="Lleida" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Lleida") echo "selected";?>>Lleida</option>
             <option value="Lugo" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Lugo") echo "selected";?>>Lugo</option>
             <option value="Madrid" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="Madrid") echo "selected";?>>Madrid</option>
             <option value="M&aacute;laga" <?php if(isset($_POST["provincia"]) && $_POST["provincia"]=="M&aacute;laga") echo "selected";?>>M&aacute;laga</option>
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
            <td width="150" height="25" align="right" class="privada">Tel&eacute;fono*: &nbsp;</td>
            <td height="25" align="left"><input name="tlf" type="text" maxlength="12" size="25" value="<?php if(isset($_POST["tlf"])) echo $_POST["tlf"] ?>"></td>
          </tr> 
          <tr>
            <td width="150" height="25" align="right" class="privada">Fax: &nbsp;</td>
            <td height="25" align="left"><input name="fax" type="text" maxlength="12" size="25" value="<?php if(isset($_POST["fax"])) echo $_POST["fax"] ?>"></td>
          </tr>        
          <tr>
            <td width="150" height="25" align="right" class="privada">Email*: &nbsp;</td>
            <td height="25" align="left"><input name="mail" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"] ?>"></td>
          </tr>
          <tr>
            <td width="150" height="25" align="right" class="privada">Reg. mercantil de*: &nbsp;</td>
            <td height="25" align="left">
            <select name="registromercantil" tabindex="1">
             <option value="0" >Seleccione la provincia</option>
             <option value="Alava" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Alava") echo "selected";?>>Alava</option>
             <option value="Albacete" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Albacete") echo "selected";?>>Albacete</option>
             <option value="Alicante" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Alicante") echo "selected";?>>Alicante</option>
             <option value="Almer&iacute;a" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Almer&iacute;a") echo "selected";?>>Almer&iacute;a</option>
             <option value="Asturias" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Asturias") echo "selected";?>>Asturias</option>
             <option value="Avila" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Avila") echo "selected";?>>Avila</option>
             <option value="Badajoz" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Badajoz") echo "selected";?>>Badajoz</option>
             <option value="Balears (Illes)" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Balears (Illes)") echo "selected";?>>Balears (Illes)</option>
             <option value="Barcelona" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Barcelona") echo "selected";?>>Barcelona</option>
             <option value="Burgos" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Burgos") echo "selected";?>>Burgos</option>
             <option value="C&aacute;ceres" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="C&aacute;ceres") echo "selected";?>>C&aacute;ceres</option>
             <option value="C&aacute;diz" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="C&aacute;diz") echo "selected";?>>C&aacute;diz</option>
              <option value="Canarias" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Canarias") echo "selected";?>>Canarias</option>
             <option value="Cantabria" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Cantabria") echo "selected";?>>Cantabria</option>
             <option value="Castell&oacute;n" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Castell&oacute;n") echo "selected";?>>Castell&oacute;n</option>
             <option value="Ciudad Real" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Ciudad Real") echo "selected";?>>Ciudad Real</option>
             <option value="C&oacute;rdoba" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="C&oacute;rdoba") echo "selected";?>>C&oacute;rdoba</option>
             <option value="Coru&ntilde;a (A)" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Coru&ntilde;a (A)") echo "selected";?>>Coru&ntilde;a (A)</option>
             <option value="Cuenca" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Cuenca") echo "selected";?>>Cuenca</option>
             <option value="Girona" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Girona") echo "selected";?>>Girona</option>
             <option value="Granada" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Granada") echo "selected";?>>Granada</option>
             <option value="Guadalajara" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Guadalajara") echo "selected";?>>Guadalajara</option>
             <option value="Guip&uacute;zcoa" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Guip&uacute;zcoa") echo "selected";?>>Guip&uacute;zcoa</option>
             <option value="Huelva" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Huelva") echo "selected";?>>Huelva</option>
             <option value="Huesca" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Huesca") echo "selected";?>>Huesca</option>
             <option value="Ja&eacute;n" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Ja&eacute;n") echo "selected";?>>Ja&eacute;n</option>
             <option value="Le&oacute;n" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Le&oacute;n") echo "selected";?>>Le&oacute;n</option>
             <option value="Lleida" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Lleida") echo "selected";?>>Lleida</option>
             <option value="Lugo" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Lugo") echo "selected";?>>Lugo</option>
             <option value="Madrid" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Madrid") echo "selected";?>>Madrid</option>
             <option value="M&aacute;laga" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="M&aacute;laga") echo "selected";?>>M&aacute;laga</option>
             <option value="Murcia" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Murcia") echo "selected";?>>Murcia</option>
             <option value="Navarra" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Navarra") echo "selected";?>>Navarra</option>
             <option value="Ourense" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Ourense") echo "selected";?>>Ourense</option>
             <option value="Palencia" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Palencia") echo "selected";?>>Palencia</option>
             <option value="Pontevedra" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Pontevedra") echo "selected";?>>Pontevedra</option>
             <option value="Rioja (La)" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Rioja (La)") echo "selected";?>>Rioja (La)</option>
             <option value="Salamanca" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Salamanca") echo "selected";?>>Salamanca</option>
             <option value="Segovia" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Segovia") echo "selected";?>>Segovia</option>
             <option value="Sevilla" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Sevilla") echo "selected";?>>
               Sevilla</option>
             <option value="Soria" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Soria") echo "selected";?>>Soria</option>
             <option value="Tarragona" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Tarragona") echo "selected";?>>Tarragona</option>
             <option value="Teruel" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Teruel") echo "selected";?>>Teruel</option>
             <option value="Toledo" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Toledo") echo "selected";?>>Toledo</option>
             <option value="Valencia" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Valencia") echo "selected";?>>Valencia</option>
             <option value="Valladolid" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Valladolid") echo "selected";?>>Valladolid</option>
             <option value="Vizcaya" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Vizcaya") echo "selected";?>>Vizcaya</option>
             <option value="Zamora" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Zamora") echo "selected";?>>Zamora</option>
             <option value="Zaragoza" <?php if(isset($_POST["registromercantil"]) && $_POST["registromercantil"]=="Zaragoza") echo "selected";?>>Zaragoza</option>
           </select>
            </td>
          </tr>
           <tr>
            <td width="150" height="25" align="right" class="privada">Tipo sociedad*: &nbsp;</td>
            <td height="25" align="left"><input name="tiposociedad" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["tiposociedad"])) echo $_POST["tiposociedad"] ?>"></td>
          </tr>
          <tr>
            <td width="150" height="25" align="right" class="privada">Capital social*: &nbsp;</td>
            <td height="25" align="left"><input name="capitalsocial" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["capitalsocial"])) echo $_POST["capitalsocial"] ?>"></td>
          </tr>
          <tr>
            <td width="150" height="25" align="right" class="privada">Cuenta Bancaria*: &nbsp;</td>
            <td height="25" align="left"><input name="cuenta" type="text" maxlength="25" size="25" value="<?php if(isset($_POST["cuenta"])) echo $_POST["cuenta"] ?>"> Para domicilar las cuotas</td>
          </tr>  
          <tr>
            <td width="150">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr> 
          </table>
          
          <!-- TABLA SOCIOS -->
          
          <fieldset>
 	  	  <legend>Socios de la Sociedad Profesional</legend>
          <table width="580" style="border:none" cellpadding="0" cellspacing="0">  
          <?php
		  	for($y=1;$y<5;$y++) {
				//numero colegiado
				echo "<tr>\n";
				echo"<td width='90' align='right'>\n N&ordm; colegiado*: \n";
				echo "</td>\n";
				echo"<td height='25' align='left'>\n";
				echo "<input name='ncolegiado".$y."' type='text' size='25' maxlengh='12' value='";
				if(isset($_POST["ncolegiado".$y])) echo $_POST["ncolegiado".$y];
				echo "'>";
				echo "</td>\n";
				echo"<td width='120' align='right'>\n Nombre completo*: \n";
				echo "</td>\n";
				echo"<td height='25' align='left'>\n";
				echo "<input name='nombre".$y."' type='text' size='25' maxlengh='120' value='";
				if(isset($_POST["nombre".$y])) echo $_POST["nombre".$y];
				echo "'>";
				echo "</td>\n";
				echo"</tr>\n";				
				//cargo
				echo "<tr>\n";
				echo"<td width='90' align='right'>\n Cargo*: \n";
				echo "</td>\n";
				echo "<td height='25' align='left'>\n";
				echo "<input name='cargo".$y."' type='text' size='25' maxlengh='80' value='";
				if(isset($_POST["cargo".$y])) echo $_POST["cargo".$y];
				echo "'>";
				echo "</td>\n";
				echo"<td width='120' align='right'>\n Participaci&oacute;n*: \n";
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
		  ?>
          </table>
          </fieldset>
          
          <!-- TABLA EMPLEADOS -->
          
          <fieldset style="margin-top:20px">
 	  	  <legend>Trabajadores Logopedas</legend>
          <table width="580" style="border:none" cellpadding="0" cellspacing="0">  
          <?php
		  	for($y=1;$y<5;$y++) {
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
		  ?>
          </table>
          </fieldset>
          
          <!-- TABLA OTROS SOCIOS -->
          
          <fieldset style="margin-top:20px">
 	  	  <legend>Otros Socios</legend>
          <table width="580" style="border:none" cellpadding="0" cellspacing="0">  
          <?php
		  	for($y=1;$y<5;$y++) {
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
		  ?>
          </table>
          </fieldset>
          
           <table width="580" style="border:none" cellpadding="0" cellspacing="0">  
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
