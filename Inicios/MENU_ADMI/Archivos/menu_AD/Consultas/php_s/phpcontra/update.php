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
      header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/consulta_Alumno.php');
  }
 ?>



