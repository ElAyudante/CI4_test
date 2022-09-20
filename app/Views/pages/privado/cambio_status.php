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
	switch($_GET["c"]){
		case 0;
		include("status_pendiente.php");
		break;
		
		case 2;
		include("status_enviado.php");
		break;
		
		case 3;
		include("status_error.php");
		break;
		
		case 4;
		include("status_anulado.php");
		break;
	}
	
	
	
?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
