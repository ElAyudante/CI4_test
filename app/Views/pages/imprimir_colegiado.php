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
		$pdf->SetFont('Arial','',9);		
		
		$pdf->Ln(16);
		
		
		$pdf->Ln();
		$con_ped=mysql_query("SELECT * FROM colegiados WHERE Id='".$_GET["id"]."'") or die (mysql_error());		
		$rped=mysql_fetch_array($con_ped);
		$pdf->Ln(1);		
		$pdf->Cell(3);
		
		$pdf->SetFont('Arial','',12);	
		
		$pdf->Cell(80,4,$rped["Nombre"]." ".$rped["Apellidos"],0,'L');		
		
		$pdf->Cell(17,3,"N� Colegiado:".$rped["Colegiado"],0,'','L');
		$pdf->Ln(10);	
		
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(3);
		$pdf->Cell(17,3,"DNI:".$rped["NIF"],0,'','L');
		$pdf->Ln(6);	
		
		$pdf->Cell(3);
		$pdf->Cell(17,3,"Direccion:".$rped["Direccion"],0,'','L');
		$pdf->Ln(6);
		
		$pdf->Cell(3);
		$pdf->Cell(17,3,"Localidad:".$rped["Localidad"],0,'','L');
		$pdf->Ln(6);
		
		$pdf->Cell(3);
		$pdf->Cell(17,3,"C�digo Postal:".$rped["CP"],0,'','L');
		$pdf->Ln(6);
		
		$pdf->Cell(3);
		$pdf->Cell(17,3,"Provincia:".$rped["Provincia"],0,'','L');
		$pdf->Ln(6);
		
		$pdf->Cell(3);
		$pdf->Cell(17,3,"Tel�fono:".$rped["Telefono"],0,'','L');
		$pdf->Ln(6);		
		
		$pdf->Cell(3);
		$pdf->Cell(17,3,"Email:".$rped["Email"],0,'','L');
		$pdf->Ln(20);
		
		$pdf->Cell(3);
		$pdf->Cell(17,3,"Observaciones:",0,'','L');
		$pdf->Ln(6);
		
			
		
		$pdf->Ln(11);
		
		$pdf->Output('../presupuestos/ficha_inscrito.pdf', 'I');

?>
