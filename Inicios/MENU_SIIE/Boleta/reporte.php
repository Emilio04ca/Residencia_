<?php
	include 'plantilla.php';
	require '../../php_s/config.php';
	$control= $_POST['no_de_control'];
	$Periodo =$_POST['periodo'];
	
	
	$Alumno ="SELECT Num_Ctrl, Nombre, Ape_paterno, Ape_Materno, Especialidad, Semestre, Grupo, Turno, Vigente FROM datos_alumnos WHERE Num_Ctrl='$control'";
	$datos=mysqli_query($conn,$Alumno);
	$row = $datos->fetch_assoc();
    	if(isset($row['Num_Ctrl']))
        	{
        		$Num_Ctrl = $row['Num_Ctrl'];
				$Nombre = $row['Nombre'];
				$Ape_paterno = $row['Ape_paterno'];
				$Ape_Materno = $row['Ape_Materno'];
				$Especialidad = $row['Especialidad'];
				$Semestre = $row['Semestre'];
				$Grupo = $row['Grupo'];
				$Turno = $row['Turno'];
				$Vigente = $row['Vigente'];
        	}
        	else{
        		$dato ='No tienes maestro asignado';
        	}
	
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFont('Arial','B',10);
	$pdf->SetX(20);
	$pdf->SetTextColor(0,0,0);
	$pdf->write(1,'SUBSISTEMA: ');
	$pdf->SetTextColor(40,40,40);
	$pdf->SetFont('Arial','B',12);
	$pdf->write(1,'Direccion general de educacion tecnologica industrial y de servicios');
	
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetX(20);
	$pdf->SetTextColor(0,0,0);
	$pdf->write(1,'PLANTEL: ');
	$pdf->SetTextColor(40,40,40);
	$pdf->SetFont('Arial','B',12);
	$pdf->write(1,'CBTIS NO.42');

	$pdf->SetFont('Arial','B',10);
	$pdf->SetX(150);
	$pdf->SetTextColor(0,0,0);
	$pdf->write(1,'CARRERA: ');
	$pdf->SetTextColor(40,40,40);
	$pdf->SetFont('Arial','B',12);
	$pdf->write(1,$Especialidad);
	
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetX(20);
	$pdf->SetTextColor(0,0,0);
	$pdf->write(1,'CLAVE DEL CENTRO DE TRABAJO: ');
	$pdf->SetTextColor(40,40,40);
	$pdf->SetFont('Arial','B',12);
	$pdf->write(1,'10DCT0202K');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetX(150);
	$pdf->SetTextColor(0,0,0);
	$pdf->write(1,'TURNO: ');
	$pdf->SetTextColor(40,40,40);
	$pdf->SetFont('Arial','B',12);
	$pdf->write(1,$Turno);

	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetX(20);
	$pdf->SetTextColor(0,0,0);
	$pdf->write(1,'NO. CONTROL: ');
	$pdf->SetTextColor(40,40,40);
	$pdf->SetFont('Arial','B',12);
	$pdf->write(1,$Num_Ctrl);

	$pdf->SetFont('Arial','B',10);
	$pdf->SetX(150);
	$pdf->SetTextColor(0,0,0);
	$pdf->write(1,'GRUPO: ');
	$pdf->SetTextColor(40,40,40);
	$pdf->SetFont('Arial','B',12);
	$pdf->write(1,$Grupo);

	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetX(20);
	$pdf->SetTextColor(0,0,0);
	$pdf->write(1,'NOMBRE: ');
	$pdf->SetTextColor(40,40,40);
	$pdf->SetFont('Arial','B',12);
	$pdf->write(1,$Nombre .' ' .$Ape_paterno .' '.$Ape_Materno);

	$pdf->SetFont('Arial','B',10);
	$pdf->SetX(150);
	$pdf->SetTextColor(0,0,0);
	$pdf->write(1,'MODALIDAD: ');
	$pdf->SetTextColor(40,40,40);
	$pdf->SetFont('Arial','B',12);
	$pdf->write(1,'BT');
	$pdf->Ln(4);
	$pdf->SetX(18);
	$pdf->Cell(260,0,'','B',1,'C');

	$pdf->Ln(15);
	$pdf->SetX(15);
	$pdf->SetFillColor(210,210,210,210,210);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(154,6,'ASIGNATURAS',1,0,'C',1);
	$pdf->Cell(20,6,'Grupo',1,0,'C',1);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(16,6,'1ER. P.',1,0,'C',1);
	$pdf->Cell(16,6,'1ER. A.',1,0,'C',1);
	$pdf->Cell(16,6,'1ER. P.',1,0,'C',1);
	$pdf->Cell(16,6,'1ER. A.',1,0,'C',1);
	$pdf->Cell(16,6,'1ER. P.',1,0,'C',1);
	$pdf->Cell(16,6,'1ER. A.',1,1,'C',1);
	

	
	
	$pdf->SetFillColor(250,250,250,250,250);
	$Materia = "SELECT DISTINCT Clave_Materia, Grupo from datos_calificaciones where Num_Ctrl='$control' and Periodo='$Periodo'";
	$Consulta=mysqli_query($conn,$Materia);
	while($datos= $Consulta->fetch_assoc()) 
        {
			$pdf->SetX(15);
            $nombre=  $datos['Clave_Materia']; 
            $Grupo=  $datos['Grupo']; 
            /*$Docente ="SELECT Clave_Maestro FROM materia_relacion WHERE Clave_Materia='$nombre' and Grupo='$Grupo' and Periodo='$Periodo'";
            $Consulta2=mysqli_query($conn,$Docente);
            $row = $Consulta2->fetch_assoc();
            if(isset($row['Clave_Maestro']))
            	{
            		$dato = $row['Clave_Maestro'];
            	}
            	else
					{
						$dato ='No tienes maestro asignado';
					}*/
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(154,6,$nombre,1,0,'L',1);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(20,6,$Grupo,1,0,'C',1);
            $Califas = "SELECT Calificacion, Asistencia FROM `datos_calificaciones` WHERE Clave_Materia='$nombre' and Num_Ctrl='$Num_Ctrl' ";
            $Consultas=mysqli_query($conn,$Califas);
			$uni=1;
            while($datoss= $Consultas->fetch_assoc())
                {
					$Asistencia="SELECT Asitencias_totales from asistencias_materias where Materia='$nombre' and Grupo='$Grupo' and Periodo='$Periodo' and Unidad='$uni'";
                                        $Consulta3=mysqli_query($conn,$Asistencia);
                                        $flecha = $Consulta3->fetch_assoc();
                                          if(isset($flecha['Asitencias_totales']))
                                            {
                                              $asis = $flecha['Asitencias_totales'];
                                              $uni++;
                                            }
                                            else{
                                              $asis ='SAC';
                                              $uni++;
                                            }
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(16,6, utf8_encode($datoss['Calificacion']),1,0,'C',1);
					$pdf->Cell(16,6, utf8_encode($datoss['Asistencia']) .'/'.$asis,1,0,'C',1);
				}
				$pdf->Cell(16,6,'',0,1,'C',0);



		}	
	
	
	$pdf->Output();
?>