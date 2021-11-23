<?php
session_start();
unset($_SESSION["Clave_RFC"]); 
unset($_SESSION["Nombre"]);
unset($_SESSION["Ape_Paterno"]); 
unset($_SESSION["Ape_Materno"]);
unset($_SESSION["Usuario"]); 
unset($_SESSION["Privilegios"]); 
session_destroy();
// Redirect to the login page:
echo '<script type="text/javascript">alert("No tiene permiso para ingresar a esta area");</script>';
header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
exit;
?>