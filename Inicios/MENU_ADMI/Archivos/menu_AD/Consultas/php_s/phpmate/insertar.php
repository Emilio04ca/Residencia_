<?php
 include ('conexion.php');
    $Clave = $_POST['Clave'];
    $Nombre = $_POST['Nombre'];
    $Tipo = $_POST['Tipo'];

$insetarData = "INSERT INTO info_materias(
     Clave,
     Nombre,
     Tipo
 ) VALUES(
    '$Clave',
    '$Nombre',
    '$Tipo'
 )";
 $query = mysqli_query($con, $insetarData);

 if($query){
    header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/CRUD_Materia.php');
  }
?>