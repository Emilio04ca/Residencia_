<?php
    include('conexion.php');

    $Clave_RFC = $_POST['Clave_RFC'];
    $Nombre = $_POST['Nombre'];
    $Ape_p = $_POST['Ape_paterno'];
    $Ape_M = $_POST['Ape_Materno'];
    
    $sql= "UPDATE info_maestros SET Nombre='$Nombre', Ape_paterno='$Ape_p', Ape_Materno='$Ape_M' WHERE Clave_RFC='$Clave_RFC'";
    $query=mysqli_query($con,$sql);
 
 if($query){
      header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/CRUD_Docentes.php');
  }
 ?>



