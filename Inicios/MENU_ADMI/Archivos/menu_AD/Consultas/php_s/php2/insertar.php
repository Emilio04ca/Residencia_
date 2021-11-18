<?php
 include ('conexion.php');

   $Clave_RFC = $_POST['Clave_RFC'];
   $Nombre = $_POST['Nombre'];
   $Apellido_p = $_POST['Ape_paterno'];
   $Apellido_M = $_POST['Ape_Materno'];

$insetarData = "INSERT INTO info_maestros(
     Clave_RFC,
     Nombre,
     Ape_paterno,
     Ape_Materno
 ) VALUES(
    '$Clave_RFC',
    '$Nombre',
    '$Apellido_p',
    '$Apellido_M'
 )";
 $query = mysqli_query($con, $insetarData);

 if($query){
    header('location: http://localhost:8080/Edel%20Administrador/SIIE(CBTIS)/Inicios/excel_cargar/crud/CRUD_Docentes.php');
  }
 ?>