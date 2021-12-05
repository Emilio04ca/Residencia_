<?php
    include('conexion.php');
    $Periodo = $_POST['Periodo'];
    $sql= "SELECT * FROM materia_relacion where Periodo='$Periodo'";
    $query=mysqli_query($con,$sql);
?>