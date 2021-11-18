<?php

 include ('conexion.php');

 if(!empty($_POST['Num_Ctrl'])) {

  $Num_Ctrl=$_POST['Num_Ctrl'];

  $query= mysqli_query("INSERT INTO info_estudiantes (Num_Ctrl) VALUES ('$Num_Ctrl')");
  
  if($query){
      header('location: consulta_Alumno.html');
    }
}
?>
