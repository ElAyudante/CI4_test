<?php session_start();
include("configuracion.php");
include ("includes/seguridad.php");
include("includes/functions.php");
?>
<html>
<head>
<title> [ �rea de Administraci�n ] </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/estilos.css" type="text/css">
<script language="javascript" src="textarea/wysiwyg.js" type="text/javascript"></script>
</head>
<body onLoad="javascript:document.compra.submit();">
<div id="superior">
  <div id="logo"><img src="images/logo.jpg" width="161" height="40"></div>
</div>
<div id="menu">&nbsp;</div>
<div id="main">

<!-- *******************************************************-->
<div id="menu_lat">
<?php
	include("menus/switch_menus.php");	
?>
</div>
<!-- *******************************************************-->
<!-- *******************************************************-->
<div id="cont_2">
   <h1>Estamos procesando el pago</h1>
   <p><img src="/images/ajax-loader.gif" width="128" height="15" alt="Estamos procesando su pedido"></p>
    <?php
		if(isset($_GET["ref"])) $id_cuota=$_GET["ref"];
		  // obtengo la descripcion de la cuota
		  $sql_ncuo="SELECT Descripcion FROM cobroscuotas WHERE Id='$id_cuota'";
		  $con_ncuo=mysql_query($sql_ncuo) or die (mysql_error());
		  if(mysql_num_rows($con_ncuo)>0) {
			  
			  $nombre_cuota=mysql_fetch_array($con_ncuo); /**********************************************************************************/
		  
		  // OBTENGO EL IMPORTE DE LA CUOTA DEPENDIENDO DE SI ES EJERCIENTE O NO
		  $sql_col="SELECT Ejerciente FROM colegiados WHERE Id='".$_SESSION['id_usuario']."'";
		  $con_col=mysql_query($sql_col) or die (mysql_error());
		  if(mysql_num_rows($con_col)>0) {
			  $tipo_colegiado=mysql_fetch_array($con_col);
			  
			  $sql_cuo="SELECT * FROM cuotas";
			  $con_cuo=mysql_query($sql_cuo) or die (mysql_error());
			  $importe_cuota=mysql_fetch_array($con_cuo);
			  if($tipo_colegiado["Ejerciente"]==1) $precio_pagar=$importe_cuota["Ordinaria"]; else $precio_pagar=$importe_cuota["NoEjerciente"]; /*********/
			  
			  // OBTENGO EL NUMERO DEL PROXIMO PAGO			  
			  $num=@proximo_registro($bd_base,"pedidos"); /**********************************************************************************/
			  
			  //METO EL PEDIDO A LAS BASES DE DATOS
			  $sql_articulos="INSERT INTO relPedidos VALUES ('','cuo".$num."-".date("Y")."', '".$id_cuota."', '".$nombre_cuota["Descripcion"]."', '1', '".$precio_pagar."')";		
			  $con_articulos=mysql_query($sql_articulos) or die (mysql_error());
			  
			  $sql_pedido="INSERT INTO pedidos VALUES ('','cuo".$num."-".date("Y")."', '', '".$precio_pagar."', '0', '0', '0', '1', '".$_SESSION["id_usuario"]."', '3', '".date("Y-m_d H:i:s")."','','Tarjeta', '0')";
			  $con_pedido=mysql_query($sql_pedido) or die (mysql_error());
			  
			  ?>
              	<!--https://tpv.4b.es/tpvv/teargral.exe-->
            
            <form method="post" name="compra" action="https://tpv.4b.es/tpvv/teargral.exe">
                <input type="hidden" name="order" value="<?php echo "cuo".$num."-".date("Y"); ?>">
                <input type="hidden" name="store" value="PI00015395">
                <input type="hidden" value="es">
            </form>	
              <?php
			  
			  			  
		  }	
		  else {
			  echo "Se ha producido un error en el sistema. Int�ntelo de nuevo.";	
		  }
		}
		else {
			echo "No existe ning�na cuota con los par�metros indicados. Por favor, pongase en contacto con el administrador del sistema.";	
		}
	  		
	  ?>  
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
