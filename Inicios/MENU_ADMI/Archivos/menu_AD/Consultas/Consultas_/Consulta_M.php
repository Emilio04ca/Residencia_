
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
    <title>CRUD_Materia</title>
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/style.css">
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
<script type="text/javascript">
        function valida_datos()
        {
          formulario = document.priv;
          if (formulario.Privilegio.value != 1)
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
                      formulario.Clave.value="";
                      formulario.Nombre.value="";
                      formulario.Tipo.value=""; 
                      formulario.Abreviatura.value="";
                      return false;
            }
            else
              {
                if (formulario.Clave.value == "" || formulario.Nombre.value == ""
                || formulario.Semestre.value == "" || formulario.Tipo.value == "") 
                    {
                      formulario.Clave.value="";
                      formulario.Nombre.value="";
                      formulario.Tipo.value="";      
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
    <?php include 'menu.php';?>   
      <br>

      <div class="container justify-items-center n">
          <div class="row">
            <div class="col-xs-12 col-lg-3">
              <form name="priv" action="../php_s/Insertar/insertar_materia.php" method="POST">
              <input name="Privilegio" type="hidden" value="<?php echo $_SESSION ["usuario"]['Privilegios']?>">
               <h1 class="text-center"><strong>Agregar Materias</strong></h1>
                <br>
                <input type="text" required placeholder="Clave" name="Clave" class="form-control">
                <br>
                <input type="text" required placeholder="Nombre" name="Nombre" class="form-control">
                <br>
                <input type="text" required placeholder="Abreviatura" name="Abreviatura" class="form-control">
                <br>
                <center><p>Semestre:
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
                <br>
                <p>Tipo:
                        <select name="Tipo" class= "form-control">
                        <option value="">Selecciona</option>
                        <option value="Basica">Basica</option>
                        <option value="Profesional">Profesional</option>
                        </select>
                </p>
      </center>
                <input type="button" value="Agregar" class="btn btn-primary btn-block" onclick="valida_datos();">
              </form>
            </div>
            <div class="col-xs-12 col-lg-8 p-3">
              <h1 class="text-center"><strong>Consulta Materia Maestro</strong></h1>   
              <br>
              <form  action="" method="post">
                <center>
                  <input type="submit" value="Consultar" width="100px" >
                </center>
              </form>
              <table align="center" class="table">
                <thead class="table">
                  <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Abreviatura</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include("../php_s/Consultar/Consulta_Materia.php");
                    while($row= $resultado->fetch_assoc()){
                  ?> 
                    <tr>
                        <td><?php echo utf8_encode($row['Clave'])?></td>
                        <td><?php echo utf8_encode($row['Nombre']);?></td>
                        <td><?php echo utf8_encode($row['Nom_Abreviado'])?></td>
                        <td><?php echo utf8_encode($row['Semestre'])?></td>
                        <td><?php echo utf8_encode($row['Tipo'])?></td>
                        
                        <td><a href="editar_Materia.php?id=<?php echo $row['Clave'] ?>" class="btn btn-primary">Editar</a></td>
                        <td><a href="../php_s/Eliminar/delete_materia.php?id=<?php echo utf8_encode($row['Clave'])?>"  class="btn btn-danger" >Eliminar</a></td>
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