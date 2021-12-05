<?php
    $Num_Ctrl = $_POST["buscar"];
    include("conexion.php");
    $sql= "SELECT Nombre, Ape_paterno, Ape_Materno FROM datos_alumnos WHERE Num_Ctrl='$Num_Ctrl'";
    $query=mysqli_query($con,$sql);
    
?>