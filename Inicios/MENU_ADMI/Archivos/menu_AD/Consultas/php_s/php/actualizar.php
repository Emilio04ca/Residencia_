<?php
 include ('conexion.php');
 
 $Num_Ctrl = $_GET['id'];

 $sql="SELECT * FROM info_estudiantes WHERE Num_Ctrl ='$Num_Ctrl'";

 $query=mysqli_query($con,$sql);

 $row=mysqli_fetch_array($query);
?>



