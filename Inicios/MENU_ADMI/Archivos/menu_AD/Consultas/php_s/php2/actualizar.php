<?php
 include ('conexion.php');
 
 $Clave_RFC = $_GET['id'];

 $sql="SELECT * FROM info_maestros WHERE Clave_RFC ='$Clave_RFC'";

 $query=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($query);
?>



