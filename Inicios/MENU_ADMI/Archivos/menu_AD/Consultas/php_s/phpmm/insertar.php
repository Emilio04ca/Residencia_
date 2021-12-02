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
    header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/MM_index.php');
  }
?>