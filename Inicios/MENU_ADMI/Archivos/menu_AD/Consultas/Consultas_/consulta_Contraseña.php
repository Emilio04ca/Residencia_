<?php

session_start();
if (($_SESSION ["usuario"]['Clave_RFC'] == null)) {
  header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
else
{
require_once("../Cripto/mcript.php");
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
    <script src="script.js"></script>
      <br>
      <br>
      <div class="container justify-items-center n">
        <div class="row">
          <div class="col-xs-12 col-lg-3">            
            <form  method="POST" action="../reporte/reporte.php">
              <h4 class="text-center"><strong>Descarga Grupal</strong></h4>
              <br>
              <p>Carrera:
                <select name="carrera">
                  <option utf8_decode value="COMPONENTE BASICO Y PROPEDEUTICO">COM. BAS Y PROPEDEUTICO</option>
                  <option utf8_decode value="CONTABILIDAD">CONTABILIDAD</option>
                  <option utf8_decode value="OFIMÁTICA">OFIMÁTICA</option>
                  <option utf8_decode value="MANTENIMIENTO AUTOMOTRIZ">MANTENIMIENTO AUTOMOTRIZ</option>
                  <option value="PROGRAMACIÓN">PROGRAMACIÓN</option>
                  <br>
                </select>
              </p>
              <p>Semestre:
                <select name="semestre">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </p>              
              <input type="submit" value="Descargar Formatos" class="btn btn-primary btn-block">
            </form>
          </div>
          <div class="col-xs-12 col-lg-8 p-3">
          <h4 class="text-center"><strong>Consulta Contraseña</strong></h4>
            <form action="" method="POST">
                  <center>
                    <input type="text" name="buscar" required style="margin: auto; text-align: center;" placeholder="Numero de control">
                    <input type="submit" value="Buscar" width="100px">
                  </center>
            </form>
            <br>
            <table class="table">
              <thead class="table">
                <tr>
                  <th scope="col">Num. Control</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido Paterno</th>
                  <th scope="col">Apellido Materno</th>
                  <th scope="col">Contraseña</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    include("../php_s/Consultar/consulta_contra.php");
                        $cant_duplicidad = mysqli_num_rows($query);
                        if($cant_duplicidad == 0)
                        {
                          echo "<script>";
                          echo "Resultado();";
                          echo "</script>";
                        }
                        else{
                    while($row=mysqli_fetch_array($query)){
                ?>
                  <tr>
                    <td><?php echo utf8_decode($row['Num_Ctrl'])?></td>
                    <td><?php echo utf8_decode($row['Nombre'])?></td>
                    <td><?php echo utf8_decode($row['Ape_paterno'])?></td>
                    <td><?php echo utf8_decode($row['Ape_Materno'])?></td>
                    <td><?php echo $dato_desencriptado = $desencriptar($row['Contrasena'])?></td>
                  </tr>
                <?php
                    }
                    }
                    mysqli_close($con);
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
}
?>