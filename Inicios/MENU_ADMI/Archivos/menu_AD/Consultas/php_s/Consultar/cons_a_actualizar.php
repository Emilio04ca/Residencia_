<?php
 include ('conexion.php');
 
 $Clave_Materia = $_GET['id'];
 $Clave_Maestro = $_GET['id2'];
 
 $sql="SELECT * FROM materia_relacion WHERE Clave_Materia ='$Clave_Materia' and Clave_Maestro='$Clave_Maestro'";

 $query=mysqli_query($con,$sql);

 $row=mysqli_fetch_array($query);
?>



