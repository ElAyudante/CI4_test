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
			
				$sql_c="SELECT * FROM sociedades WHERE Id='".$_GET["id"]."'";
				$con_c=mysql_query($sql_c) or die (mysql_error);
				if(mysql_num_rows($con_c)>0) {
					$colegiado=mysql_fetch_array($con_c);	
				
	?>
    <h1>Ficha de la sociedad <?php echo $colegiado["Sociedad"]; ?></h1>
   
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
    <tr>
        <td width="200">&nbsp;</td>
        <td align="right"><a href="edit_sociedad.php?id=<?php echo $_GET["id"]; ?>">Modificar datos</a></td>
      </tr>      
       <tr>
         <td width="200" height="25" align="right" class="privada"><strong>Fecha Alta:&nbsp;&nbsp;</strong></td>
        <td><?php echo $colegiado["FechaAlta"]; ?></td>
      </tr>
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="200" height="25" align="right" class="privada"><strong>Sociedad:&nbsp;&nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Sociedad"]; ?></td>
      </tr>      
      <tr>
        <td height="25" align="right" class="privada"><strong>NIF/CIF: &nbsp;</strong></td>
        <td height="25">
        <?php 
			@$cad_nif=explode("/",$colegiado["CaducidadCarnet"]);
		echo $colegiado["NIF"]; ?>
        </td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada"><strong>Direcci�n: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Direccion"]; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada"><strong>Localidad: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Poblacion"]; ?>&nbsp;&nbsp;&nbsp; <strong>C�digo Postal:</strong><?php echo $colegiado["CP"]; ?></td>
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
        <td height="25" align="right" class="privada"><strong>FAX: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Fax"]; ?></td>
      </tr>        
      <tr>
        <td height="25" align="right" class="privada"><strong>Email: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["Email"]; ?></td>
      </tr> 
      <tr>
        <td height="25" align="right" class="privada"><strong>Registro Mercantil: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["RegistroMercantil"]; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada"><strong>Tipo de sociedad: &nbsp;</strong></td>
        <td height="25"> <?php echo $colegiado["TipoSociedad"]; ?>
        </td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada"><strong>Capital Social: &nbsp;</strong></td>
        <td height="25"> <?php echo $colegiado["CapitalSocial"]; ?>
        </td>
      </tr>
      <tr>
        <td height="25" align="right" class="privada"><strong>Cuenta Bancaria: &nbsp;</strong></td>
        <td height="25"><?php echo $colegiado["CuentaBancaria"]; ?></td>
      </tr>  
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
     	<?php
			$sql_soc="SELECT * FROM relSociedades WHERE relSocidad='".$_GET["id"]."' ORDER BY TipoSocio";
			$con_soc=mysql_query($sql_soc) or die (mysql_error());
			if(mysql_num_rows($con_soc)>0) {
				$sociomas=0;
				$logomas=0;
				$otrosociomas=0;
				while($soci=mysql_fetch_array($con_soc)) {
					
					//SOCIOS
					if($soci["TipoSocio"]==1) {						
						if($sociomas==0) {
							echo "<tr>
							<td height='25' align='right' class='privada' bgcolor='#eaeaea'><strong>Socios de la Sociedad &nbsp;</strong></td>
							<td height='25' bgcolor='#eaeaea'>&nbsp;</td>
						  </tr>";
						$sociomas++;
						}
						echo "<tr>
						<td height='25' align='right' class='privada'><strong>Nombre: &nbsp;</strong></td>
						<td height='25'>".$soci["Nombre"]."</td>
					  </tr>";
					  
					  echo "<tr>
						<td height='25' align='right' class='privada'><strong>N� Colegiado: &nbsp;</strong></td>
						<td height='25'>".$soci["Colegiado"]."</td>
					  </tr>";
					  
					  echo "<tr>
						<td height='25' align='right' class='privada'><strong>Cargo: &nbsp;</strong></td>
						<td height='25'>".$soci["Cargo"]."</td>
					  </tr>";
					  
					  echo "<tr>
						<td height='25' align='right' class='privada'><strong>Cuota de participacion: &nbsp;</strong></td>
						<td height='25'>".$soci["CuotaParticipacion"]." %</td>
					  </tr>";
					  
					}
					
					// LOGOPEDAS EMPLEADOS
					if($soci["TipoSocio"]==2) {						
						if($logomas==0) {
							echo "<tr>
							<td height='25' align='right' class='privada' bgcolor='#eaeaea'><strong>Logopedas &nbsp;</strong></td>
							<td height='25' bgcolor='#eaeaea'>&nbsp;</td>
						  </tr>";
						$logomas++;
						}
						echo "<tr>
						<td height='25' align='right' class='privada'><strong>Nombre: &nbsp;</strong></td>
						<td height='25'>".$soci["Nombre"]."</td>
					  </tr>";
					  
					  echo "<tr>
						<td height='25' align='right' class='privada'><strong>N� Colegiado: &nbsp;</strong></td>
						<td height='25'>".$soci["Colegiado"]."</td>
					  </tr>";				  
					}
					
					// OTROS SOCIOS
					if($soci["TipoSocio"]==3) {						
						if($otrosociomas==0) {
							echo "<tr>
							<td height='25' align='right' class='privada' bgcolor='#eaeaea'><strong>Otros Socios &nbsp;</strong></td>
							<td height='25' bgcolor='#eaeaea'>&nbsp;</td>
						  </tr>";
						$otrosociomas++;
						}
						echo "<tr>
						<td height='25' align='right' class='privada'><strong>Nombre: &nbsp;</strong></td>
						<td height='25'>".$soci["Nombre"]."</td>
					  </tr>";
					  
					  echo "<tr>
						<td height='25' align='right' class='privada'><strong>DNI: &nbsp;</strong></td>
						<td height='25'>".$soci["DNI"]."</td>
					  </tr>";
					  
					  echo "<tr>
						<td height='25' align='right' class='privada'><strong>Cargo: &nbsp;</strong></td>
						<td height='25'>".$soci["Cargo"]."</td>
					  </tr>";
					  
					  echo "<tr>
						<td height='25' align='right' class='privada'><strong>Cuota de participacion: &nbsp;</strong></td>
						<td height='25'>".$soci["CuotaParticipacion"]." %</td>
					  </tr>";
					  
					}
				}
			}
			else {
				echo "<tr>\n<td colspan='2'>\n Esta sociedad no tiene dado de alta ning�n socio ni empleado.</td>\n</tr>\n";	
			}
		?>
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 
      <tr>
        <td width="200">&nbsp;</td>
        <td align="right"><a href="edit_sociedad.php?id=<?php echo $_GET["id"]; ?>">Modificar datos</a></td>
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
