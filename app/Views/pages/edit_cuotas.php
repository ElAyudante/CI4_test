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
				  if (empty($_POST["inscripcion"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el importe de la cuota de inscripcion.</font> \n <br>";
				  }
				  
				  if (empty($_POST["ordinaria"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el importe de la cuota ordinaria.</font> \n <br>";
				  }
				  
				  if (empty($_POST["noejerciente"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar el importe de la cuota para los no ejercientes.</font> \n <br>";
				  }
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {			
				
				$sql="UPDATE cuotas SET Inscripcion='".str_replace(",",".",$_POST["inscripcion"])."', Ordinaria='".str_replace(",",".",$_POST["ordinaria"])."', NoEjerciente='".str_replace(",",".",$_POST["noejerciente"])."', Jubilados='".str_replace(",",".",$_POST["jubilados"])."', Estuaiantes='".str_replace(",",".",$_POST["estudiantes"])."' WHERE Id='1'";		
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);			

				echo "<h1>Modificar Cuotas</h1><p>Los cambios de han guardado correctamente.</p>";

			}
			else {						
				$sql_e="SELECT * FROM cuotas WHERE Id='1'";
				$con_e=mysql_query($sql_e) or die (mysql_error());
				if(mysql_num_rows($con_e)>0) {
					$docu=mysql_fetch_array($con_e);				
					
	?>
    <h1>Modificar Cuotas</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="edit_cuotas" action="edit_cuotas.php">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Inscripcion*:&nbsp;&nbsp;</td>
        <td height="25"><input name="inscripcion" type="text" maxlength="8" size="8" value="<?php if(isset($_POST["inscripcion"])) echo $_POST["inscripcion"]; else echo $docu["Inscripcion"]; ?>"> &euro;</td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">Cuota ordinaria*:&nbsp;&nbsp;</td>
        <td height="25"><input name="ordinaria" type="text" maxlength="8" size="8" value="<?php if(isset($_POST["ordinaria"])) echo $_POST["ordinaria"]; else echo $docu["Ordinaria"]; ?>"> &euro;</td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada">No Ejercientes*:&nbsp;&nbsp;</td>
        <td height="25"><input name="noejerciente" type="text" maxlength="8" size="8" value="<?php if(isset($_POST["noejerciente"])) echo $_POST["noejerciente"]; else echo $docu["NoEjerciente"]; ?>"> &euro;</td>
      </tr>     
      <tr>
        <td width="200" height="25" align="right" class="privada">Jubilados*:&nbsp;&nbsp;</td>
        <td height="25"><input name="jubilados" type="text" maxlength="8" size="8" value="<?php if(isset($_POST["jubilados"])) echo $_POST["jubilados"]; else echo $docu["Jubilados"]; ?>"> &euro;</td>
      </tr>     
      <tr>
        <td width="200" height="25" align="right" class="privada">Estudiantes*:&nbsp;&nbsp;</td>
        <td height="25"><input name="estudiantes" type="text" maxlength="8" size="8" value="<?php if(isset($_POST["estudiantes"])) echo $_POST["estudiantes"]; else echo $docu["Estudiantes"]; ?>"> &euro;</td>
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
					echo "<h1>Modificar coutas</h1><p>Se ha producido un error. Pongase en contacto con el administrador del sistema.</p>";	
				}
		} // fin if (isset($_POST['enviar']) && !$error) {	
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
