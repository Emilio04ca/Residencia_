 <?php
// Solo se permite el ingreso con el inicio de sesion.
session_start();
// Si el usuario no se ha logueado se le regresa al inicio.
if (($_SESSION ["usuario"]['Num_Ctrl'] != null)) {
  
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>inicio</title>
    <link rel="stylesheet" href="Submenu/style.css">
    
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
      $(window).load(function() {
        $(".loader").fadeOut("slow");
      });
    </script>
  </head>
<body>
<div class="loader"></div>
  <?php
    include 'Submenu/Menu.php';
  ?>
  <script src="Submenu/script.js"></script>
<br>
<br>
<br>
<br> 
<br> 
    <h2 align="center"> Bienvenido(a) </h2><br><br>
    <h3 align="center"> <u><b><?=$_SESSION ["usuario"]['Num_Ctrl']?></b> </u><br><u><b> <?=$_SESSION ["usuario"]['Nombre']?> <?=$_SESSION ["usuario"]['Ape_paterno']?> <?=$_SESSION ["usuario"]['Ape_Materno']?> </b> </u></h3>

</body>
</html>
<?php
}else{

  header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
?>
