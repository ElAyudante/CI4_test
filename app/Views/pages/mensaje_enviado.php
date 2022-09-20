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
		if(isset($_GET["mensaje"]))  {		
			
		// obtengo los datos del mensaje para mostrarlos en pantalla
			$sql_mensaje="SELECT * FROM mensajes WHERE Id='".$_GET["mensaje"]."'";
			$con_mensaje=mysql_query($sql_mensaje);			
			if(mysql_num_rows($con_mensaje)>0) {
				$estado=mysql_fetch_array($con_mensaje);				
									
				echo "<table width='700' style='border:none; font-size:0.8em' cellpadding='0' cellspacing='0'>\n";
				echo "<tr> \n";
				echo "<td height='25' style='border-bottom:1px solid #CCC'><a href='bandeja_de_entrada.php'><img src='../colegiados/images/btn_bandeja_de_entrada.jpg' width='110' border='0'></a></td>\n";
				echo "<td style='border-bottom:1px solid #CCC'>&nbsp;</td>\n";
				echo "</tr>\n";
				echo "<tr> \n";
					echo "<td width='550' height='30'>&nbsp;<strong>".$estado["Asunto"]."</strong></td>\n";
					echo "<td align='center'>&nbsp;<strong>".$estado["Fecha"]."</strong></td>\n";
					echo "</tr>\n";					
				
					echo "<tr> \n";
					echo "<td colspan='2' style='border-bottom:1px solid #CCC'>";
					echo "<p>Enviado a: <strong>".$estado["Destinatarios"]."</strong></p>";
					echo $estado["Mensaje"];
					
														
					echo "</td>\n";
					
					echo "</tr>\n";					
								
				
				echo "<tr> \n";
				echo "<td height='25'>&nbsp;</td>\n";
				echo "<td align='right'><a href='#' onclick=\"printContents('cont_2')\" target='_blank'>IMPRIMIR</a></td>\n";
				echo "</tr>\n";
				echo "</table>\n";
			}
		}
		else {
			echo "<p>Error en el acceso al mensaje.</p>";	
		}	
	  ?>  
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
