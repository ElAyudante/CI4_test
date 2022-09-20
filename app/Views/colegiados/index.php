<?php
  session_start();
?>
<html>
<head>
<title>[ &Aacute;rea de Administraci&oacute;n ]</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>
<body>
<div id="superior">
  <div id="logo"><img src="images/logo.jpg" width="161" height="40" alt="Desarrollo de Obsesion Digital"></div>
  <div id="menu"></div>
</div>
<div id="main">
 <span class="error"><?php if (isset($_SESSION["er"])) echo $_SESSION["er"]; ?></span>
  <form action="control.php" method="post" name="formulario" style="margin:20px 0 0 20px">
    <p>Usuario :
      <input type="text" name="usuario" >
&nbsp;&nbsp; Contrase&ntilde;a :
      <input type="password" name="password" >
&nbsp;&nbsp;&nbsp;
      <input type="submit" name="Submit" value="ENTRAR" >
    </p>
	<p><a href="password.php">¿Olvidaste tu contrase&ntilde;a?</a></p>
  </form>
</div>
<?php include ("includes/footer.php"); ?>
