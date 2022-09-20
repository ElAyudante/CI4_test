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
		
		$pdf->Ln(16);
		
		
		$pdf->Ln();
		$sql_c="SELECT * FROM inscripciones WHERE Id='".$_GET["c"]."'";
		$con_c=mysql_query($sql_c) or die (mysql_error);
		if(mysql_num_rows($con_c)>0) {
			$colegiado=mysql_fetch_array($con_c);		
		
			$pdf->Ln(1);		
			$pdf->Cell(3);			
			$x=$pdf->GetX();
			$y=$pdf->GetY();			
			$pdf->MultiCell(80,4,"Nombre: ".$colegiado["Nombre"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"Apellidos: ".$colegiado["Apellidos"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"NIF/DNI/CIF: ".$colegiado["Dni"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"Profesion: ".$colegiado["Profesion"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"Direccion: ".$colegiado["Direccion"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"Localidad: ".$colegiado["Localidad"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"C�digo Postal: ".$colegiado["CP"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"Provincia: ".$colegiado["Provincia"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"Tel�fono: ".$colegiado["Telefono"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"Email: ".$colegiado["Email"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"Asociaci�n: ".$colegiado["Asociacion"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"N� colegiado: ".$colegiado["NAsociado"],0,'L');
			$pdf->Cell(3);	
			$pdf->MultiCell(80,4,"Titulaci�n: ".$colegiado["Titulacion"],0,'L');
			
		} 		
		
		$pdf->Ln(11);
		
		$pdf->Output('../presupuestos/ficha_inscrito.pdf', 'I');

?>
