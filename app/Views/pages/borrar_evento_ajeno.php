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
			
			$sql_e="SELECT Archivo FROM eventos_ajenos WHERE Id='$id'";
			$con_e=mysql_query($sql_e) or die (mysql_error());
			if(mysql_num_rows($con_e)>0) {
				$evento=mysql_fetch_array($con_e);
				// eliminio el fichero adjunto si existe
				if(file_exists("../eventos/".$evento["Archivo"])) @unlink("../eventos/".$evento["Archivo"]);
					  
			  $SQL1="DELETE FROM eventos_ajenos WHERE Id='$id'";
			  $res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
						 
			  echo "<h1>Eliminar eventos</h1><p>El evento se ha borrado con �xito.</p>";  
			}
			else {
				echo "<h1>Eliminar eventos</h1><p>No existe ning�n evento con esas caracter�sticas</p>";		
			}
?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
