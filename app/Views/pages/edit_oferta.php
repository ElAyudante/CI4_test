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
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar una descripci�n para la oferta</font> \n <br>";
				  }					  
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {
				
				
				$sql="UPDATE empleo SET Titulo='".$_POST["nombre"]."',Descripcion='".$_POST["descripcion"]."', Activo='".$_POST["activo"]."' WHERE Id='".$_GET["id"]."'";		
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);			

				echo "<h1>Modificar ofertas de empleo</h1><p>Los cambios de han guardado correctamente.</p>";

			}
			else {						
				$sql_e="SELECT * FROM empleo WHERE Id='".$_GET["id"]."'";
				$con_e=mysql_query($sql_e) or die (mysql_error());
				if(mysql_num_rows($con_e)>0) {
					$evento=mysql_fetch_array($con_e);				
					
	?>
    <h1>Modificar ofertas de empleo</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="edit_oferta" action="edit_oferta.php?id=<?php echo $_GET["id"]; ?>">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="225" height="25" align="right" class="privada">Nombre de la oferta*:&nbsp;&nbsp;</td>
        <td height="25"><input name="nombre" type="text" maxlength="200" size="25" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; else echo $evento["Titulo"]; ?>"></td>
      </tr> 
      <tr>
        <td width="225" height="25" align="right" class="privada" valign="top">Descripci�n*:&nbsp;&nbsp;</td>
        <td height="25"><textarea name="descripcion" style="width:350px; height:60px"><?php if(isset($_POST["descripcion"])) echo $_POST["descripcion"]; else echo $evento["Descripcion"]; ?></textarea></td>
      </tr>   
      
      <tr>
        <td width="225" height="25" align="right" class="privada">Activo:&nbsp;&nbsp;</td>
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
					echo "<h1>Modificar ofertas de empleo</h1><p>No existe ning�n evento con esas caracter�sticas.</p>";	
				}
		} // fin if (isset($_POST['enviar']) && !$error) {	
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
