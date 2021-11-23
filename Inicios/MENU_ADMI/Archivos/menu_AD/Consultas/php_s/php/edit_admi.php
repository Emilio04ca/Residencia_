<?php
    include("conexion.php");
        $sql= "SELECT * FROM login_admi";
        $query=mysqli_query($con,$sql);
    
        $row=mysqli_fetch_array($query);
    
?>