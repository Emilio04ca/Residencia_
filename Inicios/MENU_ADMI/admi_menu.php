<?php
// Solo se permite el ingreso con el inicio de sesion.
session_start();
// Si el usuario no se ha logueado se le regresa al inicio.
if (($_SESSION ["usuario"]['Clave_RFC'] != null)) {
  
  /*if ($_SESSION ["usuario"]["Privilegios"] == '') {*/
    // code...
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Inicio-Menu </title>
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/style.css">
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php include 'menu.php';?>
  <script src="script.js"></script>
<br>
<br>
<br> 
<br> 
    <h2 align="center"> Bienvenido(a) </h2><br><br>
    <h3 align="center"> <?=$_SESSION ["usuario"]['Clave_RFC']?> <br> <?=$_SESSION ["usuario"]['Nombre']?> <?=$_SESSION ["usuario"]['Ape_Paterno']?> <?=$_SESSION ["usuario"]['Ape_Materno']?> </h3>
  

</body>
</html>
<?php
/*}
    else
      if ($_SESSION ["usuario"]['Privilegios'] >= '2') 
        {
          header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
        }*/

}

else
{

  header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
?>
