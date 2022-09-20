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
   <h1>Solicitudes de traslado</h1>
    <?php 
				
		  $SQL1="SELECT colegiados.Id, colegiados.Nombre, colegiados.Apellidos, solicitudes_traslado.relColegiado FROM colegiados, solicitudes_traslado WHERE colegiados.Id=solicitudes_traslado.relColegiado AND solicitudes_traslado.Confirmada='0'";  		  		  
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
				  <span class='pequeno'><a href='traslado.php?id=".$campo["Id"]."'>Ver Solicitud</a>&nbsp;&nbsp;<a href='borrar_traslado.php?id=".$campo["relColegiado"]."' onclick=\"return confirm('�Est� seguro de que desea eliminar esta solicitud?')\">Eliminar</a></span>
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
