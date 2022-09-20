<ul id="m_lateral">
	<li><a href="alta_colegiado.php">Alta de colegiado</a></li>
    <li><a href="lista_colegiados.php">Listar colegiados</a></li>
    <li><a href="busca_colegiados.php">Buscar colegiados</a></li>   
    <li style="background-color:#aaa800">&nbsp;</li>   
    <li><a href="nuevos_colegiados.php">Nuevos Colegiados</a>
    <?php
		$SQL1="SELECT * FROM colegiados WHERE Colegiado='0'";  		  		  
    	$res_con1=mysql_query($SQL1) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		if(mysql_num_rows($res_con1)>0) echo " <font color='red'>(".mysql_num_rows($res_con1).")</font> \n";
	?>
    </li>
     <li><a href="nuevas_sociedades.php">Nuevas Sociedades</a>
      <?php
		$SQL2="SELECT * FROM sociedades WHERE Colegiado='0'";  		  		  
    	$res_con2=mysql_query($SQL2) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		if(mysql_num_rows($res_con2)>0) echo " <font color='red'>(".mysql_num_rows($res_con2).")</font> \n";
	?>
     </li>
     <li><a href="alta_sociedades.php">Alta Sociedades</a></li>
     <li><a href="lista_sociedades.php">Listar Sociedades</a></li>
     <li style="background-color:#aaa800">&nbsp;</li>
    <li><a href="solicitudes_baja.php">Solicitudes Baja</a>
    <?php
		$SQL3="SELECT Id FROM solicitudes_baja WHERE Confirmada='0'";  		  		  
    	$res_con3=mysql_query($SQL3) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		if(mysql_num_rows($res_con3)>0) echo " <font color='red'>(".mysql_num_rows($res_con3).")</font> \n";
	?>
    </li>
    <li><a href="solicitudes_traslado.php">Solicitudes traslado</a>
    <?php
		$SQL4="SELECT Id FROM solicitudes_traslado WHERE Confirmada='0'";  		  		  
    	$res_con4=mysql_query($SQL4) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		if(mysql_num_rows($res_con4)>0) echo " <font color='red'>(".mysql_num_rows($res_con4).")</font> \n";
	?>
    </li>  
    <li><a href="solicitudes_cambio.php">Solicitudes cambio</a>
    <?php
		$SQL5="SELECT Id FROM solicitudes_cambio WHERE Confirmada='0'";  		  		  
    	$res_con5=mysql_query($SQL5) or die ("Intentalo más tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		if(mysql_num_rows($res_con5)>0) echo " <font color='red'>(".mysql_num_rows($res_con5).")</font> \n";
	?>
    </li>
    <li style="background-color:#aaa800">&nbsp;</li>
    <li><a href="edit_cuotas.php">Importes Cuotas</a></li>
    <li style="background-color:#aaa800">&nbsp;</li>
    <?php
		// obstengo el número de mensajes sin leer
		$sql_m="SELECT Id FROM respuestas WHERE Leido='0'";
		$con_m=mysql_query($sql_m) or die(mysql_error());
		$numero=mysql_num_rows($con_m);
	?>
    <li><a href="bandeja_de_entrada.php">Bandeja de Entrada <?php if($numero>0) echo " <font color='red'>(".$numero.")</font> \n"; ?></a></li>     
    <li><a href="enviar_mensajes.php">Enviar Mensajes</a></li> 
    <li><a href="mensajes_enviado.php">Mensajes Enviados</a></li>      
</ul>
