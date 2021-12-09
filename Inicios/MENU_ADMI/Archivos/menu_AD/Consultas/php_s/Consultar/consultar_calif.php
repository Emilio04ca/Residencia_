<?php
    $Num_Ctrl = $_POST["buscar"];
    include("conexion.php");
    $sql= "SELECT Num_Ctrl, Nombre, Ape_paterno, Ape_Materno, Especialidad, Periodo FROM datos_alumnos WHERE Num_Ctrl='$Num_Ctrl'";
    $query=mysqli_query($con,$sql);
    $row = $query->fetch_assoc();
    if(isset($row['Num_Ctrl']))
        {
            $Num_Ctrl= $row['Num_Ctrl'];
            $Nombre= $row['Nombre'];
            $Ape_paterno= $row['Ape_paterno'];
            $Ape_Materno= $row['Ape_Materno'];
            $Especialidad= $row['Especialidad'];
            $Periodo= $row['Periodo'];

            
        }
            else
            {
            $dato ='No tienes maestro asignado';
            }
    
?>