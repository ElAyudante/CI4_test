<?php 
include ("includes/header.php");
?>

<div id="menu_lat">
<?php
    include("menus/switch_menus.php");	
?>
</div>

<div id="cont_2">
<h1>Busqueda de reclamaciones</h1>
<?php
    if(isset($_POST["enviar"])) {
        $error="";
        if (empty($_POST["busqueda"])){
            $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe especificar un t&eacute;rmino de b�squeda</font> \n <br>";}				 
        }
			
			  if ((isset($_POST['enviar']) || isset($_GET["pagina"])) && !$error) {
			  
			  	$bus=$_POST["busqueda"];
			  
				  if($bus==" ") $SQL1="SELECT * FROM reclamaciones";
				  else $SQL1="SELECT * FROM reclamaciones WHERE Nombre LIKE '%$bus%' OR Apellidos LIKE '%$bus%' OR Email LIKE '%$bus%' OR Telefono LIKE '%$bus%'";				  
				  $res_con1=mysql_query($SQL1) or die ("Intentalo m&aacute;s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
				  $filas=mysql_num_rows($res_con1);
				  if ($filas<1) {
					  	echo "No se han encontrado reclamaciones en la base de datos con esas caracter�sticas."; 
				  } // fin IF mysql_num_rows($SQL1)<0					
				  else {						
						
					$TAMANO_PAGINA = 20;
				
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
					if($bus==" ") $SQL2="SELECT * FROM reclamaciones ORDER BY Apellidos, Nombre, Id LIMIT ".$inicio."," .$TAMANO_PAGINA;
				 	 else $SQL2="SELECT * FROM reclamaciones WHERE Nombre LIKE '%$bus%' OR Apellidos LIKE '%$bus%' OR Email LIKE '%$bus%' OR Telefono LIKE '%$bus%' ORDER BY Apellidos, Nombre, Id LIMIT ".$inicio."," .$TAMANO_PAGINA;				
					
					$res_con2=mysql_query($SQL2) or die (mysql_error());						
					$camp2 = mysql_num_rows($res_con2);
					//examino la p�gina a mostrar y el inicio del registro a mostrar
					
			    	if ($camp2 > 0) {
						
						echo "<table cellpadding='2' cellspacing='0' width='650' class='texto'> \n";					
						while ($campo2=mysql_fetch_array($res_con2)) {
						
							echo "<tr> \n
							<td> \n";				  
							echo "<font color='#FF6600'>&raquo;</font> ".$campo2["Apellidos"].", ".$campo2["Nombre"]." \n";				
							echo "</td> \n
							</tr> \n
							<tr>
							<td align='right' style='border-bottom:1px solid #333333'>
							<a href='responder_reclamacion.php?id=".$campo2["Id"]."'>Ver reclamaci�n</a>&nbsp&nbsp;
							</td>
				  </tr>";														
						} // fin WHILE $campo=mysql_fetch_array($SQL1)	
						
						echo "<tr><td colspan='2' align='center'>";		
						if ($total_paginas > 1){
							for ($i=1;$i<=$total_paginas;$i++){
								if ($pagina == $i) {
								//si muestro el �ndice de la p�gina actual, no coloco enlace
								echo "[$pagina]" . " ";
								}
								else {
								//si el �ndice no corresponde con la p�gina mostrada actualmente, coloco el enlace para ir a esa p�gina
								echo "<a  href='busca_reclamaciones.php?pagina=" . $i . "'>" . $i . "</a> "; 
								}
							}
						}
							
						
					echo "</td></tr></table> \n";
				
					} // fin ELSE mysql_num_rows($SQL1)<0 
				}
			  }
			  else {	
	  		
				 if (isset($error)) { echo "<div style='float:left'>".$error."</div><br>"; }
				
				?>
                <form method="post" name="busca_reclamaciones" action="busca_reclamaciones.php">
                <table width="650" style="border:none" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="200">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right" class="texto">Dato colegiado:&nbsp;&nbsp;</td>
                    <td height="25">
                        <input type="text" name="busqueda" size="20" value="<?php if(isset($_POST["busqueda"])) echo $_POST["busqueda"]; ?>">
                    </td>
                    </tr>
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" name="enviar" value="Enviar">
                    </td>
                    </tr>
                    </table>
                    </form>	
		
			<?php
            }
            ?>		 
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
