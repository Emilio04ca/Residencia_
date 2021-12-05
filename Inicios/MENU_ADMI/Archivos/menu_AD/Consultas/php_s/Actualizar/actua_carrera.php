<?php
    include('conexion.php');

    $clave_carrera = $_POST['clave_carrera'];
    $Nombre = utf8_decode($_POST['Nombre']);
    $clave_division = $_POST['clave_division']; 
    $sql= "UPDATE carrera SET Nombre='$Nombre', clave_division='$clave_division' WHERE clave_carrera='$clave_carrera'";
    $query=mysqli_query($con,$sql);
 
 if($query){
    mysqli_close($con);
    header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Carreras.php');
  }
 ?>
