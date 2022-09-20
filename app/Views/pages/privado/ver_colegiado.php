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
			
				$sql_c="SELECT * FROM colegiados WHERE Id='".$_GET["id"]."'";
				$con_c=mysql_query($sql_c) or die (mysql_error);
				if(mysql_num_rows($con_c)>0) {
					$colegiado=mysql_fetch_array($con_c);	
				
	?>
    <h1>Ficha del colegiado <?php echo $colegiado["Nombre"]." ".$colegiado["Apellidos"]; ?></h1>
   
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
    <tr>
        <td width="215">&nbsp;</td>
        <td align="right"><a href="imprimir_colegiado.php?id=<?php echo $_GET["id"]; ?>">Imprimir</a>&nbsp;|&nbsp;<a href="edit_colegiado.php?id=<?php echo $_GET["id"]; ?>">Modificar datos</a></td>
      </tr>      
       <tr>
         <td width="215" height="25" align="right" class="privada"><strong>Fecha Alta:&nbsp;&nbsp;</strong></td>
        <td><?php 
			$fechaa=explode("-",$colegiado["FechaAlta"]);
			echo $fechaa[2]."-".$fechaa[1]."-".$fechaa[0];		
			?>
        </td>
      </tr>
      <tr>
        <td width="215">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Nombre:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Nombre"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Apellidos: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Apellidos"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Usuario: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Usuario"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Contrase�a: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Pass"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>NIF/DNI/CIF: &nbsp;</strong></td>
        <td height="25">
        <?php 
			@$cad_nif=explode("/",$colegiado["CaducidadCarnet"]);
		echo $colegiado["NIF"]; ?>
        </td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Direcci�n: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Direccion"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Localidad: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Localidad"]; ?>&nbsp;&nbsp;&nbsp; <strong>C�digo Postal:</strong> <?php echo $colegiado["CP"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Provincia: &nbsp;</strong></td>
        <td height="25"> <?php echo $colegiado["Provincia"]; ?>
        </td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Comunidad: &nbsp;</strong></td>
        <td height="25"> <?php echo $colegiado["Comunidad"]; ?>
        </td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Tel�fono: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Telefono"]; ?></td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>M�vil: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Movil"]; ?></td>
      </tr>        
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Email: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Email"]; ?></td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Lugar de Nacimiento: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["LugarNacimiento"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Fecha de nacimiento: &nbsp;</strong></td>
        <td height="25">
        <?php $corte_naci=explode("-",$colegiado["FechaNacimiento"]);  echo $corte_naci[2]."-".$corte_naci[1]."-".$corte_naci[0]; ?>
        </td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Cuenta Bancaria: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["CuentaBancaria"]; ?></td>
      </tr>  
      <tr>
        <td width="215">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Tel�fono de Trabajo: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["TelefonoTrabajo"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Lugar de trabajo: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["LugarTrabajo"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Direcci�n de trabajo: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["DireccionTrabajo"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Localidad de Trabajo: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["LocalidadTrabajo"]; ?></td>
      </tr>  
      <tr>
        <td width="215">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>   
       <tr>
        <td width="215" height="25" align="right" class="privada"><strong>N� de colegiado:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Colegiado"]; ?>&nbsp;&nbsp;&nbsp;Caducidad
        <?php
        echo @$cad_nif[0]."/".@$cad_nif[1]; ?></td>
      </tr>    
       <tr>
        <td width="215">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Ejerciente:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php if($colegiado["Ejerciente"]==1) echo "Si"; else echo "No";?></td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Especialidad:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Especialidad"]; ?></td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>�mbito de trabajo:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["AmbitoTrabajo"]; ?></td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Sector de trabajo:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php if($colegiado["Publico"]==1) echo 'Publico'; ?> <?php if($colegiado["Privado"]==1) echo 'Privado'; ?></td>
      </tr>   
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Solicita habilitacion:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php if($colegiado["SolicitaHabilitacion"]==1) echo 'Si'; else echo "No"; ?></td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Diplomado Logopedia:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php if($colegiado["DiplomaturaLogopedia"]==1) echo 'Si'; else echo "No"; ?></td>
      </tr>
       <tr>
        <td width="215" align="right" class="privada"><strong>Titulaci�n:&nbsp;&nbsp;</strong></td>
        <td><?php echo $colegiado["Titulacion"]; ?></td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Otras titulaciones:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php if($colegiado["OtrosTitulos"]==1) echo 'Si'; else echo "No"; ?></td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Bolsa de Trabajo:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php if($colegiado["AltaBolsaTrabajo"]==1) echo 'Si'; else echo "No"; ?></td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Otros casos:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php if($colegiado["OtroCaso"]==1) echo 'Si'; else echo "No"; ?></td>
      </tr> 
       <tr>
        <td width="215">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
        <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Trasladado:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php if($colegiado["Trasladado"]==1) echo 'Si'; else echo "No"; ?></td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Colegio de origen:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["ColegioOrigen"]; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>N� colegiado origen:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["NumColegiado"]; ?></td>
      </tr>
      <tr>
        <td width="215">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="215" align="right" class="privada" valign="top"><strong>Observaciones:&nbsp;&nbsp;</strong></td>
        <td><?php echo $colegiado["Observaciones"]; ?></td>
      </tr> 
      <tr>
        <td width="215">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Publicidad:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php if($colegiado["Publicidad"]==0) echo "No"; else echo "Si"; ?></td>
      </tr>
      <tr>
        <td width="215" height="25" align="right" class="privada"><strong>Colegiado actual:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php if($colegiado["Activo"]==0) echo "No"; else echo "Si"; ?></td>
      </tr>
      <tr>
        <td width="215">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="215">&nbsp;</td>
        <td align="right"><a href="edit_colegiado.php?id=<?php echo $_GET["id"]; ?>">Modificar datos</a></td>
      </tr>
      <tr>
        <td width="215">&nbsp;</td>
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
