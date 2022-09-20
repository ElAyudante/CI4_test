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
   <h1>Lista de Colegiados</h1>
    <?php 
				
		  $SQL1="SELECT * FROM colegiados WHERE Colegiado='0'";  		  		  
		  $res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		  $num_res1=mysql_num_rows($res_con1);
		  if ($num_res1<1) {
			echo "<p>No existen colegiados pendientes de validar</p>\n";  
		  } // fin IF mysql_num_rows($SQL1)<0		
		  else {			
			  echo "<table cellpadding='0' cellspacing='0' width='585'> \n";
			  echo "<tr> \n
				  <td> &nbsp;</td> \n
				  </tr> \n";				  
			  while ($campo=mysql_fetch_array($res_con1)) {
				  echo "<tr> \n
				  <td> \n";				  
				  echo "<font color='#FF6600'>&raquo;</font> ".$campo["Apellidos"].", ".$campo["Nombre"]." \n";				
				  echo "</td> \n
				  </tr> \n
				  <tr>
				  <td align='right' style='border-bottom:1px solid #333333'>
				  <span class='pequeno'><a href='ver_colegiado.php?id=".$campo["Id"]."'>Ver ficha</a>&nbsp;&nbsp;<a href='edit_colegiado.php?id=".$campo["Id"]."'>Modificar</a>&nbsp;&nbsp;<a href='borrar_colegiado.php?id=".$campo["Id"]."' onclick=\"return confirm('�Est� seguro de que desea eliminar este colegiado?')\">Eliminar</a></span>
				  </td>
				  </tr>";
			  } // fin WHILE $campo=mysql_fetch_array($SQL1)					
			echo" <tr>
				  <td height='35' align='right' valign='bottom'>&nbsp;</td>
				  </tr>";
		   echo "</table> \n";		   
			
		   } // fin ELSE mysql_num_rows($SQL1)<0	
		   
		   
		?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
