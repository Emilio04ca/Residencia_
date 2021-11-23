<?php
include ('conexion.php');

$numero_control = $_GET['id'];

$query = "DELETE FROM login_admi WHERE Clave_RFC = '$numero_control'"; 
$result = mysqli_query($con,$query);


if($query){

    header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/agg_admi_index.php');
  }
?>