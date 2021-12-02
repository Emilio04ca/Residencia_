<?php
  // Solo se permite el ingreso con el inicio de sesion.
  session_start();
  // Si el usuario no se ha logueado se le regresa al inicio.
  if (($_SESSION ["usuario"]['Num_Ctrl'] != null)) {
    
    /*if ($_SESSION ["usuario"]["Privilegios"] == '1') {*/
    // code...
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css" >
  </head>
  <body>
        <?php include 'menu.php';?>
        <script src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/script.js"></script>
        <br>   
        <br>
     
      <div class="container justify-items-center n">
        <div class="row">
          <div class="col-xs-12 col-lg-3"> 
            <form action="php_s/php/ins_admi.php" method="POST">
              <h5 class="text-center"><strong>Consulta<br>De Boletas</strong></h5>
              <center>
                <p>
                  Numero De control
                
                <input type="text" required placeholder="Clave_RFC" name="Clave_RFC" value="<?=$_SESSION ["usuario"]['Num_Ctrl']?>" class="form-control">
                </p>
                </center>
                <center>
                    <p>Periodo:
                        <select name="Tipo" class= "form-control">
                        <option utf8_decode value="">Seleccionalo</option>
                        <option utf8_decode value="Adm_Root">Administrador Root</option>
                        <option utf8_decode value="Adm_Inv">Administrador Invitado</option>
                        </select>
                    </p>
                    
                </center>
             
              <input type="submit" value="Agregar" class="btn btn-primary btn-block">
            </form>
          </div>
          <div class="col-xs-12 col-lg-8 p-3">
          <h3 class="text-center"><strong>Resultados de Calificaciones</strong></h3>
            <!--<form action="Consultas_/consulta_Alumno.php" method="post">
              <center>
                <input type="text" required name="buscar" style="margin: auto; text-align: center;" placeholder="Numero de control">
                <input type="submit" value="Buscar" width="100px" >
              </center>
            </form>-->
            <br>
              <table class="table">
                  <thead class="table">
                  <tbody><tr align="center"> 
                    <th width="16%"> No. Control s.e.p. </th>
                    <th width="35%"> Nombre del Alumno </th>
                    <th width="9%"> Semestre </th>
                    <th width="15%"> Periodo Escolar </th>
                    <th width="15%"> Especialidad </th>
                        </tr>
                  <tr align="center" id="non">
                    <td> <?=$_SESSION ["usuario"]['Num_Ctrl']?></td>
                    <td> <?=$_SESSION ["usuario"]['Nombre']?> <?=$_SESSION ["usuario"]['Ape_paterno']?> <?=$_SESSION ["usuario"]['Ape_Materno']?></td>
                    <td> <?=$_SESSION ["usuario"]['Semestre']?></td>
                    <td> AGO-DIC/2017 </td>
                    <td> <?=$_SESSION ["usuario"]['Especialidad']?></td>
                        </tr>
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
  /*}
      else
        if ($_SESSION ["usuario"]['Privilegios'] >= '2') 
          {
            header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/admi_menu.php');
          }
*/
  }

  else
  {

    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>