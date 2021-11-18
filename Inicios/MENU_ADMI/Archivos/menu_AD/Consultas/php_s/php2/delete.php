<?php
include ('conexion.php');

$numero_control = $_GET['id'];

$query = "DELETE FROM info_maestros WHERE Clave_RFC = '$numero_control'"; 
$result = mysqli_query($con,$query);


if($query){

    header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/CRUD_Docentes.php');
  }
?>