<?php session_start();

	include("../php/configuracion.php");
	$ref=$_GET["ref"];
	$_SESSION["r"]=$ref;
	
		if(isset($_POST["enviar"])) {	
		// VALIDAMOS EL FORMULARIO
			$error="";			
			if(isset($_POST["nombre"]) && $_POST["nombre"]=="") $error.="<font color='red'>Debe indicar el nombre del cliente/empresa.</font><br>";
			if(isset($_POST["cif"]) && $_POST["cif"]=="") $error.="<font color='red'>Debe indicar el NIF/CIF del cliente/empresa.</font><br>";
			if(isset($_POST["direccion"]) && $_POST["direccion"]=="") $error.="<font color='red'>Debe indicar la direccion del cliente/empresa.</font><br>";
			if(isset($_POST["cp"]) && $_POST["cp"]=="") $error.="<font color='red'>Debe indicar el c�digo postal del cliente/empresa.</font><br>";	
			if(isset($_POST["localidad"]) && $_POST["localidad"]=="") $error.="<font color='red'>Debe indicar la localidad del cliente/empresa.</font><br>";
			if(isset($_POST["provincia"]) && $_POST["provincia"]=="") $error.="<font color='red'>Debe indicar la provincia del cliente/empresa.</font><br>";
			if(isset($_POST["factura"]) && $_POST["provincia"]=="") $error.="<font color='red'>Debe indicar el numero de factura.</font><br>";
			if(isset($_POST["fecha"]) && $_POST["provincia"]=="") $error.="<font color='red'>Debe indicar la fecha de la factura.</font><br>";
			
			// FIN DE LA VALIDACION DEL FORMULARIO		
		}
		
		if(isset($_POST["enviar"])&& !$error) {	
			$_SESSION["nom"]=$_POST["nombre"];
			$_SESSION["cif"]=$_POST["cif"];
			$_SESSION["dir"]=$_POST["direccion"];
			$_SESSION["loc"]=$_POST["localidad"];
			$_SESSION["cp"]=$_POST["cp"];
			$_SESSION["pro"]=$_POST["provincia"];
			$_SESSION["fac"]=$_POST["factura"];
			$_SESSION["fecha"]=$_POST["fecha"];
			//INSERTO LOS DATOS EN LA TABLA DE FACTURAS PROFORMA --proformas-			
			$sql_prof="INSERT INTO facturas VALUES ('', '".$_POST["nombre"]."', '".$_POST["cif"]."', '".$_POST["direccion"]."', '".$_POST["cp"]."', '".$_POST["localidad"]."', '".$_POST["provincia"]."', '".$_SESSION["r"]."', '".$_SESSION["fac"]."', '".$_SESSION["fecha"]."')";
			$con_prof=mysql_query($sql_prof) or die (mysql_error());			
		
		
			// DATOS GENERALES DEL PRESUPUESTO
			$sql_ped="SELECT * FROM sis_presupuestos WHERE Id='$ref'";
			$con_ped=mysql_query($sql_ped) or die (mysql_error());	
			if (mysql_num_rows($con_ped)== 0) {
			echo "No existe ningun presupuesto con esa referencia. Compruebe que est� escrita correctamente. \n";		
			} else {
				$dat=mysql_fetch_array($con_ped);
				
				$fecha1=explode(" ",$dat["Fecha"]);
				$fecha2=explode("-",$fecha1[0]);
				$fecha_final=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
			}		
			
			// DATOS DEL CLIENTE
			$sql_cli="SELECT * FROM clientes WHERE Id='".$dat["relCliente"]."'";
			$con_cli=mysql_query($sql_cli) or die (mysql_error());	
			if (mysql_num_rows($con_cli)== 0) {
			echo "No existe ningun cliente con esa referencia. Compruebe que est� escrita correctamente. \n";		
			} else {
				$cli=mysql_fetch_array($con_cli);
			}
			
			// DATOS ESPEC�FICOS DEL PRESUPUESTO
			$sql_pre="SELECT * FROM relSis_presupuestos WHERE relPresupuesto='$ref'";
			$con_pre=mysql_query($sql_pre) or die (mysql_error());
			if (mysql_num_rows($con_pre)==0) { echo "Se ha producido un error. No hay referencias descritas en el presupuesto"; 
			} 	
			
			// DATOS DE LA CONSULTA DEL USUARIO
			$sql_his="SELECT * FROM historico_presupuestos WHERE Id='".$dat["relHistorico"]."'";
			$con_his=mysql_query($sql_his) or die (mysql_error());
			if (mysql_num_rows($con_his)==0) { echo "Se ha producido un error. No hay referencias descritas en el presupuesto"; 
			} 	else {
			$his=mysql_fetch_array($con_his);
			}			
				
			
	
					
			
			require('../FPDF/fpdf.php');
			
			class PDF extends FPDF {
				//Cabecera de p�gina
				function Header() {
					
					$this->SetFont('Arial','B',14);
					$this->SetTextColor(229,8,122);
					$this->Cell(190,8,'www.demetacrilato.com',0,'','L');
					
					
					$this->Ln(6);
				
					$this->SetFont('Arial','B',7);
					$this->SetTextColor(0,0,0);
					$this->Cell(95,4,'VENTA ONLINE DE METACRILATO', 'B','','L');
					$this->SetFont('Arial','I',11);	
					$this->SetTextColor(229,8,122);
					//imagen de la cabecera
					$this->Image('../images/fpdf/marca_OK.jpg',172,14,5,6);
					$this->Cell(95,4,'de confianza','B','','R');
					
					$this->Ln(5);
					
					
					$valor1="DIGITAL PRESS, S.L. \nB-39400676 \nPol�gono Heras, 247-248 \n39792 HERAS, CANTABRIA";
					$valor2="Atenci�n al cliente 902 107 308\ninfo@demetacrilato.com";
					
					$x=$this->GetX();
					$y=$this->GetY();	
					
					$this->SetFont('Arial','',8);
					$this->SetTextColor(0,0,0);
					$this->MultiCell(95,3,$valor1,0,'L');
					
					$yy=$this->GetY();
					$this->SetXY($x+95,$y);
					
					$this->MultiCell(95,3,$valor2,0,'R');
					
					//Salto de l�nea
					$this->Ln(10);
				}
				
				function Footer() {
					
							if(date("Y-m-d")<"2010-07-1") $iva=16;
							else $iva=18;	
							
							$sql_ped="SELECT * FROM sis_presupuestos WHERE Id='".$_SESSION["r"]."'";
							$con_ped=mysql_query($sql_ped) or die (mysql_error());	
							if (mysql_num_rows($con_ped)== 0) {
							echo "No existe ningun presupuesto con esa referencia. Compruebe que est� escrita correctamente. \n";		
							} else {
								$dat=mysql_fetch_array($con_ped);
								
								$fecha1=explode(" ",$dat["Fecha"]);
								$fecha2=explode("-",$fecha1[0]);
								$fecha_final=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
							}
				
						$this->SetY(-55);
						$this->Cell(3);
						$this->Cell(32,6,'Subtotal','B','','L');
						$this->Cell(32,6,'Base Imponible','B','','C');
						$this->Cell(26,6,'% IVA','B','','C');
						$this->Cell(26,6,'Cuota','B','','C');
						$this->Cell(39,6,'R Equivalencia','B','','C');
						$this->Cell(32,6,'Total Euros','B','','R');
						
						$this->Ln();
						
						if($_POST["iva"]==1) {
							$porcentaje_iva="18%";
							$importe_iva=number_format($dat["IVA"],2,",",".");
							$importe_final=number_format($dat["Total"],2,",",".");
						}
						else {
							$porcentaje_iva="";
							$importe_iva="";
							$importe_final=($dat["Total"]-$dat["IVA"]);
						}
				
						$this->SetFont('Arial','B',8);
						$this->Cell(3);
						$this->Cell(32,6,number_format($dat["Subtotal"],2,",","."),0,'','L');
						$this->Cell(32,6,number_format($dat["Subtotal"],2,",","."),0,'','C');
						$this->Cell(26,6,$porcentaje_iva,0,'','C');
						$this->Cell(26,6,$importe_iva,0,'','C');
						$this->Cell(39,6,'',0,'','C');
						$this->Cell(32,6,number_format($importe_final,2,",","."),0,'','R');
					
						
						$pres2="DATOS BANCARIOS \n";
						$pres2.="Beneficiario: DIGITAL PRESS, S.L.\n";
						$pres2.="Entidad: BANCO POPULAR\n";
						$pres2.="N� CUENTA: 0075 1046 11 0600103342 \n";		
						//Posici�n: a X cm del final
						$this->SetY(-30);	
						$this->SetFont('Arial','',8);
						$this->MultiCell(190,4,$pres2,0);
						
						$this->Ln(5);
						//Arial italic 8
						$this->SetFont('Arial','I',8);
						//N�mero de p�gina
						$this->Cell(155,'','Inscrita en el R.M. Santander, tomo 608 Secci�n General Folio 147, hoja S-7598 inscripci�n 1�','/{nb}',0,0,'C');	
				}
			}

		//Creaci�n del objeto de la clase heredada
		$pdf=new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',9);
	
		$pdf->Ln(5);
		$pdf->Cell(3);
		$pdf->Cell(80,5,"FACTURA",0,'','l');		
		
		$datos_cliente="CLIENTE: ".$_SESSION["nom"]."\n";		
		$datos_cliente.="DIRECCION: ".$_SESSION["dir"]."\n";
		$datos_cliente.="DIRECCION: ".$_SESSION["cp"]." ".$_SESSION["loc"]." (".$_SESSION["pro"].")\n";
		
		$pdf->MultiCell(110,4,$datos_cliente,0,'L');	
		
		
		$pdf->Ln(15);
		
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(3);
		$pdf->Cell(18,6,'FECHA','B','','C');
		$pdf->Cell(69,6,'N� FACTURA','B','','C');
		$pdf->Cell(50,6,'N� CLIENTE','B','','C');	
		$pdf->Cell(50,6,'CIF/NIF CLIENTE','B','','C');
		
		$pdf->Ln();
		
		$cortes_fecha=explode("-",$_SESSION["fecha"]);
		$fecha_final=$cortes_fecha[2].".".$cortes_fecha[1].".".$cortes_fecha[0];
		
		$pdf->Cell(3);
		$pdf->Cell(18,5,$fecha_final,0,'','C');
		$pdf->Cell(69,5,$_SESSION["fac"],0,'','C');
		$pdf->Cell(50,5,$cli["Id"],0,'','C');	
		$pdf->Cell(50,5,$_SESSION["cif"],0,'','C');
		
		$pdf->Ln(16);
		
		// imprimimos las cajas de los articulos
		
		$pdf->Cell(3);	
		$pdf->Cell(127,6,'DESCRIPCI�N','B','','L');
		$pdf->Cell(17,6,'CANTIDAD','B','','R');
		$pdf->Cell(17,6,'PRECIO','B','','R');
		$pdf->Cell(26,6,'IMPORTE','B','','R');
		
		$pdf->Ln();
		while($rped=mysql_fetch_array($con_pre)) {
		$pdf->Ln(1);
		$importe=$rped["Precio"]*$rped["Unidades"];
		$importe=number_format($importe,2,",",".");
		$pdf->Cell(3);
		
		$x=$pdf->GetX();
		$y=$pdf->GetY();
		
		$pdf->MultiCell(127,4,$rped["Descripcion"],0,'L');	
		
		$yy=$pdf->GetY();
		$pdf->SetXY($x+127,$y);	
		
		$pdf->Cell(17,3,$rped["Unidades"],0,'','C');
		$pdf->Cell(17,3,number_format($rped["Precio"],2,",","."),0,'','R');
		$pdf->Cell(26,3,$importe,0,'','R');
		$pdf->SetY($yy);
		
		} 		
		
		$pdf->Ln(11);
		
		$pdf->Output('../presupuestos/'.$ref.'.pdf', 'I');


	}
	else {
		include ("includes/header.php");	
		
			echo $error;
			
			?>
            <form method="post" name="<?php $PHP_SELF ?>" action="<?php $PHP_SELF ?>">
              <table width="500" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="200">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="200">N� Factura:&nbsp;</td>
                  <td><input name="factura" type="text" size="15" value="<?php if(isset($_POST["factura"])) echo $_POST["factura"]; ?>"></td>
                </tr>
                <tr>
                  <td width="200">Fecha Factura:&nbsp;</td>
                  <td><input name="fecha" type="text" size="15" value="<?php if(isset($_POST["fecha"])) echo $_POST["fecha"]; ?>"> &nbsp; Tipo 2009-05-12</td>
                </tr>
                <tr>
                  <td width="200">Nombre/Empresa:&nbsp;</td>
                  <td><input name="nombre" type="text" size="40" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]; ?>"></td>
                </tr>
                <tr>
                  <td width="200">NIF/CIF::&nbsp;</td>
                  <td><input name="cif" type="text" size="20" value="<?php if(isset($_POST["cif"])) echo $_POST["cif"]; ?>" maxlength="10"></td>
                </tr>
                <tr>
                  <td width="200">Direcci�n:&nbsp;</td>
                  <td><input name="direccion" type="text" size="50" value="<?php if(isset($_POST["direccion"])) echo $_POST["direccion"]; ?>"></td>
                </tr>
                <tr>
                  <td width="200">CP:&nbsp;</td>
                  <td><input name="cp" type="text" size="10" value="<?php if(isset($_POST["cp"])) echo $_POST["cp"]; ?>" maxlength="5"></td>
                </tr>
                <tr>
                  <td width="200">Localidad:&nbsp;</td>
                  <td><input name="localidad" type="text" size="25" value="<?php if(isset($_POST["localidad"])) echo $_POST["localidad"]; ?>"></td>
                </tr>
                <tr>
                  <td width="200">Provincia:&nbsp;</td>
                  <td><input name="provincia" type="text" size="25" value="<?php if(isset($_POST["provincia"])) echo $_POST["provincia"]; ?>"></td>
                </tr>                                  
                <tr>
                  <td width="200">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="200">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="200">Incluir IVA&nbsp;</td>
                  <td align="left"><input type="checkbox" name="iva" value="1" checked></td>
                </tr>   
                <tr>
                  <td width="200">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>            
                <tr>
                  <td width="200">&nbsp;</td>
                  <td><input type="submit" value="Guardar" name="enviar"</td>
                </tr>
              </table>
            </form>
            <?php	
			
		include ("includes/footer.php");
	}

?>
