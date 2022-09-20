<?php 
    include ("includes/header.php");
?>
<div id="menu_lat">
<?php
    include("menus/switch_menus.php");	
?>
</div>
<!-- *******************************************************-->
<!-- *******************************************************-->
<div id="cont_2">
<h1>Busqueda de colegiados</h1>
<?php
    if( isset($_POST["enviar"]) ) {
        $error = "";
        if (empty($_POST["busqueda"])) {
            $error .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe especificar un t&eacute;rmino de busqueda</font> \n <br>";}				 
        }
			
        if ((isset($_POST['enviar']) || isset($_GET["pagina"])) && !$error) {
            if(isset($_POST["busqueda"])) { 
                $bus = $_POST["busqueda"]; 
            } else { 
                $bus = $_GET["termino"];
            }  
            
            if($bus == " ") { 
                $SQL1="SELECT * FROM colegiados";
            } else {
                $SQL1="SELECT * FROM colegiados WHERE  Nombre LIKE '%$bus%' OR Apellidos LIKE '%$bus%' OR NIF LIKE '%$bus%' OR Email LIKE '%$bus%' OR Telefono LIKE '%$bus%' OR Movil LIKE '%$bus%' OR Colegiado LIKE '%$bus%'";				  
                $res_con1=mysql_query($SQL1) or die ("Intentalo m&aacute;s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
                $filas=mysql_num_rows($res_con1);
                if ($filas<1) {
                    echo "No se han encontrado colegiados en la base de datos con esas caracteristicas."; 
                } else {						
                    $TAMANO_PAGINA = 20;
                    //examino la pagina a mostrar y el inicio del registro a mostrar
                    $pagina = @$_GET["pagina"];
                    if (!$pagina) {
                        $inicio = 0;
                        $pagina=1;
                    } else {
                        $inicio = ($pagina - 1) * $TAMANO_PAGINA;
                    }
                    //calculo el total de paginas
                    $total_paginas = ceil($filas / $TAMANO_PAGINA);
                    if ($bus==" ") {
                        $SQL2="SELECT * FROM colegiados ORDER BY Apellidos, Nombre, Id LIMIT ".$inicio."," .$TAMANO_PAGINA;
                    } else { 
                        $SQL2="SELECT * FROM colegiados WHERE  Nombre LIKE '%$bus%' OR Apellidos LIKE '%$bus%' OR NIF LIKE '%$bus%' OR Email LIKE '%$bus%' OR Telefono LIKE '%$bus%' OR Movil LIKE '%$bus%' OR Colegiado LIKE '%$bus%' ORDER BY Apellidos, Nombre, Id LIMIT ".$inicio."," .$TAMANO_PAGINA;				
                    };	
                    $res_con2=mysql_query($SQL2) or die (mysql_error());						
                    $camp2 = mysql_num_rows($res_con2);
                    //examino la pagina a mostrar y el inicio del registro a mostrar
                    if ($camp2 > 0) {
        		echo "<table cellpadding='2' cellspacing='0' width='650'> \n";					
                    	while ($campo2=mysql_fetch_array($res_con2)) {
                            echo "<tr> \n <td> \n";				  
                            echo "<font color='#FF6600'>&raquo;</font> ".$campo2["Apellidos"].", ".$campo2["Nombre"]." \n";				
                            echo "</td> \n	</tr> \n <tr> <td align='right' style='border-bottom:1px solid #333333'>";
                            echo "<a href='ver_colegiado.php?id=".$campo2["Id"]."'>Ver ficha</a>&nbsp;&nbsp;<a href='edit_colegiado.php?id=".$campo2["Id"]."'>Modificar</a>&nbsp;&nbsp;<a href='borrar_colegiado.php?id=".$campo2["Id"]."' onclick=\"return confirm('�Est� seguro de que desea eliminar este colegiado?')\">Eliminar</a>
							</td>	  </tr>";														
                        } // fin WHILE $campo=mysql_fetch_array($SQL1)	
			echo "<tr><td colspan='2' align='center'>";		
			if ($total_paginas > 1){
                            for ($i=1;$i<=$total_paginas;$i++) {
                                if ($pagina == $i) {
                                    //si muestro el indice de la pagina actual, no coloco enlace
                                    echo "[$pagina]" . " ";
				} else {
				//si el indice no corresponde con la pagina mostrada actualmente, coloco el enlace para ir a esa pagina
                                    echo "<a  href='busca_colegiados.php?termino=".$bus."&pagina=" . $i . "'>" . $i . "</a> "; 
				}
                            }
			}
			echo "</td></tr></table> \n";
				
                    } // fin ELSE mysql_num_rows($SQL1)<0 
                }
            }    
	} else {	
            if (isset($error)) { 
                echo "<div style='float:left'>".$error."</div><br>"; 
            }
        }			
?>
    <form method="post" name="busca_colegiados" action="busca_colegiados.php">
        <table width="650" style="border:none" cellpadding="0" cellspacing="0">
            <tr>
                <td width="200">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="right">Dato colegiado:&nbsp;&nbsp;</td>
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
		
		 
</div>


<?php
include ("includes/footer.php");
?>
