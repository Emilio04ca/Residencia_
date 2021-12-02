<?php
session_start();
if (($_SESSION ["usuario"]['Num_Ctrl'] != null)) {
echo '<script type="text/javascript">alert("Estas cerrando sesion \\n\\Adios... '.$_SESSION ["usuario"]['Nombre'].' '.$_SESSION ["usuario"]['Ape_paterno'].' '.$_SESSION ["usuario"]['Ape_Materno'].'");</script>';
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

echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/admi_menu.php";</script>';
exit;
}
else
{
    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
?>