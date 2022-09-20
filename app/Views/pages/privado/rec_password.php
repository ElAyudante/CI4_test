<?
session_start();
include("configuracion.php");
?>
<html>
<head>
<title>[ �rea de Administraci�n ]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>
<body>
<div id="superior">
  <div class="logo" id="logo"><img src="images/logo.jpg" width="161" height="40" alt="Desarrollo de Obsesion Digital"></div>
  <div class="menu" id="menu"></div>
</div>
<div id="main">		
			<?
		
	if(isset($_GET["rec"])) {	
		
				// VALIDAR FORMULARIO
			$error ="";
				if (isset($_POST["enviar"])) {				
				if (empty($_POST["pass"])){
			 $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe indicar su nueva contrase�a.</font> \n <br>";}		
			 
			 	if ($_POST["pass"]!= $_POST["repass"]){
			 $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Las contrase�as indicadas no coinciden.</font> \n <br>";}			
			 	 			
				}
			
				// PROCESAMOS EL FORMULARIO
			  
			  if (isset($_POST['enviar']) && !$error) {	
					
					
					$sql_recu="UPDATE admin SET Cod_recuperacion='', Pass='".$_POST["pass"]."' WHERE Cod_recuperacion='".$_GET["rec"]."'";
					$con_recu=mysql_query($sql_recu) or die (mysql_error());				
					
					echo "La contrase�a se ha modificado con �xito.<br> <a href='index.php'>Entrar en el �rea privada</a>";
					
					} // FIN if (isset($_POST['enviar']) && !$error) {	
					else {
	  		
			 echo "<div align='left'>".$error."</div><br>"; 
				
				?>			
				Indiquenos su nueva contrase�a
				
				<form name="rec_pass" action="rec_password.php?rec=<? echo $_GET["rec"]; ?>" method="post">
                    
                      <table width="650" style="border:none" cellpadding="0" cellspacing="2" class="texto">
                        <tr bgcolor="#F3F3F3">
                          <td width="30%" height="22" align="right"><font face="Arial, Helvetica, sans-serif" size="1">Nueva contrase�a:</font></td>
                          <td height="22"> <input type="password" name="pass" size="20" maxlength="120" value="<? if (isset($_POST["pass"])) echo $_POST["pass"]; ?>"></td>
                        </tr>
						<tr bgcolor="#F3F3F3">
                          <td width="30%" height="22" align="right"><font face="Arial, Helvetica, sans-serif" size="1">Repite contrase�a:</font></td>
                          <td height="22"> <input type="password" name="repass" size="20" maxlength="120" value="<? if (isset($_POST["repass"])) echo $_POST["repass"]; ?>"></td>
                        </tr>
                        <tr bgcolor="#F3F3F3">
                          <td height="30" colspan="2" align="center" valign="bottom"><input type="submit" name="enviar" value="Enviar"></td>
                        </tr>
                        </table>
                
				</form>
			
					<?
					}
					
					} // FIN if(isset($_GET["rec"])) {	
					else {
					echo "No tiene autorizaci�n de acceso a esta p�gina \n.";
					}
					?>
</div>
<? include ("includes/footer.php"); ?>
