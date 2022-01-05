<?php
    include('conexion.php');

    $Clave = $_POST['Clave'];
    $Nombre = utf8_decode($_POST['Nombre']);
    $Semestre = $_POST['Semestre'];
    $Tipo = $_POST['Tipo'];
    
    $sql= "UPDATE datos_materias SET Nombre='$Nombre', Semestre='$Semestre', Tipo='$Tipo' WHERE Clave='$Clave'";
    $query=mysqli_query($con,$sql);
 
 if($query){
    mysqli_close($con);
    header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Materia_index.php');
  }
  else{
    header('http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Consulta_M.php');
  }
 ?>



