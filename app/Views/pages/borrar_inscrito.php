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
<h1>Eliminar inscripciones</h1>
<?php 
			$id=$_GET["id"];
			
			$sql_p="SELECT Referencia FROM pedidos WHERE Cod_cliente='ins".$id."'";
			$con_p=mysql_query($sql_p) or die (mysql_error());
			$reff=mysql_fetch_array($con_p);
			
			$SQL1="DELETE FROM relPedidos WHERE relPedido='".$reff["Referencia"]."'";
			$res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
			
			$SQL1="DELETE FROM pedidos WHERE Cod_cliente='ins".$id."'";
			$res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
			
			
			  $SQL1="DELETE FROM inscripciones WHERE Id='$id'";
			  $res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
						 
			  echo "<p>La inscripci�n se ha borrado correctamente.</p>";  
			
?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
