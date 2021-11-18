<?php
 include ('conexion.php');
 
 $Num_Ctrl = $_GET['id'];

 $sql="SELECT * FROM info_materias WHERE Clave ='$Num_Ctrl'";

 $query=mysqli_query($con,$sql);

 $row=mysqli_fetch_array($query);
?>



