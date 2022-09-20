
<div id="superior">
  <div id="menu"></div>
</div>
<div id="main">
 <span class="error"><?php if (isset($_SESSION["er"])) echo $_SESSION["er"]; ?></span>
  <form action="https://localhost/logopedas_dos/control" method="post" name="formulario" style="margin:20px 0 0 20px">
    <p>Usuario :
      <input type="text" name="usuario" >
&nbsp;&nbsp; Contraseña :
      <input type="password" name="password" >
&nbsp;&nbsp;&nbsp;
      <input type="submit" name="Submit" value="ENTRAR" >
    </p>
	<p><a href="password.php">¿Olvidaste tu contraseña?</a></p>
  </form>
</div>
