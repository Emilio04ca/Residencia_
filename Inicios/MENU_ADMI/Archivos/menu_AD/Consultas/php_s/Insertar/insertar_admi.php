<?php
require_once("../../reporte/mcript.php");
 include ('conexion.php');
    $Clave_RFC = $_POST['Clave_RFC'];
    $Nombre = $_POST['Nombre'];
    $Apellido_p = $_POST['Apellido_p'];
    $Apellido_M = $_POST['Apellido_m'];
    $Cont = $_POST['Contrasena'];
    $Contrasena = $encriptar($Cont);
    $Privilegios = $_POST['Privilegios'];
    
    $consulta = "SELECT Clave_RFC  FROM login_admi WHERE Clave_RFC='$Clave_RFC'";
    $querys=mysqli_query($con,$consulta);
    $cant_duplicidad = mysqli_num_rows($querys);
         if($cant_duplicidad != 0)
               {
                  echo '<script type="text/javascript">alert("¡Esta Clave ya se encuentra Registrada!");</script>';
                  echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/agg_admi_index.php";</script>';
               }
               else{

$insetarData = "INSERT INTO login_admi(
     Clave_RFC,
     Nombre,
     Ape_paterno,
     Ape_Materno,
     Contrasena,
     Privilegios
 ) VALUES(
    '$Clave_RFC',
    '$Nombre',
    '$Apellido_p',
    '$Apellido_M',
    '$Contrasena',
    '$Privilegios'
 )";
 $query = mysqli_query($con, $insetarData);

 if($query){
   mysqli_close($con);
    header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/agg_admi_index.php');
  }
}

 ?>