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
		
		
		$valor1="CIF: Q3900765C \nC/ Calder�n de la Barca N� 15 Ppal Izq. Of.4 \nSantander (Cantabria) \nTel. /Fax: 942 052 099  / colegio@logopedascantabria.org";
		
		
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
		
		$sql_even="SELECT Evento FROM eventos WHERE Id='".$_GET["c"]."'";
		$con_even=mysql_query($sql_even) or die (mysql_error());
		$nombre_evento=mysql_fetch_array($con_even);
		
		$pdf->MultiCell(220,4,$nombre_evento["Evento"],"",'L');	
		
		$pdf->Ln(8);
		
		// imprimimos las cajas de los colegiados
		
		$pdf->Cell(3);	
		$pdf->Cell(66,6,'Apellidos, Nombre','B','','L');
		$pdf->Cell(17,6,'DNI','B','','R');
		$pdf->Cell(17,6,'','B','','R');
		$pdf->Cell(70,6,'','B','','C');
		$pdf->Cell(17,6,'','B','','R');
		
		$pdf->Ln();
		$sql="SELECT * FROM inscripciones WHERE relEvento='".$_GET["c"]."' ORDER BY Apellidos";
		$con_ped=mysql_query($sql) or die (mysql_error());	
		$contador=1;	
		while($rped=mysql_fetch_array($con_ped)) {
		$pdf->Ln(1);		
		$pdf->Cell(3);
		
		$x=$pdf->GetX();
		$y=$pdf->GetY();
		
		$pdf->MultiCell(66,4,strtoupper($rped["Apellidos"]).", ".strtoupper($rped["Nombre"]),"B",'L');	
		
		$yy=$pdf->GetY();
		$pdf->SetXY($x+66,$y+1);	
		
		$pdf->Cell(17,3,strtoupper($rped["Dni"]),"B",'','C');
		$pdf->Cell(17,3,"","B",'','R');		
		
		$pdf->Cell(70,3,"","B",'','C');
		$pdf->Cell(17,3,"","B",'','R');
		$pdf->SetY($yy);
		$contador++;
		if($contador==41 || $contador==84) $pdf->AddPage();
		}
		
		$pdf->Output('../presupuestos/listado_inscripciones.pdf', 'I');

?>
