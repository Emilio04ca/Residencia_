 <?php
// Solo se permite el ingreso con el inicio de sesion.
session_start();
// Si el usuario no se ha logueado se le regresa al inicio.
if (($_SESSION ["usuario"]['Num_Ctrl'] != '')) {
  
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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <header>
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><center><a href="#">SIIE</a></center></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">SIEE</span>
          <i class='bx bx-x'></i>
        </div>
        <ul class="links">
          <li><a href="Submenu/inicio_menu_califas.php">Calif. parciales</a></li>
          <li>
            <a href="#">Serv. Social</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li class=""><a href="Submenu/Requisitos_serv.html">Requisitos</a></li>
              <li><a href="Submenu/Requisitos_Servicio.html">Descargar Formatos</a></li>
            </ul>
          </li>
         <li>
            <a href="#">Practicas Profesionales</a>
            <i class='bx bxs-chevron-down js-arrow arrow2 '></i>
            <ul class="js-sub-menu sub-menu">
              <li class=""><a href="Submenu/Requisitos_ProF.html">Requisitos</a></li>
              <li><a href="Submenu/PracticasProfesionales.html">Descargar Formatos</a></li>
            </ul>
          </li>
          <li><a href="Submenu/Boleta.html">Boleta de calificaciones</a></li>
          <li><a href="Submenu/Requisitos_Titulacion.html">Requisitos_Titulacion</a></li>
          <li ><a href="Submenu/cambio_nip.php">Cambio Nip</a></li>
          
        </ul>
      </div>
      <div class="close">
        <a href="Submenu/cerrrar_seson.php">
          <i class='bx bx-window-close'></i></a>
      </div>
      </div>
      <script src="script.js"></script>
  </nav>
  
</header>
<br>
<br>
<br>
<br> 
<br> 
    <h2 align="center"> Bienvenido(a) </h2><br><br>
    <h3 align="center"> <?=$_SESSION ["usuario"]['Num_Ctrl']?> <br> <?=$_SESSION ["usuario"]['Nombre']?> <?=$_SESSION ["usuario"]['Ape_paterno']?> <?=$_SESSION ["usuario"]['Ape_Materno']?> </h3>

</body>
</html>
<?php
}else{

  header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
?>
