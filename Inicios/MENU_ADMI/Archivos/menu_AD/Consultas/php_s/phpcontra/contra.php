<?php
    $Num_Ctrl = $_POST["buscar"];
    include("php/conexion.php");
    $sql = "SELECT info_estudiantes.Num_Ctrl, info_estudiantes.Nombre, info_estudiantes.Ape_paterno, info_estudiantes.Ape_Materno, login_est.Contrasena FROM info_estudiantes
    INNER JOIN login_est ON info_estudiantes.Num_Ctrl = login_est.Num_Ctrl WHERE info_estudiantes.Num_Ctrl='$Num_Ctrl'";
    $query=mysqli_query($con,$sql);
?>