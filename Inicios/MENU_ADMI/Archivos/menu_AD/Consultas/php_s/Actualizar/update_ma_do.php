<?php
    include('conexion.php');
    $ID = utf8_decode($_POST['id']);
    $Clave_Materia = utf8_decode($_POST['Clave_Materia']);
    $Grupo = $_POST['Grupo'];
    $Semestre = $_POST['Semestre'];
    $Especialidad = utf8_decode($_POST['Especialidad']);
    $Clave_Maestro = $_POST['Clave_Maestro'];
    $Periodo = $_POST['Periodo']; 
    
    $sql= "UPDATE materia_relacion SET Grupo='$Grupo', Semestre='$Semestre', Clave_Docente='$Clave_Maestro', Periodo='$Periodo'  WHERE id='$ID'";
    $query=mysqli_query($con,$sql);
  
 if($query){
      header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/MM_index.php');
  }
?>



