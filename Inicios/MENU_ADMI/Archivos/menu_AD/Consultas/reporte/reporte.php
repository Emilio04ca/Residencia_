<?php
	include 'plantilla.php';
	require 'conexion.php';
	require_once("mcript.php");
	$carrera = utf8_decode($_POST['carrera']);
    $semestre = $_POST ['semestre'];
	
	$query = "SELECT datos_alumnos.Num_Ctrl, datos_alumnos.Nombre, datos_alumnos.Ape_paterno, datos_alumnos.Grupo, datos_alumnos.Semestre, carrera.clave_carrera, login_est.Contrasena FROM datos_alumnos
 INNER JOIN login_est ON datos_alumnos.Num_Ctrl = login_est.Num_Ctrl INNER JOIN carrera on datos_alumnos.Especialidad=carrera.Nombre WHERE datos_alumnos.Semestre= '$semestre' AND datos_alumnos.Especialidad='$carrera'";
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
	$pdf->Cell(25,6,'Carrera',1,0,'C',1);
	$pdf->Cell(25,6,'Grupo',1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode('Contraseña'),1,1,'C',1);
	
	$pdf->SetFont('Arial','',6);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_encode($row['Num_Ctrl']),1,0,'C');
		$pdf->Cell(30,6,utf8_encode($row['Nombre']),1,0,'C');
		$pdf->Cell(30,6,utf8_encode($row['Ape_paterno']),1,0,'C');
		$pdf->Cell(20,6,$row['Semestre'],1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['clave_carrera']),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['Grupo']),1,0,'C');
		$pdf->Cell(30,6,$dato_desencriptado = $desencriptar($row['Contrasena']),1,1,'C', 2);
	}
	$pdf->Output();
?>