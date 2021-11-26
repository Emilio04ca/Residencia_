<?php
  // Solo se permite el ingreso con el inicio de sesion.
 session_start();
  function phpAlert($msg) 
      {
        echo '<script type="text/javascript">alert("' . $msg . '");</script>';
        echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/admi_menu.php";</script>';
      }
      // Si el usuario no se ha logueado se le regresa al inicio.
      if (($_SESSION ["usuario"]['Clave_RFC'] != null)) 
        {
          if ($_SESSION ["usuario"]["Privilegios"] == '1') 
            {
    // code...
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Consulta Alumno</title> 
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/style.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css" >
  </head>
  <body>
        <?php include 'Consultas_/menu.php';?>
        <script src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/script.js"></script>
      
        <br>
        <br>   
     
      <div class="container justify-items-center n">
        <div class="row">
          <div class="col-xs-12 col-lg-3"> 
            <form action="php_s/php/horario_add.php" method="POST" enctype="multipart/form-data">
              <h5 class="text-center"><strong>Agregar Admi</strong></h5>
              
              <br>
              <center>
                    <p>Carrera:
                        <select name="Carrera" class="form-control">
                        <option utf8_decode value="">Seleccionar</option>
                        <option utf8_decode value="COMPONENTE BASICO Y PROPEDEUTICO">COM. BAS Y PROPEDEUTICO</option>
                        <option utf8_decode value="CONTABILIDAD">CONTABILIDAD</option>
                        <option utf8_decode value="OFIMÁTICA">OFIMÁTICA</option>
                        <option utf8_decode value="MANTENIMIENTO AUTOMOTRIZ">MANTENIMIENTO AUTOMOTRIZ</option>
                        <option value="PROGRAMACIÓN">PROGRAMACIÓN</option>
                        <br>
                        </select>
                    </p>
                    <p>Grupo:
                        <select name="Grupo" class= "form-control">
                        <option utf8_decode value="">Seleccionar</option>
                        <option utf8_decode value="1A">1A</option>
                        <option utf8_decode value="1B">2B</option>
                        </select>
                    </p>
                    <p>Semestre:
                        <select name="Semestre" class= "form-control">
                        <option value="">Selecciona</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        </select>
                    </p>
               
                <p>Seleccionar imagen</p>
                <input type="file" required  name="imagen" class="form-control">
                </center>
             
              <input type="submit" value="Agregar" class="btn btn-primary btn-block">
            </form>
          </div>
          <div class="col-xs-12 col-lg-8 p-3">
          <h1 class="text-center"><strong>Consulta Administrador</strong></h1>
            <!--<form action="Consultas_/consulta_Alumno.php" method="post">
              <center>
                <input type="text" required name="buscar" style="margin: auto; text-align: center;" placeholder="Numero de control">
                <input type="submit" value="Buscar" width="100px" >
              </center>
            </form>-->
            <br>
              <table class="table">
                  <thead class="table">
                    <tr>
                      <th scope="col">Clave</th>
                      <th scope="col">Carrera</th>
                      <th scope="col">Grupo</th>
                      <th scope="col">Semestre</th>
                      <th scope="col">Imagen</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Nombre</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include("php_s/php/consultar_horarios.php");
                    while($row= $resultado->fetch_assoc()){
                  ?> 
                    <tr>
                        <td><?php echo utf8_decode($row['id'])?></td>
                        <td><?php echo utf8_decode($row['Carrera'])?></td>
                        <td><?php echo utf8_decode($row['Semestre'])?></td>
                        <td><?php echo utf8_decode($row['Grupo'])?></td>
                        <td >
                          <img width="100" src="data:image/<?php echo $row['Tipo']; ?>;base64,<?php echo  base64_encode($row['Imagen']); ?>">
                        </td>
                        <td><?php echo utf8_decode($row['Tipo'])?></td>
                        <td><?php echo utf8_decode($row['Nombre'])?></td>
                    </tr>
                    <?php
                    }
                   
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
      else
      {
        if ($_SESSION ["usuario"]['Privilegios'] >= '2') 
          {
            phpAlert("Oops... \\n\\Solo se te permite ¡Consultar!");  
            
            
          }
      }

  }
  else
  {

    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>