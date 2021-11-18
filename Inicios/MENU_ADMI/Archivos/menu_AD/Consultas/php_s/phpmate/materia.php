<?php
    include('conexion.php');

    $sql= "SELECT * FROM info_materias";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>