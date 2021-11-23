<?php
require_once("mcript.php");
 include ('conexion.php');
    $Clave_RFC = $_POST['Clave_RFC'];
    $Nombre = $_POST['Nombre'];
    $Apellido_p = $_POST['Apellido_p'];
    $Apellido_M = $_POST['Apellido_m'];
    $Cont = $_POST['Contrasena'];
    $Contrasena = $encriptar($Cont);
    $Usuario = $_POST['Tipo'];
    $Privilegios = $_POST['Privilegios'];

$insetarData = "INSERT INTO login_admi(
     Clave_RFC,
     Nombre,
     Ape_paterno,
     Ape_Materno,
     Contrasena,
     Usuario, 
     Privilegios
 ) VALUES(
    '$Clave_RFC',
    '$Nombre',
    '$Apellido_p',
    '$Apellido_M',
    '$Contrasena',
    '$Usuario',
    '$Privilegios'
 )";
 $query = mysqli_query($con, $insetarData);

 if($query){
    header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/agg_admi_index.php');
  }
 ?>