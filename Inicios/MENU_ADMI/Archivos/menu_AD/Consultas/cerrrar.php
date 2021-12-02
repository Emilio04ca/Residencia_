
<?php
unset($_SESSION["Clave_RFC"]); 
unset($_SESSION["Nombre"]);
unset($_SESSION["Ape_Paterno"]); 
unset($_SESSION["Ape_Materno"]);
unset($_SESSION["Usuario"]); 
unset($_SESSION["Privilegios"]); 
session_destroy();
// Redirect to the login page:
echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/admi_menu.php";</script>';
exit;
?>