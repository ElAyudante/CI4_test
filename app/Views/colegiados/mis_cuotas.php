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
   <h1>Estado de mis coutas</h1>
    <?php
		// obtengo el precio de las cuotas
			$sql_cuotas="SELECT * FROM cuotas";
			$con_cuotas=mysql_query($sql_cuotas) or die (mysql_error());
			$importe_cuotas=mysql_fetch_array($con_cuotas);
		
	  		$sql_ecu="SELECT colegiados.Apellidos, colegiados.Ejerciente, cobroscuotas.*, estadocobrocuotas.Estado, estadocobrocuotas.Importe FROM colegiados, cobroscuotas, estadocobrocuotas WHERE colegiados.Id=".$_SESSION['id_usuario']." AND estadocobrocuotas.relColegiado='".$_SESSION['id_usuario']."' AND cobroscuotas.Id=estadocobrocuotas.relCuota ORDER BY cobroscuotas.Id";
			
			$con_ecu=mysql_query($sql_ecu) or die (mysql_error());
			if(mysql_num_rows($con_ecu)>0) {					
				echo "<table width='700' style='border:none' cellpadding='0' cellspacing='0'>\n";
				echo "<tr bgcolor='#CCCCCC'> \n";
					echo "<td width='450' height='30'>&nbsp;<strong>Colegiado</strong></td>\n";
					echo "<td align='center'>&nbsp;<strong>Cobrado</strong></td>\n";
					echo "</tr>\n";					
				while($estado=mysql_fetch_array($con_ecu)) {
					echo "<tr> \n";
					echo "<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;".$estado["Descripcion"];
					if($estado["Ejerciente"]==1) echo " (Importe:".$estado["Importe"]." �)"; else echo " (Importe:".$estado["Importe"]." �)";
					echo "</td>\n";
					echo "<td align='center' style='border-bottom:1px solid #CCC'>";
					if($estado["Estado"]==1) echo " Pagado"; else echo "<a href='pagar_cuotas.php?ref=".$estado["Id"]."'>Pagar cuota</a>\n";
					echo "</td>\n";
					echo "</tr>\n";					
				}				
				
				echo "<tr> \n";
				echo "<td height='25'>&nbsp;</td>\n";
				echo "<td align='right'>&nbsp;</td>\n";
				echo "</tr>\n";
				echo "</table>\n";
			}
			else {
				echo "<p>No existe ninguna cuota en el sistema.</p>";	
			}	
	  ?>  
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
