<?php
  // Solo se permite el ingreso con el inicio de sesion.
  session_start();
  // Si el usuario no se ha logueado se le regresa al inicio.
  if (($_SESSION ["usuario"]['Num_Ctrl'] != null)) {
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Consulta Alumno</title> 
    <link rel="stylesheet" href="style.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css" >
    <script type="text/javascript">
      $(window).load(function() {
        $(".loader").fadeOut("slow");
      });
    </script>
  </head>
  <body>
  <div class="loader"></div>
        <?php include 'menu.php';?>
        <br>   
        <br>
     
      <div class="container justify-items-center n">
        <div class="row">
          <div class="col-xs-12 col-lg-3"> 
            <form action="" method="POST">
              <h5 class="text-center"><strong>Consulta<br>De Boletas</strong></h5>
              <center>
                <p>
                  Numero De control
                <input type="text" name="Num_Ctrl" value="<?=$_SESSION ["usuario"]['Num_Ctrl']?>" class="form-control" readonly="true">
                </p>
                </center>
                <center>
                    <p>Periodo:
                    <select name="Periodo" class="form-control" >
                    <option value="">Selecciona</option>
                    <?php
                    include '../../php_s/config.php';
                    $sql= "SELECT DISTINCT Periodo FROM datos_calificaciones";
                    $query=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?php echo utf8_decode($row['Periodo'])?>"><?php echo utf8_decode($row['Periodo'])?></option>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                  </select>
                    </p>
                    
                </center>
              <input type="submit" value="Agregar" name="mostrar" class="btn btn-primary btn-block">
            </form>
          </div>
          <div class="col-xs-12 col-lg-8 p-3">
          <h3 class="text-center"><strong>Resultados de Calificaciones</strong></h3>
            <?php
            if(isset($_REQUEST['mostrar']))
            {
            include ("../Consultas/conexion.php");
            $Num_Ctrll = $_POST['Num_Ctrl'];
            $Periodo=$_POST['Periodo'];
            $Datos_alumno= "SELECT Num_Ctrl, Nombre, Ape_paterno, Ape_Materno, Semestre, Especialidad from datos_alumnos where Num_Ctrl='$Num_Ctrll'";  
            $recuperar_datos=mysqli_query($con,$Datos_alumno);
                          $filas = $recuperar_datos->fetch_assoc();
                            if(isset($filas['Num_Ctrl']))
                              {
                                $Num_Ctrl = $filas['Num_Ctrl'];
                                $Nombre = $filas['Nombre'];
                                $Ape_paterno = $filas['Ape_paterno'];
                                $Ape_Materno = $filas['Ape_Materno'];
                                $Semestre = $filas['Semestre'];
                                $Especilidad = $filas['Especialidad'];
                              }
                                else{
                                $dato ='No tienes maestro asignado';
                                }
              ?>
            <br>
              <table class="table">
                  <thead class="table">
                  <tbody><tr align="center"> 
                    <th width="16%"> No. Control s.e.p. </th>
                    <th width="30%"> Nombre del Alumno </th>
                    <th width="9%"> Semestre </th>
                    <th width="20%"> Periodo Escolar </th>
                    <th width="15%"> Especialidad </th>
                        </tr>
                  <tr align="center" id="non">
                    <td> <?php echo utf8_encode($Num_Ctrl)?></td>
                    <td> <?php echo utf8_encode($Nombre)?> <?php echo utf8_encode($Ape_Materno)?> <?php echo utf8_encode($Ape_paterno)?></td>
                    <td> <?php echo utf8_encode($Semestre)?></td>
                    <td> <?php echo utf8_encode($Periodo)?> </td>
                    <td> <?php echo utf8_encode($Especilidad)?></td>
                  </tr>                  
                </tbody>
              </table>
              <table class="table" width="800">
                <tbody><tr align="center">
                  <th class="small_negrita_center" > Materia </th> 
                  <th class="small_negrita_center" width="15"> Grupo </th>
                  <th class="small_negrita_center" width="170"> Calificación </th>
                  <th class="small_negrita_center" width="170"> Tipo<br>Evaluación </th>
                  <th class="small_negrita_center" width="170"> Observacion </th>
                </tr >
                <?php

                $Materia = "SELECT DISTINCT Clave_Materia, Grupo from datos_calificaciones where Num_Ctrl='$Num_Ctrl' and Periodo='$Periodo'";
                $datos_materia=mysqli_query($con,$Materia);
                $filas = mysqli_num_rows($datos_materia);
                if($filas == 0)
                  {
                    ?>
                    <center><h5>No tienes materias Capturadas</h5></center>
                    <?php
                  }
                  else
                    {
                      while($datos= $datos_materia->fetch_assoc())
                      {
                        ?>
                                  <tr><td align="left" ><?php echo utf8_encode($datos['Clave_Materia'])?></td> 
                                  <td><center><?php echo utf8_encode($datos['Grupo'])?></center>  </td>
                        <?php
                        $Materias = $datos['Clave_Materia'];
                         $Califas = "SELECT Calificacion FROM datos_calificaciones WHERE Clave_Materia='$Materias' and Num_Ctrl='$Num_Ctrl' and Periodo='$Periodo' ";
                         $Consultas=mysqli_query($con,$Califas);
                         
                         $TOTAL = mysqli_num_rows($Consultas);
                         if($TOTAL >=3)
                         {  
                          $Cali_f = "SELECT ROUND(AVG(Calificacion) ,0) as final FROM datos_calificaciones WHERE Clave_Materia='$Materias' and Num_Ctrl='$Num_Ctrl' and Periodo='$Periodo' ";
                          $cal_final=mysqli_query($con,$Cali_f);
                          $flechas = $cal_final->fetch_assoc();
                          
                          if(isset($flechas['final']))
                          {
                            $fina=$flechas['final'];
                            if($fina >=6)
                            {$fin = $flechas['final'];}
                            else{$fin= 'N/A';}
                          }
                          else{
                              $fin ='no cali';
                          }
                          $Cal = "SELECT Acreditacion FROM datos_calificaciones WHERE Clave_Materia='$Materias' and Num_Ctrl='$Num_Ctrl' and Periodo='$Periodo' ORDER BY Acreditacion DESC;";
                          $Consul=mysqli_query($con,$Cal);
                          $evaluacion=$Consul->fetch_array(MYSQLI_NUM);
                            if(isset($evaluacion[0]))
                            {
                              $eva= $evaluacion[0];
                            }
                            else{$eva ='no cali';}
                          ?>

                          <td><center><?php echo utf8_encode($fin)?></center>  </td>
                          <td><center><?php echo utf8_encode($eva)?></center>  </td>
                          <td><center></center>  </td>

                          <?php

                         }
                         else
                         {
                           ?>
                          <td><center></center>  </td>
                          <td><center></center>  </td>
                          <td><center>Sin capturar</center>  </td>
                          <?php
                         }
                      
                      }
                ?>
                </tr>
              </tbody></table>
              <?php
                    }
                }
              ?>
          </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>
<?php
  }

  else
  {

    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>