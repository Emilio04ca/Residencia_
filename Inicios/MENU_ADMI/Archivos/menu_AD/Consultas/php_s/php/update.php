<?php
    include('conexion.php');

    $Num_Ctrl = $_POST['Num_Ctrl'];
    $Nombre = $_POST['Nombre'];
    $Ape_p = $_POST['Ape_paterno'];
    $Ape_M = $_POST['Ape_Materno'];
    $Semestre = $_POST['Semestre'];
    $Carrera = $_POST['Carrera'];
    $Status =$_POST['Status'];

    
    $sql= "UPDATE info_estudiantes SET Nombre='$Nombre', Ape_paterno='$Ape_p', Ape_Materno='$Ape_M', Semestre='$Semestre', Especialidad='$Carrera', Status='$Status' WHERE Num_Ctrl='$Num_Ctrl'";
    $query=mysqli_query($con,$sql);
 
 if($query){
      header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/alumno_index.php');
  }
 ?>



