
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
                text: 'No tienes la autorizacion para agregar Maestro'
            })
              formulario.Clave_RFC.value="";
              formulario.Nombre.value="";
              formulario.Ape_Paterno.value="";
              formulario.Ape_Materno.value="";     
              return false;
          }
          else
            {
              if (formulario.Clave_Docente.value == "" || formulario.Nombre.value == "" || formulario.Ape_Paterno.value == "" 
                        || formulario.Ape_Materno.value == "" || formulario.Area.value == "")  
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
                          title: 'Deseas Registrar este Maestro?',
                          showDenyButton: true,
                          confirmButtonText: 'Registrar',
                          denyButtonText: `No Registrar`,
                        }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                          formulario.submit();
                        } else if (result.isDenied) {
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

      <div class="container justify-items-center n">
          <div class="row">
            <div class="col-xs-12 col-lg-3">
              <form name="priv" action="php_s/Insertar/insertar_docente.php" method="POST">
                <h1 class="text-center"><strong>Agregar Docente</strong></h1>
                <br>
                <input type="text" required placeholder="Clave_RFC" name="Clave_Docente" class="form-control">
                <br>
                <input type="text" required placeholder="Nombre" name="Nombre" class="form-control">
                <br>
                <input type="text" required placeholder="Ape_paterno" name="Ape_Paterno" class="form-control">
                <br>
                <input type="text" required placeholder="Ape_Materno" name="Ape_Materno" class="form-control">
                <center>
                <p>Area:
                  <select name="Area" class="form-control" >
                    <option value="">Selecciona</option>
                    <option value="Ofimatica">Ofimatica</option>
                    <option value="Contabilidad">Contabilidad</option>
                    <option value="Programacion">Programacion</option>
                    <option value="Mantenimiento">Mantenimiento</option>
                  </select>
                </p> 
                </center>

                <input type="button" value="Agregar" class="btn btn-primary btn-block" onclick="valida_datos();">
              </form>
            </div>
            <div class="col-xs-12 col-lg-8 p-3">
              <h1 align="center"><strong>Consulta Docente</strong></h1>   
              <br>
              <table align="center" class="table">
                <thead class="table">
                  <tr>
                    <th scope="col">Clave_RFC</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ape_paterno</th>
                    <th scope="col">Ape_Materno	</th>
                    <th scope="col">Area</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include("php_s/Consultar/consulta_docente.php");
                    while($row= $resultado->fetch_assoc()){ 
                  ?> 
                    <tr>
                        <td><?php echo utf8_encode($row['Clave_Docente'])?></td>
                        <td><?php echo utf8_encode($row['Nombre'])?></td>
                        <td><?php echo utf8_encode($row['Ape_paterno'])?></td>
                        <td><?php echo utf8_encode($row['Ape_Materno'])?></td>
                        <td><?php echo utf8_encode($row['Area'])?></td>

                        <?php 
                        if ($_SESSION ["usuario"]["Privilegios"] == '1') {
  
                        ?>
                        <td><a href="Consultas_/editar_Docente.php?id=<?php echo $row['Clave_Docente'] ?>" class="btn btn-primary">Editar</a></td>
                        <td><a href="php_s/Eliminar/delete_maestro.php?id=<?php echo $row['Clave_Docente'] ?>"  class="btn btn-danger" >Eliminar</a></td>
                          <?php
                        }
                          ?>
                    </tr>
                    <?php
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