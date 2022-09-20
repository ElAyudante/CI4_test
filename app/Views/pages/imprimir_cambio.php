<?php session_start();

	include("configuracion.php");
	
	require('../FPDF/fpdf.php');
			
	class PDF extends FPDF {
	//Cabecera de p�gina
	function Header() {
		
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
		
		
		$valor1="CIF: Q3900765C \nC/ Calder�n de la Barca N� 15 Ppal Izq. Of.4 \nSantander (Cantabria) \nTel. /Fax: 942 052 099  / colegio@logopedascantabria.org / <a href='aviso-legal.php'>Aviso Legal</a> / <a href='politica-privacidad.php'>Pol&iacute;tica de Privacidad</a>";
		
		
		$x=$this->GetX();
		$y=$this->GetY();	
		
		$this->SetFont('Arial','',8);
		$this->SetTextColor(0,0,0);
		$this->MultiCell(95,3,$valor1,0,'L');		
		
		//Salto de l�nea
		$this->Ln(10);
	}
	
	function Footer() {	 	  
	}
	}

		//Creaci�n del objeto de la clase heredada
		$pdf=new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',9);		
		
		$pdf->Ln(16);
		
		// imprimimos las cajas de los colegiados
		
		$pdf->Cell(3);	
		$pdf->Cell(80,6,'SOLICITUD DE CAMBIO DE MODALIDAD: ','0','','L');		
		
		$pdf->Ln(10);
		 $SQL1="SELECT colegiados.Nombre, colegiados.Apellidos, colegiados.Colegiado, colegiados.Email, colegiados.NIF, colegiados.Localidad, colegiados.Provincia, solicitudes_cambio.relColegiado , solicitudes_cambio.Comentarios, solicitudes_cambio.Fecha FROM colegiados, solicitudes_cambio WHERE colegiados.Id=solicitudes_cambio.relColegiado AND colegiados.Id='".$_GET["id"]."'";  		  		  
		$con_ped=mysql_query($SQL1) or die (mysql_error());		
		$rped=mysql_fetch_array($con_ped);
		
		
		$pdf->SetFont('Arial','',9);	
		
		
		$pdf->Cell(3);	
		$pdf->Cell(80,6,'Fecha: '.$rped["Fecha"],'','','L');
		$pdf->Cell(3);	
		$pdf->Cell(80,6,'Apellidos, Nombre: '.$rped["Apellidos"].", ".$rped["Nombre"],'','','L');
		$pdf->Ln(6);
		$pdf->Cell(3);	
		$pdf->Cell(80,6,'N� Colegiado: '.$rped["Colegiado"],'','','L');
		$pdf->Ln(6);
		$pdf->Cell(3);	
		$pdf->Cell(80,6,'Localidad: '.$rped["Localidad"],'','','L');
		$pdf->Ln(9);
		$pdf->Cell(3);	
		$pdf->Cell(80,6,'Comentarios: '.$rped["Comentarios"],'','','L');	
				
		
	
		
		$pdf->Output();

?>
