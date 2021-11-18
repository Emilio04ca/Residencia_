<?php
 include ('conexion.php');
    $Num_Ctrl = $_POST['Num_Ctrl'];
    $Nombre = $_POST['Nombre'];
    $Apellido_p = $_POST['Apellido_p'];
    $Apellido_M = $_POST['Apellido_m'];
    $Semestre = $_POST['Semestre'];
    $Carrera = $_POST['Carrera'];
    $Status = $_POST['Status'];

$insetarData = "INSERT INTO info_estudiantes(
     Num_Ctrl,
     Nombre,
     Ape_paterno,
     Ape_Materno,
     Semestre,
     Especialidad, 
     status
 ) VALUES(
    '$Num_Ctrl',
    '$Nombre',
    '$Apellido_p',
    '$Apellido_M',
    '$Semestre',
    '$Carrera',
    '$Status'
 )";
 $query = mysqli_query($con, $insetarData);

 if($query){
    header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/consulta_Alumno.html');
  }
 ?>