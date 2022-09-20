<?php session_start(); include("../configuracion.php");
		
		$sql_coleg="SELECT Id FROM colegiados WHERE Colegiado='".$_SESSION['nu_colegiado']."'";
		$con_coleg=mysql_query($sql_coleg) or die (mysql_error());
		$coleg=mysql_fetch_array($con_coleg);

		$hay=0;
		$sql_ped="SELECT * FROM pedidos WHERE Cod_cliente='".$_SESSION['nu_colegiado']."' AND Fecha_compra BETWEEN '".$_GET["year"]."-01-01' AND '".$_GET["year"]."-12-31'";
		$con_ped=mysql_query($sql_ped) or die (mysql_error());	
		if (mysql_num_rows($con_ped)==0) {
			$hay=$hay+1;	
		} 
		
		
		$sql_cuo="SELECT * FROM cobroscuotas WHERE Anio='".$_GET["year"]."'";
		$con_cuo=mysql_query($sql_cuo) or die (mysql_error());	
		if (mysql_num_rows($con_cuo)>0) {	
			$rrr=0;		
			while($cu=mysql_fetch_array($con_cuo)) {
				$sql_cuo2="SELECT * FROM estadocobrocuotas WHERE relColegiado='".$coleg["Id"]."' AND (relCuota='".$cu["Id"]."' OR relCuota='0') AND Estado='1'";
				
				$con_cuo2=mysql_query($sql_cuo2) or die (mysql_error());				
				if(mysql_num_rows($con_cuo2)>0){					
					$datos_couta=mysql_fetch_array($con_cuo2);
					if($datos_couta["relCuota"]==0) {
						$descripcion_cuota[]="Cuota de alta";
					}
					else {
						$descripcion_cuota[]=$cu["Descripcion"];
					}
					
					$importe_cuota[]=$datos_couta["Importe"];
					$rrr++;	
				}
			}
			if($rrr==0) $hay=$hay+1;			
		} 
		else {
			$hay=$hay+1;	
		}
		
		
		
		if($hay==0) {
			echo "No existen pagos para el a�o seleccionado";	
		}		
		else {
			require('../FPDF/fpdf.php');			
			
			class PDF extends FPDF {
			
				//Cabecera de p�gina
				
				function Header(){
				
						$this->SetFont('Arial','B',14);
						$this->SetTextColor(3,115,219);
						$this->Cell(190,8,'COLEGIO PROFESIONAL DE LOGOPEDAS DE CANTABRIA',0,'','L');
						
						
						$this->Ln(6);
					
						$this->SetFont('Arial','B',7);
						$this->SetTextColor(0,0,0);		
						$this->SetFont('Arial','I',11);	
						$this->SetTextColor(229,8,122);
						//imagen de la cabecera
						$this->Image('../logo_pdf.jpg',172,6,30,30);		
						
						$this->Ln(5);
						
						
						$valor1="CIF: Q3900765C \nC/ Calder�n de la Barca N� 15 Ppal Izq. Of.4 \nSantander (Cantabria) \nTel. /Fax: 942 052 099  / colegio@logopedascantabria.org";
						
						
						$x=$this->GetX();
						$y=$this->GetY();	
						
						$this->SetFont('Arial','',8);
						$this->SetTextColor(0,0,0);
						$this->MultiCell(95,3,$valor1,0,'L');		
						
						//Salto de l�nea
						$this->Ln(10);
				
				}
				
				
				
				function Footer(){
				
				}
			}
			
			
			//Creaci�n del objeto de la clase heredada
			
			$pdf=new PDF();
			
			$pdf->AliasNbPages();
			
			$pdf->AddPage();
			
			$pdf->SetFont('Times','',12);
			
			
			
			// desplazanos la celda hacia la derecha
			
					$pdf->Cell(14);
			
					//datos de cliente
					$sql_cli="SELECT * FROM colegiados WHERE Id='".$_SESSION['id_usuario']."'";
					$con_cli=mysql_query($sql_cli) or die (mysql_error());					
					$cli=mysql_fetch_array($con_cli);
			
					$cliente="Datos del Colegiado \n";
			
					$cliente.="Nombre: ".$cli["Nombre"]." ".$cli["Apellidos"]."\n";	
			
					$cliente.="Direcci�n: ".$cli["Direccion"]." CP: ".$cli["CP"]."\n";	
			
					$cliente.="Poblaci�n: ".$cli["Localidad"]."\n";
			
				// imprimimos los datos del cliente
			
				$pdf->MultiCell(160,6,$cliente,1);
			
				
			
				$pdf->Ln(14);
			
				
			
				// imprimimos las cajas de los datos de la factura
			
				
			
				$pdf->Cell(14);
			
				$pdf->Cell(60,6,'Periodo de pago',1,'','C');
				
			
				$pdf->Cell(50,6,'N�mero de Colegiado',1,'','C');
			
				$pdf->Cell(50,6,'NIF de Colegiado',1,'','C');
			
				
			
				$pdf->Ln();
			
				
			
				$pdf->Cell(14);
			
				$pdf->Cell(60,5,$_GET["year"],1,'','C');	
			
				$pdf->Cell(50,5,$cli["Colegiado"],1,'','C');
				
				$pdf->Cell(50,5,$cli["NIF"],1,'','C');
				
			
				
			
				$pdf->Ln(14);
			
				
			
				// imprimimos las cajas de los articulos
			
				
				$pdf->Cell(14);	
			
				$pdf->Cell(134,6,'Descripci�n',1,'','L');
			
				$pdf->Cell(26,6,'Importe',1,'','C');
			
				$importe_final=0;
				for($uy=0;$uy<count($descripcion_cuota);$uy++) {
					$pdf->Ln();	
					
					$x=$pdf->GetX();
					$y=$pdf->GetY();
					
					$pdf->Cell(14);					
					$pdf->MultiCell(134,5,$descripcion_cuota[$uy],0);							
					$pdf->SetXY($x+148,$y);					
					$pdf->Cell(26,5,$importe_cuota[$uy],0,'','C');					
					$pdf->Ln(5);
					
				
					$importe_final+=$importe_cuota[$uy];
				}
				
				
			
				while($items=mysql_fetch_array($con_ped)) {			
					$sql_rped="SELECT * FROM relPedidos WHERE relPedido='".$items["Referencia"]."'";			
					$con_rped=mysql_query($sql_rped) or die (mysql_error());			
					
					
					while($rped=mysql_fetch_array($con_rped)) {	
						
						$pdf->Ln();	
					
						$x=$pdf->GetX();
						$y=$pdf->GetY();
						
						$pdf->Cell(14);					
						$pdf->MultiCell(134,5,$rped["Articulo"],0);							
						$pdf->SetXY($x+148,$y);					
						$pdf->Cell(26,5,$rped["Precio"],0,'','C');					
						$pdf->Ln(5);
						
					
						$importe_final+=$rped["Precio"];
				
					} // fin while($rped=mysql_fetch_array($con_rped)) {
				}
				
			
				// relleno con celdas vac�as
				
			
				$pdf->Ln(12);
				
				$pdf->Cell(14);	
			
				$pdf->Cell(134,6,'Total',1,'','L');
			
				$pdf->Cell(26,6,$importe_final.' Euros',1,'','C');
			
			
			
			$pdf->Output();

}


?>
