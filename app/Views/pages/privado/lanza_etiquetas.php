<?php session_start();

	include("configuracion.php");
	
	require('../FPDF/fpdf.php');
			
	class PDF extends FPDF {
	//Cabecera de p�gina
	function Header() {
	}
	
	function Footer() {	 	  
	}
	}

		$mesq = "14"; // Margem Esquerda (mm)
		$mdir = "10"; // Margem Direita (mm)
		$msup = "20"; // Margem Superior (mm)
		$leti = "105"; // Largura da Etiqueta (mm)
		$aeti = "35"; // Altura da Etiqueta (mm)
		$ehet = "0"; // Espa�o horizontal entre as Etiquetas (mm)
		
		$pdf=new FPDF('P','mm','A4'); // Cria um arquivo novo com tamanho tipo carta
		$pdf->Open(); // inicia documento
		$pdf->AddPage(); // adiciona a primeira pagina
		$pdf->SetMargins('8','15','8'); // Define as margens do documento
		$pdf->SetAuthor("OBSESIONDIGITAL"); // Define o autor
		$pdf->SetFont('Arial','',11); // Define a fonte
		//$pdf->SetDisplayMode();
		
		// Variaveis pro Loop

		$coluna = 0;
		$linha = 0;

		//Creaci�n del objeto de la clase heredada
				
		
		$con_ped=mysql_query($_SESSION["sql_lista"]) or die (mysql_error());		
		while($rped=mysql_fetch_array($con_ped)) {
			
			//DIRECCION 
			
			$direccion=$rped["Direccion"];
			$cp=$rped["CP"];
			$localidad=$rped["Localidad"];
				
			$nome = $rped["Nombre"];
			$ende = $rped["Apellidos"];			
			$local = $direccion;
			$cep = "CP: " . $cp." ".$localidad;
			
			if($coluna == "2") { // Se for a terceira coluna
			$coluna = 0; // $coluna volta para o valor inicial
			$linha = $linha +1; // $linha � igual ela mesma +1
			}
			
			if($linha == "8") { // Se for a �ltima linha da p�gina
			$pdf->AddPage(); // Adiciona uma nova p�gina
			$linha = 0; // $linha volta ao seu valor inicial
			}
			
			$posicaoV = $linha*$aeti;
			$posicaoH = $coluna*$leti;
			
			if($coluna == "0") { // Se a coluna for 0
			$somaH = $mesq; // Soma Horizontal � apenas a margem da esquerda inicial
			} else { // Sen�o
			$somaH = $mesq+$posicaoH; // Soma Horizontal � a margem inicial mais a posi��oH
			}
			
			if($linha =="0") { // Se a linha for 0
			$somaV = $msup; // Soma Vertical � apenas a margem superior inicial
			} else { // Sen�o
			$somaV = $msup+$posicaoV; // Soma Vertical � a margem superior inicial mais a posi��oV
			}
			
			$pdf->Text($somaH,$somaV,$nome); // Imprime o nome da pessoa de acordo com as coordenadas
			$pdf->Text($somaH,$somaV+4,$ende); // Imprime o endere�o da pessoa de acordo com as coordenadas
			$pdf->Text($somaH,$somaV+8,$local); // Imprime a localidade da pessoa de acordo com as coordenadas
			$pdf->Text($somaH,$somaV+12,$cep); // Imprime o cep da pessoa de acordo com as coordenadas
			
			$coluna = $coluna+1;
		}


$pdf->Output(); // encerra o arquivo PDF
?>
