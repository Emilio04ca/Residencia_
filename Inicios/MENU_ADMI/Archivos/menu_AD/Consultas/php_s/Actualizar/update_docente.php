<?php
    include('conexion.php');

    $Clave_Docente = utf8_decode($_POST['Clave_Docente']);
    $Nombre = utf8_decode($_POST['Nombre']);
    $Ape_p = utf8_decode($_POST['Ape_paterno']);
    $Ape_M = $_POST['Ape_Materno'];
    $Area = $_POST['Area'];
    
    $sql= "UPDATE datos_docentes SET Nombre='$Nombre', Ape_paterno='$Ape_p', Ape_Materno='$Ape_M', Area='$Area' WHERE Clave_Docente='$Clave_Docente'";
    $query=mysqli_query($con,$sql);
 
 if($query){
    mysqli_close($con);
      header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Docente_index.php');
  }
 ?>



