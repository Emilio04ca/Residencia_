<?php
  session_start();
  if (($_SESSION ["usuario"]['Clave_RFC'] == null)) {
    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
  else{
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Consulta Contraseña</title>
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/style.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css" >
    <style>
        .n{
            margin-top: 50px;
        }
    </style>
    <!-- Bootstrap CSS -->
      <script type="text/javascript"> 
        function Resultado(){
          Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'No se encontro ese alumno con el numero de control ingresado'
                    })
        }
      </script>
  </head>
  <body>
    <?php include 'menu.php';?>
      <br>
      <br>
      <h1 class="text-center"><strong>Consulta Calificaciones</strong></h1>
        <form action="" method="POST">
              <center>
                <input type="text" name="buscar" required style="margin: auto; text-align: center;" placeholder="Numero de control">
                <input type="submit" value="Buscar" width="100px">
              </center> 
        </form>
      <br>
      <?php
        include("../php_s/Consultar/consultar_calif.php");
        
        $cant_duplicidad = mysqli_num_rows($query);
            if($cant_duplicidad == 0)
              {
                echo "<script>";
                echo "Resultado();";
                echo "</script>";
              }
                else{
                while($row=mysqli_fetch_array($query)) {
                ?>
                <h4 align="center"><?php echo utf8_decode($row['Nombre'])?> <?php echo utf8_decode($row['Ape_paterno'])?> <?php echo utf8_decode($row['Ape_Materno'])?></h4>        
                <?php
                  }
                }
                ?> 
      <div class="container justify-items-center n">
                  <table class="table">
                    <tbody class="table">
                      <tr>
                        <th scope="col">Materia</th>
                        <th scope="col">Unidad 1</th>
                        <th scope="col">Asistencia U1</th>
                        <th scope="col">Unidad 2</th>
                        <th scope="col">Asistencia U2</th>
                        <th scope="col">Unidad 3</th>
                        <th scope="col">Asistencia U3</th>
                        <th scope="col">Calificacion</th>
                      </tr>
                    <?php
                    $TOTAL =0;
                    $Materia = "SELECT DISTINCT Clave_Materia, Grupo from datos_calificaciones where Num_Ctrl='$Num_Ctrl' and Periodo='$Periodo'";
                    $Consulta=mysqli_query($con,$Materia);
                    $dato = null;
                    $filas = mysqli_num_rows($Consulta);
                          if($filas == 0)
                            {
                              ?>
                              <center><h5>No tienes materias Capturadas</h5></center>
                              <?php
                            }
                            else
                            {
                              while($datos= $Consulta->fetch_assoc()) 
                              {
                                $asignatura=  $datos['Clave_Materia']; 
                                ?>  
                                  <tr><td align="left" ><?php echo utf8_encode($datos['Clave_Materia'])?> <br> <b><?php echo utf8_encode($dato)?></b></td>  
                                <?php
                                $Califas = "SELECT Calificacion, Asistencia FROM `datos_calificaciones` WHERE Clave_Materia='$asignatura' and Num_Ctrl='$Num_Ctrl' ";
                                $Consultas=mysqli_query($con,$Califas);
                                  while($datoss= $Consultas->fetch_assoc())
                                    {
                                      ?>
                                      <td><center><?php echo utf8_encode($datoss['Calificacion'])?></center> </td>
                                      <td><center><?php echo utf8_encode($datoss['Asistencia'])?></center>  </td>
                                      <?php
                                    }
                              } 
                            } 
                    ?>
                    </tr>
                     </tbody>
                  </table> 
                  </div>                
                  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php }?>