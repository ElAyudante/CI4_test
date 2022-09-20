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
   <h1>Lista de Sociedades</h1>
    <?php 
		unset($_SESSION["sql_lista"]);
		if(isset($_POST["enviar"])) {
		
		  $SQL1="SELECT * FROM sociedades";
		  if($_POST["tipos"]!="todos" || $_POST["anio"]!="todos" || $_POST["comunidad"]!="todos") {
			$SQL1.=" WHERE";  
			if($_POST["anio"]!="todos") {
				$SQL1.=" FechaAlta BETWEEN '".$_POST["anio"]."-01-01' AND '".$_POST["anio"]."-12-31'";
				$nn=1;
			}
			if($nn==1 && $_POST["tipos"]!="todos") $SQL1.=" AND";			
			if($_POST["tipos"]!="todos") {
				$SQL1.=" TipoSociedad='".$_POST["tipos"]."'";			
				$nnn=1;	
			}
			if($nnn==1 && $_POST["comunidad"]!="todos") $SQL1.=" AND";
			if($_POST["comunidad"]!="todos") $SQL1.=" Provincia='".$_POST["comunidad"]."'";
		  }
		  $SQL1.=" ORDER BY Sociedad";		  
		  
		  
		  $_SESSION["sql_lista"]=$SQL1;
		  $res_con1=mysql_query($SQL1) or die ("Intentalo m�s tarde. Ha habido un problema con la base de datos. Disculpa las molestias");
		  $num_res1=mysql_num_rows($res_con1);
		  if ($num_res1<1) {
			echo "<p>No existe ninguna socidad bajo ese criterio de b�squeda. <a href='lista_sociedades.php'>Volver a la b�squeda principal</a></a>";  
		  } // fin IF mysql_num_rows($SQL1)<0		
		  else {			
			  echo "<table cellpadding='0' cellspacing='0' width='585'> \n";
			  echo "<tr> \n
				  <td> &nbsp;</td> \n
				  </tr> \n
				  <tr>
				  <td height='35' align='right'>
				  <a href='lista_sociedades.php'>Volver a la b�squeda principal</a> \n
				  <p align='right'><a href='lanza_listado_sociedades.php'><img src='images/icon_pdf.jpg' width='60' border='0'></a></p>
				  </td>
				  </tr>";
			  while ($campo=mysql_fetch_array($res_con1)) {
				  echo "<tr> \n
				  <td> \n";				  
				  echo "<font color='#FF6600'>&raquo;</font> ".$campo["Sociedad"]." \n";				
				  echo "</td> \n
				  </tr> \n
				  <tr>
				  <td align='right' style='border-bottom:1px solid #333333'>
				  <span class='pequeno'><a href='ver_sociedad.php?id=".$campo["Id"]."'>Ver ficha</a>&nbsp;&nbsp;<a href='edit_sociedad.php?id=".$campo["Id"]."'>Modificar</a>&nbsp;&nbsp;<a href='borrar_sociedades.php?id=".$campo["Id"]."' onclick=\"return confirm('�Est� seguro de que desea eliminar esta sociedad?')\">Eliminar</a></span>
				  </td>
				  </tr>";
			  } // fin WHILE $campo=mysql_fetch_array($SQL1)					
			echo" <tr>
				  <td height='35' align='right' valign='bottom'>&nbsp;</td>
				  </tr>
			<tr>
				  <td height='35' align='right' valign='bottom'>
				  <a href='lista_sociedades.php'>Volver a la b�squeda principal</a> \n
				  <p align='right'><a href='lanza_listado_sociedades.php'><img src='images/icon_pdf.jpg' width='60' border='0'></a></p>
				  </td>
				  </tr>";
		   echo "</table> \n";		   
			
		   } // fin ELSE mysql_num_rows($SQL1)<0	
		   
		   
		}
		else {
		?>
        <form method="post" name="lista_sociedades" action="lista_sociedades.php">
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">      
       <tr>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>   
      <tr>
      <td width="200" height="25" align="right" class="privada">A&ntilde;o de alta: &nbsp;&nbsp;</td>
      <td><select name="anio">
      		<option value="todos">Todos</option>	
        	<option value="2011">2011</option>	
            <?php 
				if(date("Y")>2011) {
					for($aa=2012;$aa<=date("Y");$aa++) {
						echo "<option value='$aa'>$aa</option> \n";
					}
				}	
			?>        		
        </select> 
        </td>
      </tr>      
      <tr>
      	<td width="200" height="25" align="right" class="privada">Tipo sociedad: &nbsp;&nbsp;</td>
        <td><select name="tipos">
        	<option value="todos">Todas</option>	
        	<?php
				$sql_t="SELECT DISTINCT TipoSociedad FROM sociedades";
				$con_t=mysql_query($sql_t) or die (mysql_error());
				if(mysql_num_rows($con_t)>0) {
					while($tipo_s=mysql_fetch_array($con_t)) {
						echo "<option value='".$tipo_s["TipoSociedad"]."'>".$tipo_s["TipoSociedad"]."</option>\n";	
					}
				}
			?>
        </select></td>
      </tr>
      <tr>
      	<td width="200" height="25" align="right" class="privada">Comunidad: &nbsp;&nbsp;</td>
        <td><select name="comunidad" tabindex="1">
         <option value="todos" >Todas</option>
         <option value="Andalucia" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Andalucia") echo "selected";?>>Andalucia</option>
         <option value="Aragon" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Aragon") echo "selected";?>>Aragon</option>
         <option value="Asturias" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Asturias") echo "selected";?>>Asturias</option>
         <option value="Baleares" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Baleares") echo "selected";?>>Baleares</option>  
         <option value="Canarias" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Canarias") echo "selected";?>>Canarias</option>
         <option value="Cantabria" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Cantabria") echo "selected";?>>Cantabria</option>
         <option value="Castilla La Mancha" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Castilla La Mancha") echo "selected";?>>Castilla La Mancha</option>  
         <option value="Castilla Leon" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Castilla Leon") echo "selected";?>>Castilla Leon</option>
         <option value="Catalu�a" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Catalu�a") echo "selected";?>>Catalu�a</option>
         <option value="Ceuta" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Ceuta") echo "selected";?>>Ceuta</option>
         <option value="Comunidad Valenciana" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Comunidad Valenciana") echo "selected";?>>Comunidad Valenciana</option>
         <option value="Extremadura" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Extremadura") echo "selected";?>>Extremadura</option>
         <option value="Galicia" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Galicia") echo "selected";?>>Galicia</option>
         <option value="La Rioja" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="La Rioja") echo "selected";?>>La Rioja</option>
         <option value="Madrid" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Madrid") echo "selected";?>>Madrid</option> 
         <option value="Melilla" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Melilla") echo "selected";?>>Melilla</option>
         <option value="Navarra" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Navarra") echo "selected";?>>Navarra</option> 
         <option value="Pais Vasco" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Pais Vasco") echo "selected";?>>Pais Vasco</option>
         <option value="Region de Murcia" <?php if(isset($_POST["comunidad"]) && $_POST["comunidad"]=="Region de Murcia") echo "selected";?>>Region de Murcia</option>         
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
