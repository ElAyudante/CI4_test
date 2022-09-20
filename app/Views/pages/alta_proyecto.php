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
				
				$sql="INSERT INTO proyectos VALUES ('','".$_POST["nombre"]."','".$_POST["descripcion"]."')";	
				$consulta=mysql_query($sql);								

				echo "<h1>Alta de proyectos</h1><p>El proyecto ha sido dado de alta correctamente.</p>";

			}
			else {						
				
					
	?>
    <h1>Alta de proyectos</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="alta_proyecto" action="alta_proyecto.php" enctype="multipart/form-data">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="225" height="25" align="right" class="privada">Nombre del Proyecto*:&nbsp;&nbsp;</td>
        <td height="25"><input name="nombre" type="text" maxlength="200" size="25" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; ?>"></td>
      </tr> 
      <tr>
        <td width="225" height="25" align="right" class="privada" valign="top">Texto*:&nbsp;&nbsp;</td>
        <td height="25"><textarea name="descripcion" style="width:350px; height:60px"><?php if(isset($_POST["descripcion"])) echo $_POST["descripcion"]; ?></textarea></td>
      </tr>    
      <tr>
        <td height="25" colspan="2" align="center">&nbsp;</td>
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
