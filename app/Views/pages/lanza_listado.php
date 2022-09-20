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
		
		
		$valor1="CIF: Q3900765C \nC/ Calder�n de la Barca N� 15 Ppal Izq. Of.4 \nSantander (Cantabria) \nTel. /Fax: 942 052 099  / colegio@logopedascantabria.org / <a href='/aviso-legal.php'>Aviso Legal</a> / <a href='/politica-privacidad.php'>Pol&iacute;tica de Privacidad</a>";
		
		
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
		
		// imprimimos las cajas de los colegiados
		
		$pdf->Cell(3);	
		$pdf->Cell(80,6,'Apellidos, Nombre','B','','L');
		$pdf->Cell(17,6,'N� Colegiado','B','','R');
		$pdf->Cell(17,6,'Localidad','B','','R');
		$pdf->Cell(73,6,'Titulaci�n','B','','R');
		
		$pdf->Ln();
		$con_ped=mysql_query($_SESSION["sql_lista"]) or die (mysql_error());		
		while($rped=mysql_fetch_array($con_ped)) {
		$pdf->Ln(1);		
		$pdf->Cell(3);
		
		$x=$pdf->GetX();
		$y=$pdf->GetY();
		
		$pdf->MultiCell(80,4,$rped["Apellidos"].", ".$rped["Nombre"],0,'L');	
		
		$yy=$pdf->GetY();
		$pdf->SetXY($x+80,$y);	
		
		$pdf->Cell(17,3,$rped["Colegiado"],0,'','C');
		$pdf->Cell(17,3,$rped["LocalidadTrabajo"],0,'','R');
		$pdf->Cell(73,3,$rped["Titulacion"],0,'','R');
		$pdf->SetY($yy);
		
		} 		
		
		$pdf->Ln(11);
		
		$pdf->Output('../presupuestos/listado_colegiados.pdf', 'I');

?>
