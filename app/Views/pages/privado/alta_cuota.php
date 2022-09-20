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
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {
				$colegiados = array();
				$num_cuota=proximo_registro($bd_base,"cobroscuotas");
				
				$sql="INSERT INTO cobroscuotas VALUES ('','".$_POST["nombre"]."','".$_POST["anio"]."')";		
				$consulta=mysql_query($sql) or die(mysql_error());/*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/
				
				//OBTENGO TODOS LOS COLEGIADOS PARA A�ADIRLES A LA BASE DE DATOS COMO COBRADOS
				$sql_col="SELECT Id, Ejerciente FROM colegiados WHERE Activo='1' ORDER BY Id";
				$con_col=mysql_query($sql_col) or die (mysql_error());
				if(mysql_num_rows($con_col)>0) {
					while($colegiado=mysql_fetch_array($con_col)){
						$colegiados[]=$colegiado["Id"];
						if($colegiado["Ejerciente"]==2) $jubilados[]=$colegiado["Id"];
					}
				}
				// GRABO A CADA COLEGIADO CON LA COUTA PAGADA
				for($l=0;$l<count($colegiados);$l++) {
					
					$sql_cuot="SELECT * FROM cuotas WHERE Id='1'";
					$con_cuot=mysql_query($sql_cuot);
					$importes_cuotas=mysql_fetch_array($con_cuot);
					
					$sql_co="SELECT Ejerciente FROM colegiados WHERE Id='".$colegiados[$l]."'";
					$con_co=mysql_query($sql_co) or die (mysql_error());
					$si_ejerciente=mysql_fetch_array($con_co);
					
					if($si_ejerciente["Ejerciente"]==1) $precio_cuot=$importes_cuotas["Ordinaria"];
					elseif($si_ejerciente["Ejerciente"]==2) $precio_cuot=$importes_cuotas["Jubilados"];
					elseif($si_ejerciente["Ejerciente"]==3) $precio_cuot=$importes_cuotas["Estudiantes"];
					else $precio_cuot=$importes_cuotas["NoEjerciente"];
					
					if(!in_array($colegiados[$l],$jubilados)) {					
						$sql_cobrado="INSERT INTO estadocobrocuotas VALUES ('', '".$colegiados[$l]."', '$num_cuota','1','".$precio_cuot."');";	
						$con_cobrado=mysql_query($sql_cobrado) or die (mysql_error());
					}
				}				
				echo "<h1>Alta de cuoas de colegiado</h1><p>El registro ha sido dado de alta correctamente.<br> Esta cuota se ha asignado a cada colegiado como COBRADA.</p>";

			}
			else {						
				
					
	?>
    <h1>Alta de cuotas de colegiado</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="alta_cuota" action="alta_cuota.php">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="225" height="25" align="right" class="privada">Año:&nbsp;&nbsp;</td>
        <td height="25"><select name="anio">
        	<?php				
				for($an=2011;$an<=(date("Y")+1);$an++) {
					echo "<option value='".$an."'>".$an."</option>\n";
				}				
			?>
        </select></td>
      </tr>
      <tr>
      <tr>
        <td width="225" height="25" align="right" class="privada">Cuota*:&nbsp;&nbsp;</td>
        <td height="25"><input name="nombre" type="text" maxlength="200" size="25" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; ?>">&nbsp; P.ej. Cuota 3er trimestre 2011</td>
      </tr>
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>    
      <tr>
        <td height="25" colspan="2" align="center"><input type="submit" name="enviar" value="Dar de alta"></td>
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
