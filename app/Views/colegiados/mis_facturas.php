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
   <h1>Mis facturas</h1>
   
   <?php
   		$sql_ped="SELECT * FROM pedidos WHERE Estado='2' AND Cod_cliente='".$_SESSION['nu_colegiado']."' OR Cod_cliente='ins".$_SESSION['nu_colegiado']."'";		
		$con_ped=mysql_query($sql_ped) or die (mysql_error());
		if(mysql_num_rows($con_ped)<1) {
			echo "No existen ning�n justificante de pago ya que no dispone de ning�n abono confirmado al Colegio de Logopedas.";
		}
		else {
			echo "<ul>\n";
			while($da=mysql_fetch_array($con_ped)) {
				$sql_ped2="SELECT * FROM relPedidos WHERE relPedido='".$da["Referencia"]."'";	
				$con_ped2=mysql_query($sql_ped2) or die (mysql_error());
				$compra=mysql_fetch_array($con_ped2);
				
				echo "<li><a href='facturas.php?ref=".$compra["relPedido"]."' target='_blank'>".$compra["Articulo"]."</a></li>\n";
						
			}
			echo "</ul>\n";
		}
		
		
   ?>
   
   <h2>Resumen anual de pagos</h2>
   
   <ul>
   <li><a href="resumen_pagos.php?year=2011">Resumen 2011</a></li>
   <?php
   	if(date("Y")>2011) {
		for($u=2012;$u<=date("Y");$u++) {
			echo "<li><a href='resumen_pagos.php?year=$u'>$u</a></li>\n";
		}
	}
   ?>
   </ul>
    
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
