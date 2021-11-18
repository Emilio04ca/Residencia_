<?php
 include ('conexion.php');
 
 $Num_Ctrl = $_GET['id'];

 $sql="SELECT * FROM maestro_materia WHERE Clave ='$Num_Ctrl'";

 $query=mysqli_query($con,$sql);

 $row=mysqli_fetch_array($query);
?>



