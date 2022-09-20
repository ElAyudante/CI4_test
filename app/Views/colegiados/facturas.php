<?php include("../configuracion.php");

	if (isset($_GET["ref"])) $ref=$_GET["ref"]; else $ref=$_POST["ref"];		

		$sql_ped="SELECT * FROM pedidos WHERE Referencia='$ref'";
		$con_ped=mysql_query($sql_ped) or die (mysql_error());	
		if (mysql_num_rows($con_ped)== 0) {
			echo "No existe ninguna factura con esa referencia. Compruebe que est� escrita correctamente, respetando may�sculas y min�sculas. \n";		
		} else {
			$dat=mysql_fetch_array($con_ped);
		}	
		
		if(strpos($ref, "ins")===false) {
			$sql_cli="SELECT * FROM colegiados WHERE Id='".$dat["Cod_cliente"]."'";
			$tipp=0;
		}
		else {
			$sql_cli="SELECT * FROM inscripciones WHERE NColegiado='".$dat["Cod_cliente"]."'";
			$tipp=1;
		}
						
		$con_cli=mysql_query($sql_cli) or die (mysql_error());
		if (mysql_num_rows($con_cli)==0) { 
			echo "Se ha producido un error. El usuario no est� registrado"; 
		} 
		else {
			$cli=mysql_fetch_array($con_cli);
		}		

			

require('../FPDF/fpdf.php');



class PDF extends FPDF

{

//Cabecera de p�gina

function Header()

{

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

		$cliente="Datos del Colegiado \n";

		$cliente.="Nombre: ".$cli["Nombre"]." ".$cli["Apellidos"]."\n";	

		$cliente.="Direcci�n: ".$cli["Direccion"]." CP: ".$cli["CP"]."\n";	

		$cliente.="Poblaci�n: ".$cli["Localidad"]."\n";

    // imprimimos los datos del cliente

    $pdf->MultiCell(160,6,$cliente,1);

	

	$pdf->Ln(14);

	

	// imprimimos las cajas de los datos de la factura

	

	$pdf->Cell(14);

	$pdf->Cell(60,6,'Fecha de justificante',1,'','C');
	

	$pdf->Cell(50,6,'N�mero de Colegiado',1,'','C');

	$pdf->Cell(50,6,'NIF de Colegiado',1,'','C');

	

	$pdf->Ln();

	

	$pdf->Cell(14);

	$pdf->Cell(60,5,$dat["Fecha_compra"],1,'','C');	

	$pdf->Cell(50,5,'',1,'','C');
	
	if($tipp==0) $pdf->Cell(50,5,$cli["NIF"],1,'','C');
	else $pdf->Cell(50,5,$cli["Dni"],1,'','C');

	

	$pdf->Ln(14);

	

	// imprimimos las cajas de los articulos

	
	$pdf->Cell(14);	

	$pdf->Cell(134,6,'Descripci�n',1,'','L');

	$pdf->Cell(26,6,'Importe',1,'','C');

	

	$sql_rped="SELECT * FROM relPedidos WHERE relPedido='$ref'";

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

	

	$importe_final=$rped["Precio"];

	} // fin while($rped=mysql_fetch_array($con_rped)) {

	

	// relleno con celdas vac�as
	

	$pdf->Ln();



$pdf->Output();



?>
