<?php
    $Num_Ctrl = $_POST["buscar"];
    include("conexion.php");
    $sql = "SELECT datos_alumnos.Num_Ctrl, datos_alumnos.Nombre, datos_alumnos.Ape_paterno, datos_alumnos.Ape_Materno, login_est.Contrasena FROM datos_alumnos
    INNER JOIN login_est ON datos_alumnos.Num_Ctrl = login_est.Num_Ctrl WHERE datos_alumnos.Num_Ctrl='$Num_Ctrl'";
    $query=mysqli_query($con,$sql);
?>