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
   <h1>Documentos de inter�s</h1>
    <?php 
		
		  $SQL1="SELECT * FROM eventos WHERE Activo='1' ORDER BY Id DESC";
		  $res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		  $num_res1=mysql_num_rows($res_con1);
		  if ($num_res1<1) {
			echo "No se han encontrado eventos."; } // fin IF mysql_num_rows($SQL1)<0		
			else {			
			  echo "<table cellpadding='0' cellspacing='0' width='585'> \n";					
			  while ($campo=mysql_fetch_array($res_con1)) {
				  echo "<tr> \n
				  <td> \n";				  
				  echo "<font color='#FF6600'>&raquo;</font> ".$campo["Evento"]."\n";				
				  echo "</td> \n
				  </tr> \n
				  <tr>
				  <td align='right' style='border-bottom:1px solid #333333'>
				  <a href='cursos.php?ref=".$campo["Id"]."'>Informaci�n e inscripciones</a>
				  </td>
				  </tr>";
			  } // fin WHILE $campo=mysql_fetch_array($SQL1)					
			
		   echo "</table> \n";
			
		   } // fin ELSE mysql_num_rows($SQL1)<0		
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
