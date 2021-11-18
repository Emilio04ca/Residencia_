<?php
    include('conexion.php');

    $Clave = $_POST['Clave'];
    $Nombre = $_POST['Nombre'];
    $Tipo = $_POST['Tipo'];
    
    $sql= "UPDATE info_materias SET Nombre='$Nombre', Tipo='$Tipo' WHERE Clave='$Clave'";
    $query=mysqli_query($con,$sql);
 
 if($query){
      header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/CRUD_Materia.php');
  }
 ?>



