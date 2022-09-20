<ul id="m_lateral">
	<li><a href="mis_datos.php">Mis datos</a></li>
    <li><a href="mis_cuotas.php">Mis cuotas</a></li> 
    <li><a href="mis_facturas.php">Mis facturas</a></li>
    <li><a href="documentos.php">Documentos de inter�s</a></li>
    <li><a href="ofertas.php">Ofertas de empleo</a></li>
    <li><a href="solicitar_baja.php">Solicitar baja</a></li>
    <li><a href="solicitar_traslado.php">Solicitar traslado</a></li>
    <li><a href="solicitar_cambio.php">Cambio de modalidad</a></li>
    <li style="background-color:#aaa800">&nbsp;</li>   
    <?php
		// obstengo el n�mero de mensajes sin leer
		$sql_m="SELECT Id FROM destinatarios_mensaje WHERE relColegiado='".$_SESSION['id_usuario']."' AND Leido='0'";
		$con_m=mysql_query($sql_m) or die(mysql_error());
		$numero=mysql_num_rows($con_m);
	?>
    <li><a href="mensajes.php">Bandeja de Entrada<?php if($numero>0) echo " <font color='red'>(".$numero.")</font> \n"; ?></a></li> 
    <li><a href="mensajes_enviados.php">Mensajes Enviados</a></li> 
    <li><a href="mensajes_colegiado.php">Enviar mensaje</a></li>       
    <li><a href="nosession.php"><strong>Desconectar</strong></a></li>   
</ul>
