<?php session_start();
include ('configuracion.php');
if (isset($_POST["usuario"]) and isset($_POST["password"])) {

			$usuario= $_POST["usuario"];
			$pass=$_POST["password"];
		
			$sql1 = 'SELECT * FROM colegiados WHERE Usuario = "'.$_POST["usuario"].'" AND Pass = "'.$pass.'"';	

			$consulta=mysql_query($sql1) or die (mysql_error());			
			$nom=mysql_num_rows($consulta);
			$priv=mysql_fetch_array($consulta);
			if (mysql_num_rows($consulta)>0) {				
				$_SESSION['valido'] = "true";
				$_SESSION['pt']=$priv["Nombre"];
				$_SESSION['id_usuario']=$priv["Id"];
				$_SESSION['nu_colegiado']=$priv["Colegiado"];
				header("Location: main.php");
			} else {				
				$_SESSION['valido'] = "false";
				$_SESSION["er"]=" Error: nombre de usuario o contrase�a no v�lidos.";
				header("Location: index.php");
			}
		} else {
	
	 	$_SESSION['valido'] = "false";	
		$_SESSION["er"]=" Acceso restringido: Indique su Usuario y Contrase�a.";
		header("Location: index.php");		
}
?>
