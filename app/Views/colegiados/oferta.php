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
		$sql_co="SELECT AltaBolsaTrabajo FROM colegiados WHERE Id='".$_SESSION['id_usuario']."'";
		$con_co=mysql_query($sql_co) or die (mysql_error());
		if(mysql_num_rows($con_co)>0) {
		// obtengo el precio de las cuotas
			$sql_ofertas="SELECT * FROM empleo WHERE Activo='1' AND Id='".$_GET["id"]."'";
			$con_ofertas=mysql_query($sql_ofertas) or die (mysql_error());		
		
			if(mysql_num_rows($con_ofertas)>0) {					
				echo "<table width='700' style='border:none' cellpadding='0' cellspacing='0'>\n";
				echo "<tr> \n";
				echo "<td height='25'>&nbsp;</td>\n";
				echo "<td align='right'>&nbsp;</td>\n";
				echo "</tr>\n";
				while($estado=mysql_fetch_array($con_ofertas)) {
					echo "<tr> \n";
					echo "<td width='650' height='25' ><h1>".$estado["Titulo"]."</h1></td>\n";					
					echo "</tr>\n";	
					echo "<tr> \n";
					echo "<td width='650' height='25' >".$estado["Descripcion"]."</td>\n";					
					echo "</tr>\n";	
				}				
				
				echo "<tr> \n";
				echo "<td height='25'>&nbsp;</td>\n";
				echo "<td align='right'>&nbsp;</td>\n";
				echo "</tr>\n";
				echo "</table>\n";
				echo "<p style='float:right'><a href='ofertas.php'>Volver al listado de ofertas</a></p>";	
			}
			else {
				echo "<p>No existe ninguna oferta activa actualmente.</p>";	
			}	
		}
		else {
			echo "No est�s apuntado en la bolsa de empleo del Colegio. Si deseas darte de alta, puedes hacerlo actualizando tu perfil en el apartado <a href='mis_datos.php'>Mis datos</a>";	
		}
	  ?>  
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
