<div id="menu2">
	<ul id="navi">	
		<?php if (isset($_SESSION["priv"])) { if ($_SESSION["priv"]==1) { echo'<li><div id="usuario" style="position:absolute; width:80px;" onMouseOver="despMenu(\'itMenu1\',1)" onMouseout="despMenu(\'itMenu1\',0)"><a href="main.php?m=1" class="menu">Usuarios</a></div></li>'; } } ?>
		<li><div id="noticias" style="position:absolute; width:80px;"><a href="noticias.php?m=2" class="menu">Noticias</a></div></li>
		
		
				
		<li><a href="#">&nbsp;</a></li>
        <li><a href="#">&nbsp;</a></li>
        <li><a href="#">&nbsp;</a></li>
        <li><a href="#">&nbsp;</a></li>
        <li><a href="#">&nbsp;</a></li>
        <li><a href="#">&nbsp;</a></li>
        <li><a href="#">&nbsp;</a></li>
		<li><a href="#">&nbsp;</a></li>
		<li><a href="nosession.php">Desconectar</a></li>
	</ul>
</div>
