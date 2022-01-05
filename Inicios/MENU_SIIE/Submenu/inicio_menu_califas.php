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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
      $(window).load(function() {
        $(".loader").fadeOut("slow");
      });
    </script>
      <style>
        h5 {
            color: red;
            font-weight: normal;
            font-size: 25px;
            font-family: Arial;
            text-transform: lowercase;
          }
          .tamaño
        {
          width: 400px;
        }
        .centro{
          text-align: center;
        }
      </style>
  </head>
<body>
  <div class="loader"></div>
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
    <table width="800px"></center>
      <tbody>
        <tr>
          <th rowspan="2">Materia</th>
          <th rowspan="2">Grupo</th>
          <th colspan="8" >Unidades/Asistencias</th>
        </tr>
        <tr>
          <th>1</th>
          <th width="70px">AU</th>
          <th>2</th>
          <th width="70px">AU</th>
        
          <th>3</th>
          <th width="70px">AU</th>
          <th>4</th>
          <th width="70px">AU</th>
        </tr>
        <?php
          include ("../Consultas/consulta_califas.php");
          $Num_Ctrl = $_SESSION ["usuario"]['Num_Ctrl'];
          $Periodo = $_SESSION ["usuario"]['Periodo'];
          $Especilidad = $_SESSION ["usuario"]['Especialidad'];
          $TOTAL =0;
          $Materia = "SELECT DISTINCT Clave_Materia, Grupo from datos_calificaciones where Num_Ctrl='$Num_Ctrl' and Periodo='$Periodo'";
          $Consulta=mysqli_query($con,$Materia);
          $dato = null;
          $filas = mysqli_num_rows($Consulta);
                if($filas == 0)
                  {
                    ?>
                    <center><h5>No tienes Calificaciones Capturadas</h5></center>
                    <?php
                  }
                  else
                    { 
                      while($datos= $Consulta->fetch_assoc()) 
                        {
                          $nombre=  $datos['Clave_Materia']; 
                          $Grupo=  $datos['Grupo']; 
                          $Docente ="SELECT Clave_Docente FROM materia_relacion WHERE Clave_Materia='$nombre' and Grupo='$Grupo' and Especialidad='$Especilidad' and Periodo='$Periodo'";
                          $Consulta2=mysqli_query($con,$Docente);
                          $row = $Consulta2->fetch_assoc();
                            if(isset($row['Clave_Docente']))
                              {
                                $dato = $row['Clave_Docente'];
                              }
                                else{
                                $Docente2="SELECT Clave_Docente from materia_relacion where Clave_Materia='$nombre' and Grupo='$Grupo' and Periodo='$Periodo'";
                                $Consulta2=mysqli_query($con,$Docente2);
                                $row = $Consulta2->fetch_assoc();
                                  if(isset($row['Clave_Docente']))
                                    {
                                      $dato = $row['Clave_Docente'];
                                    }
                                    else{
                                      $dato ='No tienes maestro asignado';
                                    }
                                }
                              ?>  
                                  <tr><td align="left" ><?php echo utf8_encode($datos['Clave_Materia'])?> <br> <b><?php echo utf8_encode($dato)?></b></td> 
                                  <td><center><?php echo utf8_encode($datos['Grupo'])?></center>  </td>   
                              <?php
                                  $Califas = "SELECT Calificacion, Asistencia FROM `datos_calificaciones` WHERE Clave_Materia='$nombre' and Num_Ctrl='$Num_Ctrl' and Periodo='$Periodo'";
                                  $Consultas=mysqli_query($con,$Califas);
                                  $uni =1;
                                    while($datoss= $Consultas->fetch_assoc())
                                      {
                                        $Asistencia="SELECT Asitencias_totales from asistencias_materias where Materia='$nombre' and Grupo='$Grupo' and Periodo='$Periodo' and Unidad='$uni' ";
                                        $Consulta3=mysqli_query($con,$Asistencia);
                                        $flecha = $Consulta3->fetch_assoc();
                                          if(isset($flecha['Asitencias_totales']))
                                            {
                                              $asis = $flecha['Asitencias_totales'];
                                              $uni++;
                                            }
                                            else{
                                              $asis ='SAC';
                                              $uni++;
                                            }
                                        ?>
                                        <td><center><?php echo utf8_encode($datoss['Calificacion'])?></center> </td>
                                        <td><center><?php echo utf8_encode($datoss['Asistencia'])?>/ <?php echo utf8_encode($asis)?></center>  </td>
                                        <?php
                                      }

                                        $TOTAL = mysqli_num_rows($Consultas);
                        } 
                      
                      
                    }
                    mysqli_close($con);
                    $filas = mysqli_num_rows($Consulta);
                    if($TOTAL>=1)
                    {
                    ?>
                    </tr>

      </tbody>
    </table>
    <br>
   
    <form action="../Boleta/Reporte.php" TARGET="_blank"  method="post">
              <center>
              <div class="tamaño" style="display: flex;">
              <input name="no_de_control" type="hidden" value="<?php echo $_SESSION ["usuario"]['Num_Ctrl']?>">
              <input name="periodo" type="hidden" value="<?php echo $_SESSION ["usuario"]['Periodo']?>">
                  <input type="submit" value="BOLETA" width="100px" >
                </div>
                </center>
                <br>
              </form>
              <?php
                    }
                    else
                    {
                      if($TOTAL=0)
                      {
                        ?>
                        <center><h5>No tienes Calificaciones Capturadas</h5></center>
                        <?php
                      }
                    }
                    
                    ?>


  </body>
</html>
    <?php
      }
      else
        {
          header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
        }
    ?>