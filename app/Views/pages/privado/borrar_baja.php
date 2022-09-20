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
			$id=$_GET["id"];
			
								  
			  $SQL1="DELETE FROM solicitudes_baja WHERE relColegiado='$id'";
			  $res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
						 
			  echo "<h1>Borrar Solicitud de baja</h1><p>La solicitud se ha borrado con �xito.</p>";  
			
?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
