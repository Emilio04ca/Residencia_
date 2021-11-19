<!doctype html>
<html lang="en">
  <head>
    <title>Consulta Contraseña</title>
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/style.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/bootstrap.min.css" >
    <style>
        .n{
            margin-top: 50px;
        }
    </style>
    <!-- Bootstrap CSS -->
  </head>
  <body>
    <?php include 'menu.php';?>
    <script src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/script.js"></script>
      <br>
      <br>
      <h1 class="text-center"><strong>Consulta Calificaciones</strong></h1>
        <form action="Consultas_/Consulta_Cali.php" method="POST">
              <center>
                <input type="text" name="buscar" required style="margin: auto; text-align: center;" placeholder="Numero de control">
                <input type="submit" value="Buscar" width="100px">
              </center> 
        </form>
      <br>
          <?php
                include("../php_s/php/calif.php");
                while($row=mysqli_fetch_array($query)) {
          ?>
          <h4 align="center"><?php echo utf8_decode($row['Nombre'])?> <?php echo utf8_decode($row['Ape_paterno'])?> <?php echo utf8_decode($row['Ape_Materno'])?></h4>
     
              <div class="container justify-items-center n">
                  <table class="table">
                    <thead class="table">
                      <tr>
                        <th scope="col">Materia</th>
                        <th scope="col">Unidad 1</th>
                        <th scope="col">Unidad 2</th>
                        <th scope="col">Unidad 3</th>
                        <th scope="col">Asistencia U1</th>
                        <th scope="col">Asistencia U2</th>
                        <th scope="col">Asistencia U3</th>
                        <th scope="col">Calificacion</th>
                      </tr>
                    </thead>
                    <?php
                      }
                    ?>                   
                  </table>
              </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>