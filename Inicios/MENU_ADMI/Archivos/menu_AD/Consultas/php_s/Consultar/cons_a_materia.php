<?php
 include ('conexion.php');
 
 $Clave = $_GET['id'];

 $sql="SELECT * FROM datos_materias WHERE Clave ='$Clave'";

 $query=mysqli_query($con,$sql);

 $row=mysqli_fetch_array($query);
?>



