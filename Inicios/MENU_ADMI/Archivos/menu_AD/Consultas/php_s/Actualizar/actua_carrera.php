<?php
    include('conexion.php');

    $clave_carrera = $_POST['id'];
    $Nombre = utf8_decode($_POST['Nombre']);
    $sql= "UPDATE datos_carrera SET Nombre='$Nombre' WHERE id='$clave_carrera'";
    $query=mysqli_query($con,$sql);
 
 if($query){
    mysqli_close($con);
    header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Carreras.php');
  }
 ?>
