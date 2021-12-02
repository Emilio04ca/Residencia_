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
  <script src="script.js"></script>
<br>
<br>
<h3 align="center">Calificaciones Parciales</h3>
<h4 align="center">
<i>Periodo: <?=$_SESSION ["usuario"]['Periodo']?> </i><br>
<i>No. de Control: <?=$_SESSION ["usuario"]['Num_Ctrl']?></i><br>
<i>Nombre: <?=$_SESSION ["usuario"]['Nombre']?> <?=$_SESSION ["usuario"]['Ape_paterno']?> <?=$_SESSION ["usuario"]['Ape_Materno']?></i>
</h4>
<center><strong>*</strong><table width="489"></center>

<tbody>
  <tr>
    <th rowspan="2">Materia</th>
    <th rowspan="2">Grupo</th>
    <th colspan="4" >Unidades</th>
    <th colspan="4" >Asistencias</th>
  </tr>
  <tr>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
   
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
  </tr>
  <tr>
    <?php
    
    include ("../Consultas/consulta_califas.php");
    $Num_Ctrl = $_SESSION ["usuario"]['Num_Ctrl'];
    $Periodo = $_SESSION ["usuario"]['Periodo'];
    $Unidad = 1;
    $Unidad2 = 2;
    $Unidad3 = 3;
    $sql = "SELECT Clave_Materia, Calificacion, Asistencia from calificaciones where Num_Ctrl='$Num_Ctrl' and Unidad = '$Unidad'";
    $sql2 = "SELECT Clave_Materia, Calificacion, Asistencia from calificaciones where Num_Ctrl='$Num_Ctrl' and Unidad = '$Unidad2'";
    $sql3 = "SELECT Clave_Materia, Calificacion, Asistencia from calificaciones where Num_Ctrl='$Num_Ctrl' and Unidad = '$Unidad3'";
    $query=mysqli_query($con,$sql);
    $query2=mysqli_query($con,$sql2);
    $query3=mysqli_query($con,$sql3);

    while($row=mysqli_fetch_array($query)) {
    ?>
                        <td align="left" ><?php echo utf8_encode($row['Clave_Materia'])?></td>
                        <td></td>
                        <td><?php echo utf8_encode($row['Calificacion'])?></td>
      </tr>                        
    <?php
      
    }  
    mysqli_close($con);
      ?>
        
     
  
             
    
  
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