
<?php
  // Solo se permite el ingreso con el inicio de sesion.
  session_start();
  // Si el usuario no se ha logueado se le regresa al inicio.
  if (($_SESSION ["usuario"]['Clave_RFC'] != null)) {
    $valor = 1;
    /*if ($_SESSION ["usuario"]["Privilegios"] == '') {*/
      // code...
?>
<!doctype html>
<html lang="en">
  <head>
    <title>CRUD_Materia</title>
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/style.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/CSS/sweetalert2.all.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css" >
   
    <style>
        .n{
            margin-top: 50px;
        }
    </style>
<script type="text/javascript">
        function valida_datos()
        {
          formulario = document.priv;
          if (<?php echo $valor?> != <?php echo $_SESSION ["usuario"]['Privilegios']?>)
          {     
            Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'No tienes la autorizacion para agregar Materias'
                    })
                    
                    return false;
          }
          else
          {
            if (formulario.Clave.value == "" || formulario.Nombre.value == ""
            || formulario.Semestre.value == "" || formulario.Tipo.value == "") 
                {
                       
                  Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              toast: true,
                              position: 'top',
                              allowOutsideClick: false,
                              allowEscapeKey: false,
                              allowEnterKey:false,
                              stopKeydownPropagation:false,
                              text: 'verifica que los campos esten llenos'
                          })
                          return false;
                }
                else
            {
              Swal.fire({
                      title: 'Deseas registrar un nuevo usuario?',
                      showDenyButton: true,
                      confirmButtonText: 'Registrar',
                      denyButtonText: `No Registrar`,
                    }).then((result) => {
                      /* Read more about isConfirmed, isDenied below */
                      if (result.isConfirmed) {
                        formulario.submit();
                      } else if (result.isDenied) {
                      formulario.Clave.value="";
                      formulario.Nombre.value="";
                      formulario.Semestre.value="";
                      formulario.Semestre.value="";
                      formulario.Tipo.value="";
                        return false; 
                      }
                    })
            }

          } 
          
        }
      </script>
  
  </head>
  <body>
  <?php include 'Consultas_/menu.php';?>
        <br>
      <br>

      <div class="container justify-items-center n">
          <div class="row">
            <div class="col-xs-12 col-lg-3">
              <form name="priv" action="php_s/Insertar/insertar_materia.php" method="POST">
                <h1 class="text-center"><strong>Agregar Materias</strong></h1>
                <br>
                <input type="text" required placeholder="Clave" name="Clave" class="form-control" autocomplete="off">
                <br>
                <input type="text" required placeholder="Nombre" name="Nombre" class="form-control" autocomplete="off">
                
                <br>
                <center>
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
                <p>tipo:
                        <select name="Tipo" class= "form-control">
                        <option value="">Selecciona</option>
                        <option value="Basica">Basica</option>
                        <option value="Profesional">Profesional</option>
                        </select>
                </p>
      </center>
                <br>
                <input type="button" value="Agregar" class="btn btn-primary btn-block" onclick="valida_datos();">
              </form>
            </div>
            <div class="col-xs-12 col-lg-8 p-3">
              <h1 class="text-center"><strong>Consultar Materia</strong></h1>   
              <form  action="Consultas_/Consulta_M.php" method="post">
                <center>
                  <input type="submit" value="Consultar" width="100px" >
                </center>
              </form>
              <br>
              <table class="table">
                <thead class="table">
                  <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Abreviatura</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Editar</th>
                    
                  </tr>
                </thead>
              </table>
            </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
</html>
<?php
  /*}
      else
        if ($_SESSION ["usuario"]['Privilegios'] >= '2') 
          {
            header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
          }*/

  }
  else
  {

    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>