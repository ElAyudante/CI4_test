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
   <h1>Lista de Colegiados</h1>
    <?php 		
		if(isset($_POST["enviar"]) || isset($_GET["orden"])) {
		
			if(isset($_GET["orden"])) {
				$SQL1=$_SESSION["sql_lista"];
			}
			else{
				$SQL1="SELECT * FROM colegiados";
				if($_POST["ejercientes"]!="todos" || $_POST["bolsa"]!="todos" || $_POST["sector"]!="todos" || $_POST["diplomados"]!="todos" || $_POST["comunidad"]!="todos" || $_POST["colegiadosactivos"]!="todos") {
					$SQL1.=" WHERE";  
					if($_POST["ejercientes"]!="todos") $SQL1.=" Ejerciente='".$_POST["ejercientes"]."'"; else $SQL1.=" (Ejerciente='0' OR Ejerciente='1' OR Ejerciente='2' OR Ejerciente='3')";
					if($_POST["bolsa"]!="todos") $SQL1.=" AND AltaBolsaTrabajo='".$_POST["bolsa"]."'";
					if($_POST["sector"]!="todos") {
						if($_POST["sector"]==1)$SQL1.=" AND Publico='1'";
						if($_POST["sector"]==0)$SQL1.=" AND Privado='1'";
					}
					if($_POST["colegiadosactivos"]!="todos") {
						if($_POST["colegiadosactivos"]==1)$SQL1.=" AND Activo='1'";
						if($_POST["colegiadosactivos"]==0)$SQL1.=" AND Activo='0'";
					}
								
					if($_POST["diplomados"]!="todos") $SQL1.=" AND DiplomaturaLogopedia='".$_POST["diplomados"]."'";
					if($_POST["comunidad"]!="todos") $SQL1.=" AND Comunidad='".$_POST["comunidad"]."'";
				}			 		  
		 		$_SESSION["sql_lista"]=$SQL1;		 
			}
			if(isset($_GET["orden"])) {
				 if($_GET["orden"]==1) $SQL1.=" ORDER BY Colegiado";
				 else $SQL1.=" ORDER BY Apellidos, Nombre";
			 }
			 else $SQL1.=" ORDER BY Apellidos, Nombre";	
			 
			 //GUARDO LA CONSULTA PARA EL LANZAMIENTO DEL EXCEL
			 $_SESSION["consulta_excel"]=$SQL1;	  
			 
			 
		  $res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		  $num_res1=mysql_num_rows($res_con1);
		  if ($num_res1<1) {
			echo "<p>No existe ning�n colegiado bajo ese criterio de b�squeda. <a href='lista_colegiados.php'>Volver a la b�squeda principal</a></a>";  
		  } // fin IF mysql_num_rows($SQL1)<0		
		  else {			
			  echo "<table cellpadding='0' cellspacing='0' width='585'> \n";
			  echo "<tr> \n
				  <td> &nbsp;</td> \n
				  </tr> \n				 
				  <tr>
				  <td height='35' align='right'>
				  <a href='lista_colegiados.php'>Volver a la b�squeda principal</a> \n
				  <p align='right'><a href='lanza_excel.php' target='_blank'><img src='images/icon_excel.jpg' width='60' border='0'></a>&nbsp;&nbsp;<a href='lanza_listado.php' target='_blank'><img src='images/icon_pdf.jpg' width='60' border='0'></a>&nbsp;&nbsp;<a href='lanza_etiquetas.php' target='_blank'><img src='images/icon_etiquetas.jpg' width='60' border='0'></a></p>
				  <p align='right'><a href='lista_colegiados.php?orden=a'>Ordenar A-Z</a> &nbsp;&nbsp;<a href='lista_colegiados.php?orden=1'>Ordenar por N�</a></p>
				  </td>
				  </tr>
				   <tr> \n
				  <td> N&uacute;mero de colegiados: ".$num_res1."</td> \n
				  </tr> \n
				  <tr> \n
				  <td> &nbsp;</td> \n
				  </tr> \n";
				  
			  while ($campo=mysql_fetch_array($res_con1)) {
				  echo "<tr> \n
				  <td> \n";				  
				  echo "<font color='#FF6600'>&raquo;</font> ".$campo["Apellidos"].", ".$campo["Nombre"]." \n";				
				  echo "</td> \n
				  </tr> \n
				  <tr>
				  <td align='right' style='border-bottom:1px solid #333333'>
				  <span class='pequeno'><a href='ver_colegiado.php?id=".$campo["Id"]."'>Ver ficha</a>&nbsp;&nbsp;<a href='edit_colegiado.php?id=".$campo["Id"]."'>Modificar</a>&nbsp;&nbsp;<a href='borrar_colegiado.php?id=".$campo["Id"]."' onclick=\"return confirm('�Est� seguro de que desea eliminar este colegiado?')\">Eliminar</a></span>
				  </td>
				  </tr>";
			  } // fin WHILE $campo=mysql_fetch_array($SQL1)					
			echo" <tr>
				  <td height='35' align='right' valign='bottom'>&nbsp;</td>
				  </tr>
			<tr>
				  <td height='35' align='right' valign='bottom'>
				  <a href='lista_colegiados.php'>Volver a la b�squeda principal</a> \n
				  <p align='right'><a href='lanza_excel.php' target='_blank'><img src='images/icon_excel.jpg' width='60' border='0'></a>&nbsp;&nbsp;<a href='lanza_listado.php' target='_blank'><img src='images/icon_pdf.jpg' width='60' border='0'></a>&nbsp;&nbsp;<a href='lanza_etiquetas.php' target='_blank'><img src='images/icon_etiquetas.jpg' width='60' border='0'></a></p>
				  <p align='right'><a href='lista_colegiados.php?orden=a'>Ordenar A-Z</a> &nbsp;&nbsp;<a href='lista_colegiados.php?orden=1'>Ordenar por N�</a></p>
				  </td>
				  </tr>";
		   echo "</table> \n";		   
			
		   } // fin ELSE mysql_num_rows($SQL1)<0	
		   
		   
		}
		else {
		?>
        <form method="post" name="lista_colegiados" action="lista_colegiados.php">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">      
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td width="200" height="25" align="right" class="privada">Ejercientes:&nbsp;&nbsp;</td>
        <td><select name="ejercientes">
        	<option value="todos">Todos</option>	
            <option value="1">Ejercientes</option>	
        	<option value="0">No ejercientes</option>
            <option value="2">Jubilados</option>
            <option value="3">Estudiantes</option>	
        </select>        
        </td>
      </tr>
      <tr>
      <td width="200" height="25" align="right" class="privada">Bolsa de Trabajo:&nbsp;&nbsp;</td>
      <td>       
        <select name="bolsa">
        	<option value="todos">Todos</option>	
        	<option value="1">Apuntados</option>	
        	<option value="0">No apuntados</option>	
        </select>
        </td>
      </tr>
      <tr>
      <td width="200" height="25" align="right" class="privada">Sector: &nbsp;&nbsp;</td>
      <td><select name="sector">
      		<option value="todos">Todos</option>	
        	<option value="1">Publico</option>	
        	<option value="0">Privado</option>	
        </select> 
        </td>
      </tr>      
      <tr>
      	<td width="200" height="25" align="right" class="privada">Titulación: &nbsp;&nbsp;</td>
        <td><select name="diplomados">
        	<option value="todos">Todos</option>	
        	<option value="1">Con diplomatura</option>	
        	<option value="0">Habilitados</option>	
        </select></td>
      </tr>
      <tr>
      	<td width="200" height="25" align="right" class="privada">Comunidad: &nbsp;&nbsp;</td>
        <td><select name="comunidad" tabindex="1">
         <option value="todos" >Todas</option>
         <?php
		 	$sql_com="SELECT DISTINCT Comunidad FROM colegiados ORDER BY Comunidad";
			$con_com=mysql_query($sql_com) or die(mysql_error());
			if(mysql_num_rows($con_com)>0) {
				while($pro=mysql_fetch_array($con_com)) {
					echo "<option value='".$pro["Comunidad"]."'";
					if(isset($_POST["comunidad"]) && $_POST["comunidad"]==$pro["Comunidad"]) echo "selected";
					echo ">".$pro["Comunidad"]."</option>\n";	
				}
			}
			
		 ?>              
       </select></td>
      </tr>
      <tr>
      	<td width="200" height="25" align="right" class="privada">Activos: &nbsp;&nbsp;</td>
        <td><select name="colegiadosactivos">
        	<option value="todos">Todos</option>	
        	<option value="1">Activos</option>	
        	<option value="0">No activos</option>	
        </select></td>
      </tr>
      <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>        
        <td colspan="2" align="right"><input type="submit" name="enviar" value="Buscar" /></td>
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
