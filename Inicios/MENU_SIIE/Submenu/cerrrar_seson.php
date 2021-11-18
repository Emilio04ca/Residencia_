<?php
session_start();
unset($_SESSION["Num_Ctrl"]); 
unset($_SESSION["Nombre"]);
unset($_SESSION["Ape_paterno"]); 
unset($_SESSION["Ape_Materno"]);
unset($_SESSION["Semestre"]); 
unset($_SESSION["Especialidad"]);
unset($_SESSION["Grupo"]); 
unset($_SESSION["Periodo"]);
unset($_SESSION["Contrasena"]); 
session_destroy();
// Redirect to the login page:
echo '<script type="text/javascript">alert("No tiene permiso para ingresar a esta area");</script>';
header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
exit;
?>