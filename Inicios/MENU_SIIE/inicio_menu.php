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
<header>
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="inicio_menu.php">SIIE</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">SIEE</span>
          <i class='bx bx-x'></i>
        </div>
        <ul class="links">
          <li><a href="Submenu/inicio_menu_califas.php">Calif. parciales</a></li>
          <li><a href="Boleta.php">Boleta de calificaciones</a></li>
          <li>
            <a href="#">Actividades</a>
              <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
              <ul class="htmlCss-sub-menu sub-menu">
                <li class="more">
                  <span><a href="#">Pract. Profe.</a>
                  <i class='bx bxs-chevron-right arrow more-arrow'></i>
                  <i class='js-arrow arrow'></i>
                  </span>
                  <ul class="more-sub-menu sub-menu">
                      <li class=""><a href="Submenu/Requisitos_ProF.php">Requisitos</a></li>
                      <li><a href="PracticasProfesionales.php">Descargar Formatos</a></li>
                  </ul>
                </li>
                <li class="more2">
                  <span><a href="#">Serv. Social</a>
                    <i class='bx bxs-chevron-right arrow more2-arrow'></i>
                  </span>
                  <ul class="more2-sub-menu sub-menu">
                    <li><a href="Submenu/Requisitos_serv.php">Requisitos</a></li>
                    <li><a href="Submenu/Requisitos_Servicio.php">Descargar Formatos</a></li>
                  </ul>
                </li>
                <li><a href="Submenu/Requisitos_Titulacion.php">Requisitos_Titulacion</a></li>
              </ul>
          </li>
          <li><a href="Submenu/cambio_nip.php">Cambio Nip</a></li>
          <li><a href="Submenu/Horario.php">Horario</a></li>
        </ul>
      </div>
      <div class="close">
        <a href="Submenu/cerrrar_seson.php">
          <i class='bx bx-window-close'></i></a>
      </div>
    </div>
  </nav>
  
</header>
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
