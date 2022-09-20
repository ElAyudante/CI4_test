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
					  
			$SQL1="DELETE FROM sociedades WHERE Id='$id'";
			$res_con1=mysql_query($SQL1) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
					   
			echo "<h1>Eliminar sociedades</h1><p>La sociedad se ha borrado con éxito.</p>";  
?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
