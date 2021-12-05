<?php
    include('conexion.php');

    $Num_Ctrl = $_POST['Num_Ctrl'];
    $Nombre = utf8_decode($_POST['Nombre']);
    $Ape_p = utf8_decode($_POST['Ape_paterno']);
    $Ape_M = utf8_decode($_POST['Ape_Materno']);
    $Especialidad = utf8_decode($_POST['Especialidad']);
    $Semestre = $_POST['Semestre'];
    $Grupo = $_POST['Grupo'];
    $Turno = $_POST['Turno'];
    $Periodo = $_POST['Periodo'];
    $Vigente =$_POST['Vigente'];

    
    $sql= "UPDATE datos_alumnos SET Nombre='$Nombre', Ape_paterno='$Ape_p', Ape_Materno='$Ape_M', Semestre='$Semestre', 
    Especialidad='$Especialidad', Grupo='$Grupo', Turno='$Turno', Periodo='$Periodo', Vigente='$Vigente'  WHERE Num_Ctrl='$Num_Ctrl'";
    $query=mysqli_query($con,$sql);
 
 if($query){
    mysqli_close($con);
      header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/alumno_index.php');
  }
  
 ?>



