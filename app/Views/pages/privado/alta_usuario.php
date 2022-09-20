<?php include ("includes/header.php");
?>
<!-- *******************************************************-->
<div id="menu_lat">
<?php
	include("menus/switch_menus.php");	
?>
</div>
<!-- *******************************************************-->
<!-- *******************************************************-->
<div id="cont_2">
<?php 
			// VALIDAR FORMULARIO
			$error ="";

			if (isset($_POST["enviar"])) {

				  $SQL_1="SELECT User FROM admin WHERE User LIKE '".$_POST["usuario"]."'";
				  $res_SQL_1=mysql_query($SQL_1) or die (mysql_error());
				  if (mysql_num_rows($res_SQL_1) > 0) {
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Su nombre de Usuario ya est� registrado. Debe seleccionar otro.</font> \n <br>";
				  }				
	  
				  if (empty($_POST["usuario"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe insertar un nombre de Usuario.</font> \n <br>";
				  }
	  
				  if (empty($_POST["password"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe insertar una contrase�a.</font> \n <br>";
				  }
	  
				  if (empty($_POST["password2"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe repetir su contrase�a de nuevo.</font> \n <br>";
				  }
	  
				  if ($_POST["password"]!=$_POST["password2"]) {
				   $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Las contrase�as deben ser iguales</font> \n <br>";
				  }		 
	  
				  if (empty($_POST["nombre"])){
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe insertar su nombre.</font> \n <br>";
				  }			
	  
				  if (!eregi("^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+"."@[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\."."[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$", $_POST["mail"])){
					  $error .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe insertar un E-mail v�lido</font> \n <br>";
				  }	 
	  
				  if ($_POST["mail"]!=$_POST["mail2"]) {
					  $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Los emails deben ser iguales</font> \n <br>";
				  }		
			}

			
			// PROCESAMOS EL FORMULARIO
		  	if (isset($_POST['enviar']) && !$error) {				 

				// INSERCION DEL CONTACTO EN LA BASE DE DATOS DE CLIENTES PARA NEWSLETTER
				$User = $_POST["usuario"];
				$Pass= md5($_POST["password"]);
				$Nombre = $_POST["nombre"];
				$Email= $_POST["mail"];					
				$permisos= $_POST["permisos"];
				
				$sql="INSERT INTO admin (Nombre, Email, User, Pass, Permisos) VALUES ('$Nombre','$Email','$User','$Pass', '$permisos')";		
				$consulta=mysql_query($sql) or die(mysql_error() /*"Error al procesar el formulario. Vuelva a intentarlo. <br>"*/);			

				echo "El usuario ha sido dado de alta correctamente.";

			}
			else {						
				if($_SESSION["priv"]!=1)	{
					echo "No tienes permisos para acceder a este apartado.";
				}
				else {														    		
	?>
    <h1>Alta de usuarios</h1>
    <?php if ($error) { echo "<p>".$error."</p>"; }	  ?>
	<form method="post" name="alta_usuarios" action="alta_usuario.php?m=1">
	<table width="500" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada">Nombre:&nbsp;&nbsp;</td>
        <td height="25"><input name="nombre" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Usuario: &nbsp;</td>
        <td height="25"><input name="usuario" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Email: &nbsp;</td>
        <td height="25"><input name="mail" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Repita su Email: &nbsp;</td>
        <td height="25"><input name="mail2" type="text" maxlength="100" size="25" value="<?php if(isset($_POST["mail2"])) echo $_POST["mail2"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Contrase&ntilde;a:&nbsp;&nbsp;</td>
        <td height="25"><input type="password" name="password" maxlength="20" size="20" value="<?php if(isset($_POST["password"])) echo $_POST["password"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Repita la contrase&ntilde;a :&nbsp;&nbsp;</td>
        <td height="25"><input type="password" name="password2" maxlength="20" size="20" value="<?php if(isset($_POST["password2"])) echo $_POST["password2"] ?>"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada">Permisos :&nbsp;&nbsp;</td>
        <td height="25"><select name="permisos">
                <option value="1">Administrador</option>
                <option value="0">Usuario</option>
                </select>
        </td>
      </tr>
      <tr>
        <td height="25" colspan="2" align="center"><input type="submit" name="enviar" value="Enviar"></td>
        </tr>
    </table>

	<!-- fin de tabla de contenido-->
	</form>	

    <?php
			} // fin  if($_SESSION["priv"]!=1)	{	
		} // fin if (isset($_POST['enviar']) && !$error) {	
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
