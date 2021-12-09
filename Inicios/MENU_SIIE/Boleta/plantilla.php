<?php
require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
		
			$this->SetFont('Arial','B',10);
			$this->Image('http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/image_info/logo.png',218,0,70,0,'png');
			$this->write(1,'Este documeto solo es informativo si desea algo');
			$this->Ln(4);
			$this->write(1,'oficial, por favor de pasar a control escolar.');
			$this->Ln(15);
			
			$this->SetFont('Arial','B',15);
			$this->SetFillColor(90,80,50);
			$this->SetTextColor(232,232,232);
			$this->Cell(280,10, utf8_decode('BOLETA DE CALIFICACIONES (Solo Informativo, no es oficial)'),1,0,'C', 1);
			

			$this->Ln(15);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>