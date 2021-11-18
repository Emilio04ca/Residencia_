<?php
include ('conexion.php');

$numero_control = $_GET['id'];

$query = "DELETE FROM maestro_materia WHERE Clave = '$numero_control'"; 
$result = mysqli_query($con,$query);


if($query){

    header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/CRUD_Materia%20-%20Maestro.php');
  }
?>