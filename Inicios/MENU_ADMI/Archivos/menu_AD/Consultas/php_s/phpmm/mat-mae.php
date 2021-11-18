<?php
    include('conexion.php');

    $sql= "SELECT * FROM maestro_materia";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>