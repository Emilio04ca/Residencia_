  <?php
    // Solo se permite el ingreso con el inicio de sesion.
    session_id();
    session_start();
    $nombre = $_SESSION ["usuario"]['Num_Ctrl'];
    // Si el usuario no se ha logueado se le regresa al inicio.
    if (($_SESSION ["usuario"]['Num_Ctrl'] != null)) 
    {
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
  <?php
    include 'Menu.php';
  ?>
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
  }
  else
  {
    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>