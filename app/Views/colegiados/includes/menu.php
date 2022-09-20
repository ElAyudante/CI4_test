<div id="menu">
	<ul id="navi">	
		<?php if (isset($_SESSION["priv"]) && $_SESSION["priv"]==1) { echo'<li><a href="selec_menu.php?m=1" class="menu">Usuarios</a></li>'; } ?>
		<li><a href="selec_menu.php?m=2" class="menu">Colegiados</a></li>
        <li><a href="selec_menu.php?m=3" class="menu">Eventos</a></li>
        <li><a href="selec_menu.php?m=4" class="menu">Documentos</a></li>
        <li><a href="selec_menu.php?m=5" class="menu">Reclamaciones</a></li>
        <li><a href="selec_menu.php?m=6" class="menu">Pagos</a></li>
		<li><a href="nosession.php">Desconectar</a></li>
	</ul>
    <div class="clear"></div>
</div>
