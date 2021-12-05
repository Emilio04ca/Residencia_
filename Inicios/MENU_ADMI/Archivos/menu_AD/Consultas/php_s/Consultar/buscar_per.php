<?php
 include ('conexion.php');
 
 $clave_carrera = $_GET['clave_carrera'];

 $sql="SELECT * FROM carrera WHERE clave_carrera ='$clave_carrera'";

 $query=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($query);
?>