<?php
    $Num_Ctrl = $_POST["buscar"];
    include("conexion.php");
    $sql= "SELECT Num_Ctrl, Nombre, Ape_paterno, Ape_Materno, Especialidad, Semestre, Status FROM info_estudiantes WHERE Num_Ctrl='$Num_Ctrl'";
    $query=mysqli_query($con,$sql);
    
?>