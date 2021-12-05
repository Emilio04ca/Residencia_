<?php
 include ('conexion.php');
 
 $Clave_Docente = $_GET['id'];

 $sql="SELECT * FROM datos_docentes WHERE Clave_Docente ='$Clave_Docente'";

 $query=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($query);
?>



