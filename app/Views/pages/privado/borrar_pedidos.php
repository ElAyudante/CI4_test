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
			$id=$_GET["ref"];		  
					  
			$SQL1="DELETE FROM pedidos WHERE Referencia='$id'";
			$res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
			
			$SQL1="DELETE FROM relPedidos WHERE relPedido='$id'";
			$res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
					   
			echo "<h1>Borrar operaciones</h1><p>La operaci�n se ha borrado con �xito.</p>";  
?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
