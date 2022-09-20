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
	
	if(isset($_GET["tiempo"])) $tiempo=$_GET["tiempo"];
	
	if(isset($_GET["tiempo"])) $SQL1="SELECT * FROM pedidos WHERE DATEDIFF(now(), Fecha_compra)<='$tiempo' ORDER BY Id DESC";
	else $SQL1="SELECT * FROM pedidos ORDER BY Id DESC";
	
    $res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
	$filas=mysql_num_rows($res_con1);
	if ($filas<1) {
	 	echo "No se han encontrado pedidos en la base de datos."; 
	}					
	else {						
		$TAMANO_PAGINA = 15;
		//examino la p�gina a mostrar y el inicio del registro a mostrar
		$pagina = @$_GET["pagina"];
		if (!$pagina) {
			$inicio = 0;
			$pagina=1;
		}
		else {
			$inicio = ($pagina - 1) * $TAMANO_PAGINA;
		}
				
		/**************************************************/

		//calculo el total de p�ginas
		
		$total_paginas = ceil($filas / $TAMANO_PAGINA);
		
		if(isset($_GET["tiempo"])) $SQL2="SELECT pedidos.*, relPedidos.Articulo FROM pedidos,relPedidos WHERE DATEDIFF(now(), pedidos.Fecha_compra)<='$tiempo' AND pedidos.referencia=relPedidos.relPedido ORDER BY Id DESC LIMIT ".$inicio.", ".$TAMANO_PAGINA;
		else $SQL2="SELECT pedidos.*, relPedidos.Articulo FROM pedidos,relPedidos WHERE pedidos.referencia=relPedidos.relPedido ORDER BY Id DESC LIMIT ".$inicio."," .$TAMANO_PAGINA;
		$res_con2=mysql_query($SQL2);				
		$campo2 = mysql_num_rows($res_con2);
		//examino la p�gina a mostrar y el inicio del registro a mostrar
					
	    if ($campo2 > 0) {					
						
			echo "<table cellpadding='2' cellspacing='0' width='650' class='texto'> \n";	
			echo '<tr>
                    <td colspan="9" align="right" height="40"><input type="button" onClick="window.location=\'lista_operaciones.php?tiempo=0\'" value="Operaciones de hoy" > &nbsp;&nbsp;<input type="button" onClick="window.location=\'lista_operaciones.php?tiempo=2\'" value="&Uacute;ltimos 2 d&iacute;as" > &nbsp;&nbsp; <input type="button" onClick="window.location=\'lista_operaciones.php?tiempo=7\'" value="&Uacute;ltima Semana" > &nbsp;&nbsp;<input type="button" onClick="window.location=\'lista_operaciones.php?tiempo=15\'" value="&Uacute;ltimos 15 d&iacute;as" ></td>           
                  </tr>';					
			echo "<tr bgcolor='#CCCCCC'>
			<td align='center' width='60'><strong>Referencia</strong></td>
			<td align='center' width='110'><strong>Fecha</strong></td>
			<td align='center' width='140'><strong>Colegiado</strong></td>			
			<td align='center'><strong>Evento</strong></td>
			<td align='center' colspan='9'><strong>Funciones</strong></td>";
			echo "</tr> \n";		
			while ($campo2=mysql_fetch_array($res_con2)) {
						
				
				echo "<tr> \n
				<td align='center' style='border:1px solid #666666'>".$campo2["Referencia"]."</td> \n";
				
				$tipo_usuario=explode("s",$campo2["Referencia"]);
				if($tipo_usuario[0]=="in") $tab="inscripciones"; else $tab="colegiados";
						
				$sql_cliente="SELECT Id, Nombre, Apellidos FROM ".$tab." WHERE Id = '".str_replace ("ins", "",$campo2["Cod_cliente"])."'";				
				$con_cliente=mysql_query($sql_cliente) or die (mysql_error());
				$ncliente=mysql_fetch_array($con_cliente);
						
				echo "<td align='center' style='border:1px solid #666666'>".$campo2["Fecha_compra"]."</td> \n";		
				echo "<td valign='top' style='border:1px solid #666666'> \n";						
				echo  $ncliente["Nombre"]. " ".$ncliente["Apellidos"];				
				echo "</td> \n		
				<td width='180' valign='middle' style='border:1px solid #666666'>".$campo2["Articulo"]."</td> \n";							
				/*	
				if($campo2["NFactura"]!="") {
					echo "<td width='15'  align='center' valign='middle' style='border:1px solid #666666'> \n";	
							 echo "<a href='../factura.php?id=".$campo2["Referencia"]."' target='_blank' ><img src='../images/icon_descarga_factura.gif' width='20' height='20' style='border:none' alt='Imprimir factura' title='Imprimir Factura'></a>";	
					echo "</td> \n";
				}
				else {
					echo "<td width='15'  align='center' valign='middle' style='border:1px solid #666666'> \n";					
					echo "<a href='facturas.php?ref=".$campo2["Referencia"]."'  target='_blank'><img src='../images/icon_factura.gif' width='20' height='20' style='border:none' alt='Indique el numero de la factura' title='Indique el numero de la factura'></a>";									
					echo "</td> \n	";
				}
				*/
				// borrar pedidos
				echo "<td width='15'  align='center' valign='middle' style='border:1px solid #666666'> \n";						
				echo "<a href='borrar_pedidos.php?ref=".$campo2["Referencia"]."'><img src='images/delete.gif' width='12' height='14' style='border:none' alt='Eliminar Pedido' title='Eliminar operaci&oacute;n' onclick=\"return confirm('&iquest;Est&aacute; seguro de que desea eliminar esta operacion?')\"></a>";									
				echo "</td> \n";		
				echo "<td width='80' colspan='5'  valign='middle' style='border:1px solid #666666'> \n";						
						
				
				?><form name="cambio_status<?php echo str_replace("-","",$campo2["Referencia"]);?>">
                <select name="estado" onChange="self.location.href='cambio_status.php?c='+document.cambio_status<?php echo str_replace("-","",$campo2["Referencia"]);?>.estado.options[document.cambio_status<?php echo str_replace("-","",$campo2["Referencia"]);?>.estado.selectedIndex].value+'&id=<?php echo $campo2["Referencia"];?>'">				
				<option value='0' style='background-color:#71cef5'<?php if ($campo2["Estado"]==0) echo " selected";?> >Pendiente</option>
                <option value='1' style='background-color:#71cef5'<?php if ($campo2["Estado"]==1) echo " selected";?> >Proceso</option>
				<option value='2' style='background-color:#79db95'<?php if ($campo2["Estado"]==2) echo " selected"; ?>>Confirmado</option>
				<option value='3' style='background-color:#ff0000'<?php if ($campo2["Estado"]==3) echo " selected"; ?>>Error</option>	
                <option value='4' style='background-color:#ff0000'<?php if ($campo2["Estado"]==4) echo " selected"; ?>>Anulado</option>	
				</select>
                </form>               
                <?php
									
				echo "</td> \n																
				</tr> \n";
				
						
			} // fin WHILE $campo=mysql_fetch_array($SQL1)	
			echo "<tr><td colspan='8' align='center'>";
			if ($total_paginas > 1){
				for ($i=1;$i<=$total_paginas;$i++){
					if ($pagina == $i) {
					//si muestro el �ndice de la p�gina actual, no coloco enlace
						echo "[$pagina]" . " ";
					}
					else {
								//si el �ndice no corresponde con la p�gina mostrada actualmente, coloco el enlace para ir a esa p�gina
								
								echo "<a  href='lista_operaciones.php?pagina=" . $i ;
								if(isset($_GET["tiempo"])) echo "&tiempo=".$_GET["tiempo"];
								echo "'>" . $i . "</a> "; 
					}
				}
			}
								
			echo "</td></tr></table> \n";
						
		} // fin ELSE mysql_num_rows($SQL1)<0 
	}		
?>
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
