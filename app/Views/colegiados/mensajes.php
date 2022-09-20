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
		// obtengo el precio de las cuotas
			$sql_mensaje="SELECT mensajes.*, destinatarios_mensaje.* FROM destinatarios_mensaje, mensajes WHERE mensajes.Id=destinatarios_mensaje.relMensaje AND destinatarios_mensaje.relColegiado='".$_SESSION['id_usuario']."' ORDER BY destinatarios_mensaje.Fecha DESC";
			$con_mensaje=mysql_query($sql_mensaje) or die (mysql_error());			
			if(mysql_num_rows($con_mensaje)>0) {					
				echo "<table width='700' style='border:none; font-size:0.8em' cellpadding='0' cellspacing='0'>\n";
				echo "<tr bgcolor='#CCCCCC'> \n";
					echo "<td width='550' height='30'>&nbsp;<strong>Asunto</strong></td>\n";
					echo "<td align='center'>&nbsp;<strong>Fecha</strong></td>\n";
					echo "</tr>\n";					
				while($estado=mysql_fetch_array($con_mensaje)) {
					echo "<tr> \n";
					echo "<td width='550' height='25' style='border-bottom:1px solid #CCC'>";
					if($estado["Leido"]==0) {
						echo "<a href='mensaje.php?mensaje=".$estado["relMensaje"]."' style='color:#666'><strong>".$estado["Asunto"]."</strong></a> \n";
					}
					else {
						echo "<a href='mensaje.php?mensaje=".$estado["relMensaje"]."'  style='color:#666'>".$estado["Asunto"]."</a>";
					}					
					echo "</td>\n";
					echo "<td align='center' style='border-bottom:1px solid #CCC'>";
					echo $estado["Fecha"];
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
				echo "<p>No tiene ning�n mensaje en su bandeja de entrada.</p>";	
			}	
	  ?>  
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
