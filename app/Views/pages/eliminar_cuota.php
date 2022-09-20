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
			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar'])) {
				
				$sql="DELETE FROM estadocobrocuotas WHERE relCuota='".$_POST["cuota"]."'";
				$con=mysql_query($sql) or die (mysql_error());
				
				$sql2="DELETE FROM cobroscuotas WHERE Id='".$_POST["cuota"]."'";
				$con2=mysql_query($sql2) or die (mysql_error());
				
				$mensaje=" <h1>Eliminar cuotas</h1> <p>La couta se ha borrado correctamente.</p>";
				
				echo $mensaje;

			}
			else {						
				
					
	?>
    <h1>Eliminar cuotas</h1>
    <form method="post" action="eliminar_cuota.php" name="estado_cuota">
	<table width="600" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="250">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="250" height="25" align="right" class="privada">Cuota a borrar:</td>
        <td height="25" align="right">
        <?php
        $concat="SELECT * FROM cobroscuotas ORDER BY Id DESC";
		$concat=mysql_query($concat) or die (mysql_error());
		if (mysql_num_rows($concat)>0) {
			echo '<select name="cuota">
						<option>Seleccion la cuota que quiere eliminar</option>';
			while($cat=mysql_fetch_array($concat)) {
				echo "<option value='".$cat["Id"]."' ";
				if(isset($_GET["c"])) if($cat["Id"]==$_GET["c"]) echo "selected";
				echo ">".$cat["Descripcion"]."</option> \n";
			}
			echo '</select> ';
		}
		?>
		</td>
      </tr>         
      <tr>
        <td width="250">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="250" >&nbsp;</td>
        <td align="right"><input name="enviar" value="Borrar cuota" type="submit" /></td>
      </tr>    
      <tr>
        <td height="25" colspan="2" align="center">&nbsp;</td>
      </tr>
    </table>
    </form>

	<!-- fin de tabla de contenido-->
    <?php
			
		} // fin if (isset($_POST['enviar']) && !$error) {	
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
