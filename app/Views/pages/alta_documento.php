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
				  
				  if (empty($_FILES["file"]["name"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe a�adir el fichero correspondiente</font> \n <br>";
				  }	
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {
				
				//guardo el fichero si existe y le asigno un nombre
				if(!empty($_FILES["file"]["name"])) {
					if($_POST["publico"]==1) {
						$dir="../doc_publicos/";
					}
					else{
						$dir="../docs/";	
					}
					
				  move_uploaded_file($_FILES["file"]['tmp_name'], $dir.$_FILES["file"]['name']);
				}
				
				$sql="INSERT INTO documentos VALUES ('','".$_POST["nombre"]."'";
				if(!empty($_FILES["file"]["name"])) $sql.=",'".$_FILES["file"]["name"]."'"; else $sql.=",''";
				$sql.=", '".$_POST["publico"]."')";		
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);			

				echo "<h1>Alta de documentos</h1><p>El documento ha sido dado de alta correctamente.</p>";
				if($_POST["publico"]==1) {
					echo "<p>Puede utilizar el siguiente c�digo para poner un enlace hacia documento que acaba de guardar:<br>&nbsp;<br><strong> &lt;a href='http://www.logopedascantabria.org/doc_publicos/".$_FILES["file"]["name"]."' target='_blank'&gt;".$_POST["nombre"]."&lt;/a&gt;</strong></p>";	
				}
			}
			else {						
				
					
	?>
    <h1>Alta de documentos</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="alta_documento" action="alta_documento.php" enctype="multipart/form-data">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Nombre documento*:&nbsp;&nbsp;</td>
        <td height="25"><input name="nombre" type="text" maxlength="200" size="25" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; ?>"></td>
      </tr>       
      <tr>
        <td width="200" height="25" align="right" class="privada">Archivo Adjunto*:&nbsp;&nbsp;</td>
        <td height="25"><input type="file" name="file" /></td>
      </tr>        
      <tr>
        <td width="200" height="25" align="right" class="privada">Tipo de archivo:&nbsp;&nbsp;</td>
        <td height="25"><input type="radio" name="publico" id="activosi" value="1" checked="checked"/> <label for="activosi">P�blico</label> &nbsp;<input type="radio" name="publico" id="activono" value="0" <?php if((isset($_POST["publico"]) && $_POST["publico"]==0)) echo 'checked="checked"'; ?>/> <label for="activono">Privado</label> &nbsp;<input type="radio" name="publico" id="convenio" value="2" <?php if((isset($_POST["publico"]) && $_POST["publico"]==2)) echo 'checked="checked"'; ?>/> <label for="convenio">Convenio</label></td>
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
