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
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar una descripci�n para el evento</font> \n <br>";
				  }	
				  
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {
				
				//guardo el fichero si existe y le asigno un nombre
				if(!empty($_FILES["file"]["name"])) {
					$dir="../eventos/";	
					//obtengo la extensi�n del archivo
					$extension=explode(".",$_FILES["file"]["name"]);
				  $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
				  $referencia = "";
				  for($i=0;$i<19;$i++) {
				  $referencia .= substr($str,rand(0,62),1);
				  }
				  $nombre_archivo=$referencia.".".$extension[1];
				  if(move_uploaded_file($_FILES["file"]['tmp_name'], $dir.$_FILES["file"]['name'])) {		
					chmod($dir.$_FILES["file"]["name"], 0777);  		
					rename( $dir.$_FILES["file"]["name"], $dir.$nombre_archivo);				
				  } 
				}
				
				$sql="UPDATE eventos SET Evento='".$_POST["nombre"]."',Descripcion='".$_POST["descripcion"]."'";
				if(!empty($_FILES["file"]["name"])) $sql.=",Archivo='".$nombre_archivo."'";
				$sql.=",ImporteColegiados='".str_replace(",",".",$_POST["precio"])."',ImporteNoEjercientes='".str_replace(",",".",$_POST["precioNoEjercientes"])."',ImporteAsociaciones='".str_replace(",",".",$_POST["precioAsociaciones"])."',NoColegiados='".str_replace(",",".",$_POST["precioNoColegiados"])."', Activo='".$_POST["activo"]."' WHERE Id='".$_GET["id"]."'";		
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);			

				echo "<h1>Modificar eventos</h1><p>Los cambios de han guardado correctamente.</p>";

			}
			else {						
				$sql_e="SELECT * FROM eventos WHERE Id='".$_GET["id"]."'";
				$con_e=mysql_query($sql_e) or die (mysql_error());
				if(mysql_num_rows($con_e)>0) {
					$evento=mysql_fetch_array($con_e);				
					
	?>
    <h1>Modificar eventos</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="edit_evento" action="edit_evento.php?id=<?php echo $_GET["id"]; ?>" enctype="multipart/form-data">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="320" height="35" align="right" class="privada">Nombre del Evento*:&nbsp;&nbsp;</td>
        <td height="25"><input name="nombre" type="text" maxlength="200" size="55" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; else echo $evento["Evento"]; ?>"></td>
      </tr> 
      <tr>
        <td width="320" height="35" align="right" class="privada" valign="top">Descripci�n*:&nbsp;&nbsp;</td>
        <td height="25"><textarea name="descripcion" style="width:365px; height:65px"><?php if(isset($_POST["descripcion"])) echo $_POST["descripcion"]; else echo $evento["Descripcion"]; ?></textarea></td>
      </tr>   
      <tr>
        <td width="320" height="40" align="right" class="privada" valign="top">Archivo Adjunto:&nbsp;&nbsp;</td>
        <td height="40">
        <?php
			if(!empty($evento["Archivo"]) && file_exists("../eventos/".$evento["Archivo"])) {
				echo "<a href='../eventos/".$evento["Archivo"]."' target='_blank'>Ver archivo</a>&nbsp;\n";
			}
		?>	
        <input type="file" name="file" /></td>
      </tr>  
      <tr>
        <td width="320" height="35" align="right" class="privada">Colegiados ejercientes*:&nbsp;&nbsp;</td>
        <td height="25"><input name="precio" type="text" size="8" maxlength="8" value="<?php if(isset($_POST["precio"])) echo $_POST["precio"]; else echo $evento["ImporteColegiados"]; ?>"/> �</td>
      </tr> 
      <tr>
        <td width="320" height="35" align="right" class="privada">No ejercientes y otros colegios*:&nbsp;&nbsp;</td>
        <td height="25"><input name="precioNoEjercientes" type="text" size="8" maxlength="8" value="<?php if(isset($_POST["precioNoEjercientes"])) echo $_POST["precioNoEjercientes"]; else echo $evento["ImporteNoEjercientes"]; ?>"/> �</td>
      </tr> 
      <tr>
        <td width="320" height="35" align="right" class="privada">Alumnos logopedia*:&nbsp;&nbsp;</td>
        <td height="25"><input name="precioAsociaciones" type="text" size="8" maxlength="8" value="<?php if(isset($_POST["precioAsociaciones"])) echo $_POST["precioAsociaciones"]; else echo $evento["ImporteAsociaciones"]; ?>"/> �</td>
      </tr> 
      <tr>
        <td width="320" height="35" align="right" class="privada">Logopedas no colegiados*:&nbsp;&nbsp;</td>
        <td height="25"><input name="precioNoColegiados" type="text" size="8" maxlength="8" value="<?php if(isset($_POST["precioNoColegiados"])) echo $_POST["precioNoColegiados"]; else echo $evento["NoColegiados"]; ?>"/> �</td>
      </tr> 
      <tr>
        <td width="320" height="45" align="right" class="privada">Activo:&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="activo" id="activosi" value="1" <?php if((isset($_POST["activo"]) && $_POST["activo"]==1)|| $evento["Activo"]==1) echo 'checked="checked"'; ?>/> <label for="activosi">Si</label> &nbsp;<input type="radio" name="activo" id="activono" value="0" <?php if((isset($_POST["activo"]) && $_POST["activo"]==0)|| $evento["Activo"]==0) echo 'checked="checked"'; ?>/> <label for="activono">No</label></td>
      </tr>    
      <tr>
        <td height="25" colspan="2" align="center"><input type="submit" name="enviar" value="Guardar cambios"></td>
        </tr>
    </table>

	<!-- fin de tabla de contenido-->
	</form>	

    <?php	
				} 
				else {
					echo "<h1>Modificar eventos</h1><p>No existe ning�n evento con esas caracter�sticas.</p>";	
				}
		} // fin if (isset($_POST['enviar']) && !$error) {	
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
