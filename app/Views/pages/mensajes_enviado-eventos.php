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
   <h1>Mensajes Enviados</h1>
    <?php
			
			$sql_mensaje="SELECT * FROM mensajes_inscritos WHERE Borrado='0' AND Id NOT LIKE '0' ORDER BY Id DESC";
			$con_mensaje=mysql_query($sql_mensaje) or die (mysql_error());			
			if(mysql_num_rows($con_mensaje)>0) {					
				echo "<table width='700' style='border:none; font-size:0.8em' cellpadding='0' cellspacing='0'>\n";
				echo "<tr bgcolor='#CCCCCC'> \n";
					echo "<td width='300' height='30'>&nbsp;<strong>Asunto</strong></td>\n";
					echo "<td width='150' height='30'>&nbsp;<strong></strong></td>\n";
					echo "<td align='center'>&nbsp;<strong>Fecha</strong></td>\n";
					echo "<td align='center'>&nbsp;</td>\n";
					echo "</tr>\n";					
				while($estado=mysql_fetch_array($con_mensaje)) {
					echo "<tr> \n";
					echo "<td width='300' height='25' style='border-bottom:1px solid #CCC'>";
					echo "<a href='mensaje_enviado-eventos.php?mensaje=".$estado["Id"]."' style='color:#666'>".$estado["Asunto"]."</a>";
					echo "</td>\n";					
					echo "<td width='150' height='25' style='border-bottom:1px solid #CCC'>";
					//echo $estado["Destinatarios"];									
					echo "</td>\n";
					echo "<td align='center' style='border-bottom:1px solid #CCC'>";
					echo $estado["Fecha"];
					echo "</td>\n";
					echo "<td align='center' style='border-bottom:1px solid #CCC'>";
					echo "<a href='borrar_mensaje.php?id=".$estado["Id"]."&tabla=mensajes'>Borrar</a> \n";
					echo "</td>\n";
					echo "</tr>\n";					
				}				
				
				echo "<tr> \n";
				echo "<td colspan='3' height='25'>&nbsp;</td>\n";
				echo "<td align='right'>&nbsp;</td>\n";
				echo "</tr>\n";
				echo "</table>\n";
			}
			else {
				echo "<p>No se ha enviado ning�n mensaje.</p>";	
			}	
	  ?>  
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
