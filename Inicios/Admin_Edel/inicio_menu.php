
<?php
// Solo se permite el ingreso con el inicio de sesion.
session_start();
// Si el usuario no se ha logueado se le regresa al inicio.
if (($_SESSION ["usuario"]['Clave_RFC'] != null)) {
  
  if ($_SESSION ["usuario"]["Privilegios"] == '1') {
    // code...
  
      
  
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Drop Down Navigation Menu | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
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
          <li><a href="#">Inicio</a></li>
          <li>
            <a href="#">Alumno</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="#">Registro alumno</a></li>
              <li><a href="#">Consulta Alumno</a></li>
              <li><a href="#">Consulta Cont.</a></li>

            </ul>
          </li>
         <li>
            <a href="#">Docente</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="#">Registro Archivo</a></li>
              <li><a href="#">CRUD</a></li>

            </ul>
          </li>
         <li>
            <a href="#">Materia</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="#">Registro Archivo</a></li>
              <li><a href="#">CRUD</a></li>

            </ul>
          </li>
          <li>
            <a href="#">Relacion M-M</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="#">Registro Archivo</a></li>
              <li><a href="#">CRUD</a></li>

            </ul>
          </li>
        </ul>
      </div>
      <div class="search-box">
        <i class='bx bx-search'></i>
      </div>
      </div>
    </div>
  </nav>
  
</header>

<br>
<br>
<br>
<br> 
<br> 
    <h2 align="center"> Bienvenido(a) </h2><br><br>
    <h3 align="center"> <?=$_SESSION ["usuario"]['Clave_RFC']?> <br> <?=$_SESSION ["usuario"]['Nombre']?> <?=$_SESSION ["usuario"]['Ape_Paterno']?> <?=$_SESSION ["usuario"]['Ape_Materno']?> </h3>
  

</body>
</html>
<?php
}
    else
      if ($_SESSION ["usuario"]['Privilegios'] >= '2') 
        {
          header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
        }

}

else
{

  header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
?>
