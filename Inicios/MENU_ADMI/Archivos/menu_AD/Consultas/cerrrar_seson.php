<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
if (($_SESSION ["usuario"]['Clave_RFC'] != null)) {
echo '<script type="text/javascript">alert("Estas cerrando sesion \\n\\Adios... '.$_SESSION ["usuario"]['Nombre'].' '.$_SESSION ["usuario"]['Ape_Paterno'].' '.$_SESSION ["usuario"]['Ape_Materno'].'");</script>';
/*echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
echo '<script type = "text/javascript"> 
Swal.fire({
    position: "top-end",
    icon: "Cerrando sesion",
    title: "Adios...",
    showConfirmButton: false,
    timer: 1500
  })
</script>';*/

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
}
else
{
    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
?>