<?php
	//consulto si hay reclamaciones sin responder
	$sql_rec="SELECT * FROM reclamaciones WHERE Respuesta='0'";
	$con_rec=mysql_query($sql_rec);
	if(mysql_num_rows($con_rec)>0) $reclamaciones="<font color='red' size='-1'>*</font>"; else $reclamaciones="";
	
	$SQL1="SELECT * FROM colegiados WHERE Colegiado='0'";  		  		  
    $res_con1=mysql_query($SQL1) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
	$num_res1=mysql_num_rows($res_con1);
	
	$SQL2="SELECT * FROM sociedades WHERE Colegiado='0'";  		  		  
	$res_con2=mysql_query($SQL2) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
	$num_res2=mysql_num_rows($res_con2);
	
	$SQL3="SELECT Id FROM solicitudes_baja WHERE Confirmada='0'";  		  		  
	$res_con3=mysql_query($SQL3) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
	$num_res3=mysql_num_rows($res_con3);
	
	$SQL4="SELECT Id FROM solicitudes_cambio WHERE Confirmada='0'";  		  		  
	$res_con4=mysql_query($SQL4) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
	$num_res4=mysql_num_rows($res_con4);
	
	$SQL5="SELECT Id FROM solicitudes_traslado WHERE Confirmada='0'";  		  		  
	$res_con5=mysql_query($SQL5) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
	$num_res5=mysql_num_rows($res_con5);
	
	if($num_res1>0 || $num_res2>0 || $num_res3>0 || $num_res4>0 || $num_res5>0) $colegiados="<font color='red' size='-1'>*</font>"; else $colegiados="";
	
?>
<div id="menu">
	<ul id="navi">	
		<?php if (isset($_SESSION["priv"]) && $_SESSION["priv"]==1) { echo'<li><a href="selec_menu.php?m=1" class="menu">Usuarios</a></li>'; } ?>
		<li><a href="selec_menu.php?m=2" class="menu">Colegiados<?php echo $colegiados; ?></a></li>
        <li><a href="selec_menu.php?m=3" class="menu">Eventos</a></li>
        <li><a href="selec_menu.php?m=4" class="menu">Documentos</a></li>
        <li><a href="selec_menu.php?m=5" class="menu">Reclamaciones<?php echo $reclamaciones; ?></a></li>
        <li><a href="selec_menu.php?m=7" class="menu">Empleo</a></li>
        <li><a href="selec_menu.php?m=6" class="menu">Cobros</a></li>
		<li><a href="nosession.php">Desconectar</a></li>
	</ul>
    <div class="clear"></div>
</div>
