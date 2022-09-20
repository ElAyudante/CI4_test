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

    <h1>Lista de inscripciones</h1>
	<table width="700" style="border:none" cellpadding="0" cellspacing="0">
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>        
        <td height="25" align="right" colspan="2">
        <?php
        $concat="SELECT * FROM eventos ORDER BY Id DESC";
		$concat=mysql_query($concat) or die (mysql_error());
		if (mysql_num_rows($concat)>0) {
			echo '<form method="post" action="lista_inscripciones.php" name="lista_inscripciones"><select name="evento" onChange="self.location.href=\'lista_inscripciones.php?c=\'+document.lista_inscripciones.evento.options[document.lista_inscripciones.evento.selectedIndex].value">
						<option>Seleccion el evento que quiere comprobar</option>';
			while($cat=mysql_fetch_array($concat)) {
				echo "<option value='".$cat["Id"]."' ";
				if(isset($_GET["c"])) if($cat["Id"]==$_GET["c"]) echo "selected";
				echo ">".$cat["Evento"]."</option> \n";
			}
			echo '</select> </form>';
		}
		else {
			echo "No existe ningun evento en la Base de Datos";	
		}
		?>
		</td>
      </tr>
      <tr>
        <td height="40" width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">
      <?php
	  	if(isset($_GET["id"])) {
			$sql1="UPDATE inscripciones SET Pagado='".$_GET["cambio"]."' WHERE Id='".$_GET["id"]."'";
			$con1=mysql_query($sql1) or die (mysql_error());
			
			echo "El estado del pago de esta inscripci�n se ha cambiado cambiado correctamente.";
		}
		else {
	  
			if(isset($_GET["c"])) {
				$sql_ecu="SELECT * FROM inscripciones WHERE relEvento='".$_GET["c"]."' ORDER BY Apellidos";
				$con_ecu=mysql_query($sql_ecu) or die (mysql_error());
				if(mysql_num_rows($con_ecu)>0) {
					echo "<p align='right'><a href='lanza_inscripciones.php?c=".$_GET["c"]."' target='_blank'><img src='images/icon_pdf.jpg' width='60' border='0'></a>&nbsp;<a href='lanza_control_firmas.php?c=".$_GET["c"]."' target='_blank'><img src='images/icon_pdf_firmas.jpg' width='75' border='0'></a> &nbsp; <a href='lanza_etiquetas_cursos.php?evento=".$_GET["c"]."'><img src='images/icon_etiquetas.jpg' width='60' border='0'></a>\n</p>";
					echo "<table cellpadding='0' cellspacing='0' width='585'> \n";			  	
					while($campo=mysql_fetch_array($con_ecu)) {
						echo "<tr> \n
					  <td> \n";				  
					  echo "<font color='#FF6600'>&raquo;</font> ".$campo["Apellidos"].", ".$campo["Nombre"]." \n";	
					  if($campo["Fecha"]!="0000-00-00 00:00:00") {
						  $moldeo_fecha=explode(" ", $campo["Fecha"]);
						  $moldeo_fecha2=explode("-",$moldeo_fecha[0]);
						  echo "<span class='pequeno'>Inscrito a las ".$moldeo_fecha[1]." del ".$moldeo_fecha2[2]."-".$moldeo_fecha2[1]."-".$moldeo_fecha2[0]."</span>";
					  }
					  echo "</td> \n
					  </tr> \n
					  <tr>
					  <td align='right' style='border-bottom:1px solid #333333'>
					  <span class='pequeno'>";
					  echo'<form name="f'.$campo["Id"].'"><select name="cambio_estado" onChange="self.location.href=\'lista_inscripciones.php?id='.$campo["Id"].'&cambio=\'+document.f'.$campo["Id"].'.cambio_estado.options[document.f'.$campo["Id"].'.cambio_estado.selectedIndex].value">';
					  echo"<option value='0' ";if(@$campo["Pagado"]==0) echo"selected"; echo ">Pendiente</option>\n";
					  echo"<option value='1' ";if(@$campo["Pagado"]==1) echo"selected"; echo ">Pagado</option>\n";
					  echo"</select></form> &nbsp;&nbsp;&nbsp;";
					  echo"<a href='ver_inscrito.php?id=".$campo["Id"]."'>Ver ficha</a>&nbsp;&nbsp;<a href='borrar_inscrito.php?id=".$campo["Id"]."' onclick=\"return confirm('�Est� seguro de que desea eliminar este colegiado?')\">Eliminar</a></span>
					  </td>
					  </tr>";
					}				
					echo" <tr>
					  <td height='35' align='right' valign='bottom'>&nbsp;</td>
					  </tr>
				<tr>
					  <td height='35' align='right' valign='bottom'>&nbsp;
					  </td>
					  </tr>";
			   echo "</table> \n";
				}
				else {
					echo "<p>No existe ning�n inscrito en este evento.</p>";	
				}
			}
		}
	  ?>  
      </td>
      </tr>     
      <tr>
        <td width="225">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>    
      <tr>
        <td height="25" colspan="2" align="center">&nbsp;</td>
      </tr>
    </table>

	<!-- fin de tabla de contenido-->
    
</div>
<!-- *******************************************************-->

<?php
include ("includes/footer.php");
?>
