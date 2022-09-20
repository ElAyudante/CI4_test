<?php

if(isset($_SESSION["men"])) {
	
		switch ($_SESSION["men"]) {
			case 1:
			include('menus/m_usuarios.php');
                        
			break;
			
			case 2:
			include('menus/m_usuarios.php');
			break;
			
			case 3:
			include('menus/m_eventos.php');
			break;
			
			case 4:
			include('menus/m_documentos.php');
			break;
			
			case 5:
			include('menus/m_reclamaciones.php');
			break;
			
			case 6:
			include('menus/m_cobros.php');
			break;
			
			case 7:
			include('menus/m_empleo.php');
			break;
		}
	}
?>
