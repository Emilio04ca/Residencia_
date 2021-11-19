<?php
  // Solo se permite el ingreso con el inicio de sesion.
  session_start();
  // Si el usuario no se ha logueado se le regresa al inicio.
  if (($_SESSION ["usuario"]['Clave_RFC'] != null)) {
    
    /*if ($_SESSION ["usuario"]["Privilegios"] == '') {*/
    // code...
?>

<!doctype html>
<html lang="en">
  <head>
    <title>CRUD_Docentes</title>
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/style.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/bootstrap.min.css" >
    <script type="text/javascript">
        function valida_datos()
        {
          formulario = document.priv;
          if (formulario.Privilegio.value != "1")
          {
                    formulario.Clave_RFC.value="";
                    formulario.Nombre.value="";
                    formulario.Ape_paterno.value="";
                    formulario.Ape_Materno.value="";
                    
            Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'No tienes la autorizacion para agregar Maestros'
                    })
                    return false;
                  }
                  formulario.submit();
        }
      </script>
  </head>
  <body>
    <?php include 'menu.php';?>
    <script src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/script.js"></script>
    <br>
      <br>
      <br>
      
      <h1 class="text-center"><strong>Consulta Maestros</strong></h1>

      <div class="container justify-items-center n">
        <div class="row">
          <div class="col-xs-12 col-lg-3"> 
            <form name="priv" action="php2/insertar.php" method="POST">
              <h1 class="text-center"><strong>Agregar Docentes</strong></h1>
              <input name="Privilegio" type="hidden" value="<?php $_SESSION ["usuario"]["Privilegios"];?>">
              <input type="text" required placeholder="Clave_RFC" name="Clave_RFC" class="form-control">
              <br>
              <input type="text" required placeholder="Nombre" name="Nombre" class="form-control">
              <br>
              <input type="text" required placeholder="Ape_paterno" name="Ape_paterno" class="form-control">
              <br>
              <input type="text" required placeholder="Ape_Materno" name="Ape_Materno" class="form-control">
              <br>
              <input type="button" value="Agregar" class="btn btn-primary btn-block" onclick="valida_datos();">
            </form>
          </div>
          <div class="col-xs-12 col-lg-8 p-3">
            <table class="table">
              <thead class="table">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido P</th>
                  <th scope="col">Apellido M</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
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
            header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
          }*/

  }
  else
  {

    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>