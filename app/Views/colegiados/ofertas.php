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
   <h1>Ofertas de empleo</h1>
    <?php
		$sql_co="SELECT AltaBolsaTrabajo FROM colegiados WHERE Id='".$_SESSION['id_usuario']."' AND AltaBolsaTrabajo='1'";
		$con_co=mysql_query($sql_co) or die (mysql_error());
		if(mysql_num_rows($con_co)>0) {
		// obtengo el precio de las cuotas
			$sql_ofertas="SELECT * FROM empleo WHERE Activo='1'";
			$con_ofertas=mysql_query($sql_ofertas) or die (mysql_error());		
		
			if(mysql_num_rows($con_ofertas)>0) {					
				echo "<table width='700' style='border:none' cellpadding='0' cellspacing='0'>\n";								
				while($estado=mysql_fetch_array($con_ofertas)) {
					echo "<tr> \n";
					echo "<td width='450' height='25' style='border-bottom:1px solid #CCC'>&nbsp;".$estado["Titulo"];					
					echo "</td>\n";
					echo "<td align='center' style='border-bottom:1px solid #CCC'><a href='oferta.php?id=".$estado["Id"]."'>Ver oferta</a></td>\n";
					echo "</tr>\n";					
				}				
				
				echo "<tr> \n";
				echo "<td height='25'>&nbsp;</td>\n";
				echo "<td align='right'>&nbsp;</td>\n";
				echo "</tr>\n";
				echo "</table>\n";
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
