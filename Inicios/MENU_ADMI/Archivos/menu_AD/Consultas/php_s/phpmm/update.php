<?php
    include('conexion.php');

    $Clave = $_POST['Clave'];
    $Clave_RFC = $_POST['Clave_RFC'];
    $Especialidad = $_POST['Especialidad'];
    $Grupo = $_POST['Grupo'];
    $Semestre = $_POST['Semestre'];
    
    $sql= "UPDATE maestro_materia SET Clave_RFC='$Clave_RFC', Especialidad='$Especialidad', Grupo='$Grupo', Semestre='$Semestre' WHERE Clave='$Clave'";
    $query=mysqli_query($con,$sql);
 
 if($query){
      header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/CRUD_Materia%20-%20Maestro.php');
  }
?>



