  <?php
// Solo se permite el ingreso con el inicio de sesion.
session_id();
session_start();
$nombre = $_SESSION ["usuario"]['Num_Ctrl'];
// Si el usuario no se ha logueado se le regresa al inicio.
if (($_SESSION ["usuario"]['Num_Ctrl'] != '')) {
?>
 <!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> calificaciones </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <header>
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="#">SIIE</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">SIEE</span>
          <i class='bx bx-x' ></i>
        </div>
        <ul class="links">
          <li class="activo"><a href="#">Calif. parciales</a></li>
          <li >
            <a href="#">Serv. Social</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="Requisitos_serv.html">Requisitos</a></li>
              <li><a href="Requisitos_Servicio.html">Descargar Formatos</a></li>
            </ul>
          </li>
         <li >
            <a href="#">Practicas Profesionales</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li ><a href="Requisitos_ProF.html">Requisitos</a></li>
              <li><a href="PracticasProfesionales.html">Descargar Formatos</a></li>
            </ul>
          </li>
          <li><a href="#">Boleta de calificaciones</a></li>
         <li><a href="Requisitos_Titulacion.html">Requisitos_Titulacion</a></li>
          <li ><a href="cambio_nip.php">Cambio Nip</a></li>
        </ul>
      </div>
      <div class="close">
        <a href="Submenu/cerrrar_seson.php"><i class='bx bx-window-close'></i></a>
      </div>
    </div>
  </nav>
  <script src="script.js"></script>
</header>
<br>
<br>
<h3 align="center">Calificaciones Parciales</h3>
<h4 align="center">
<i>Periodo: <?=$_SESSION ["usuario"]['Periodo']?> </i><br>
<i>No. de Control: <?=$_SESSION ["usuario"]['Num_Ctrl']?></i><br>
<i>Nombre: <?=$_SESSION ["usuario"]['Nombre']?> <?=$_SESSION ["usuario"]['Ape_paterno']?> <?=$_SESSION ["usuario"]['Ape_Materno']?></i>
</h4>
<center><strong>*</strong><table width="489" align="center"></center>

<tbody>
  <tr>
    <th rowspan="2">Materia</th>
    <th rowspan="2">Grupo</th>
    <th colspan="5" >Unidades</th>
    <th colspan="5" >Asistencias</th>
  </tr>
  <tr>
    <td>I</td>
    <td>II</td>
    <td>III</td>
    <td>IV</td>
    <td>V</td>
  
    <td>1</td>
    <td>2</td>
    <td>3</th>
    <td>4</td>
    <td>5</td>
  </tr>

</tbody>


</body>
</html>
<?php
}else{

  header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
?>