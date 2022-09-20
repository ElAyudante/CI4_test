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
   <h1>Mensajes</h1>
    <?php 
			// VALIDAR FORMULARIO
			$error ="";

			if (isset($_POST["enviar"])) {				 				  
				  
				  if (empty($_POST["mensaje"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe escribir el mensaje que desea enviar</font> \n <br>";
				  }				  
			}

			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {				
				
				$sql_men="INSERT INTO respuestas VALUES ('', '".$_GET["mensaje"]."', '".$_SESSION['id_usuario']."', '".$_POST["mensaje"]."', '".date("Y-m-d H:i:s")."', '0','')";
				$con_men=mysql_query($sql_men) or die (mysql_error());				
				
				
				echo "<p>Tu mensaje se ha enviado correctamente.</p>";

			}
			else {																		
	
			if ($error) { echo "<p>".$error."</p>"; }
	
			$sql_mensaje="SELECT * FROM mensajes WHERE Id='".$_GET["mensaje"]."'";
			$con_mensaje=mysql_query($sql_mensaje);			
			if(mysql_num_rows($con_mensaje)>0) {
				$estado=mysql_fetch_array($con_mensaje);	
				
			}
	?>
	<form method="post" name="respuesta" action="respuesta.php?mensaje=<?php echo $_GET["mensaje"]; ?>">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Asunto*:&nbsp;&nbsp;</td>
        <td height="25"><input name="asunto" type="text" maxlength="255" size="50" value="<?php echo "Re: ".$estado["Asunto"]; ?>" disabled="disabled"> </td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" valign="top" class="privada">Mensaje*:&nbsp;&nbsp;</td>
        <td height="25"><textarea name="mensaje" rows="6" cols="40"><?php if(isset($_POST["mensaje"])) echo $_POST["mensaje"]; ?></textarea> </td>
      </tr>       
         
      <tr>
        <td height="25" colspan="2" align="center"><input type="submit" name="enviar" value="Enviar"></td>
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
