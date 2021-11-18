<?php
include ('conexion.php');

$numero_control = $_GET['id'];

$query = "DELETE FROM info_estudiantes WHERE Num_Ctrl = '$numero_control'"; 
$result = mysqli_query($con,$query);


if($query){

    header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/consulta_Alumno.php');
  }
?>