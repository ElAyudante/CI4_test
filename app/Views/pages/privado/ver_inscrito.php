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
			
				$sql_c="SELECT * FROM inscripciones WHERE Id='".$_GET["id"]."'";
				$con_c=mysql_query($sql_c) or die (mysql_error);
				if(mysql_num_rows($con_c)>0) {
					$colegiado=mysql_fetch_array($con_c);	
				
	?>
    <h1>Ficha del inscrito <?php echo $colegiado["Nombre"]." ".$colegiado["Apellidos"]; ?></h1>
    <?php echo "<p align='right'><a href='lanza_inscrito.php?c=".$_GET["id"]."' target='_blank'><img src='images/icon_pdf.jpg' width='60' border='0'></a>\n</p>"; ?>
    
   
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">    
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200"><a href="javascript:history.back(1)">Volver al Listado</a></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada"><strong>Nombre:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Nombre"]; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada"><strong>Apellidos: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Apellidos"]; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada"><strong>NIF/DNI/CIF: &nbsp;</strong></td>
        <td height="25">
        <?php 			
		echo $colegiado["Dni"]; ?> 
        </td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada"><strong>Profesion: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Profesion"]; ?></td>
      </tr> 
      <tr>
        <td height="25" align="right" class="privada"><strong>Direcci�n: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Direccion"]; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada"><strong>Localidad: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Localidad"]; ?>&nbsp;&nbsp;&nbsp; C�digo Postal:<?php echo $colegiado["CP"]; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada"><strong>Provincia: &nbsp;</strong></td>
        <td height="25"> <?php echo $colegiado["Provincia"]; ?>
        </td>
      </tr>      
      <tr>
        <td height="25" align="right" class="privada"><strong>Tel�fono: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Telefono"]; ?></td>
      </tr>             
      <tr>
        <td height="25" align="right" class="privada"><strong>Email: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Email"]; ?></td>
      </tr> 
      
       <tr>
        <td width="200" height="25" align="right" class="privada"><strong>Asociaci�n:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Asociacion"]; ?></td>
      </tr>
       <tr>
        <td width="200" height="25" align="right" class="privada"><strong>N� de colegiado:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["NAsociado"]; ?></td>
      </tr>    
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="200" height="25" align="right" class="privada"><strong>Titulaci�n:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Titulacion"];?></td>
      </tr>      
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>        
    </table>

	<!-- fin de tabla de contenido-->
	

    <?php			
		}
				else {
					$error.="<h1>Ficha del colegiado</h1> <p>No existe nin�n colegiado con esos par�metros</p>";	
				}
	?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
