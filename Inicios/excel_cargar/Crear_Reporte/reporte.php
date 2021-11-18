<?php
	include 'plantilla.php';
	require 'conexion.php';
	require_once("mcript.php");
	
	$query = "SELECT info_estudiantes.Num_Ctrl, info_estudiantes.Nombre, info_estudiantes.Ape_paterno, info_estudiantes.Semestre, info_estudiantes. 	 	Especialidad, login_est.Contrasena FROM info_estudiantes
 INNER JOIN login_est ON info_estudiantes.Num_Ctrl = login_est.Num_Ctrl ";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'Num_Ctrl',1,0,'C',1);
	$pdf->Cell(30,6,'Nombre',1,0,'C',1);
	$pdf->Cell(30,6,'Apellido P.',1,0,'C',1);
	$pdf->Cell(20,6,'Semestre',1,0,'C',1);
	$pdf->Cell(50,6,'Carrera',1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode('Contraseña'),1,1,'C',1);
	
	$pdf->SetFont('Arial','',6);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_decode($row['Num_Ctrl']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['Nombre']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['Ape_paterno']),1,0,'C');
		$pdf->Cell(20,6,$row['Semestre'],1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['Especialidad']),1,0,'C');
		$pdf->Cell(30,6,$dato_desencriptado = $desencriptar($row['Contrasena']),1,1,'C', 2);
	}
	$pdf->Output();
?>