<?php
 include ('conexion.php');
 
 $dato = $_GET['id'];

 $sql="SELECT * FROM datos_carrera WHERE id='$dato'";

 $query=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($query);
?>