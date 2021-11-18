<?php
 include ('conexion.php');
    $Clave = $_POST['Clave'];
    $Clave_RFC = $_POST['Clave_RFC'];
    $Especialidad = $_POST['Especialidad'];
    $Grupo = $_POST['Grupo'];
    $Semestre = $_POST['Semestre'];

$insetarData = "INSERT INTO maestro_materia(
     Clave,
     Clave_RFC,
     Especialidad,
     Grupo,
     Semestre
 ) VALUES(
    '$Clave',
    '$Clave_RFC',
    '$Especialidad',
    '$Grupo',
    '$Semestre'
    
 )";
 $query = mysqli_query($con, $insetarData);

 if($query){
    header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/CRUD_Materia%20-%20Maestro.php');
  }
?>