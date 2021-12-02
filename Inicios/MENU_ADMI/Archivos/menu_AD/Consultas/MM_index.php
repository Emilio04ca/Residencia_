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
    <title>CRUD_Materia-Maestro</title>
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
    <script type="text/javascript">
        function valida_datos()
        {
          formulario = document.priv;
          if (formulario.Privilegio.value != "1")
          {
                    formulario.Clave.value="";
                    formulario.Clave_RFC.value="";
                    formulario.Especialidad.value="";
                    formulario.Grupo.value="";
                    formulario.Semestre.value="";
                    
            Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'No tienes la autorizacion para agregar'
                    })
                    return false;
                  }
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      formulario.submit();
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  })      
        }
      </script>
  </head>
  <body>
  <?php include 'Consultas_/menu.php';?>
    <script src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/script.js"></script>
        <br>
        <br>
        <div class="container justify-items-center n">
          <div class="row">
            <div class="col-xs-12 col-lg-3">
              <form name="priv" action="php_s/phpmm/insertar.php" method="POST">
                <h5 class="text-center"><strong>Agregar M-M</strong></h5>
                <br>
                <input name="Privilegio" type="hidden" value="<?php $_SESSION ["usuario"]["Privilegios"];?>">
                <input type="text" required placeholder="Clave" name="Clave" class="form-control">
                <br>
                <input type="text" required placeholder="Clave_RFC" name="Clave_RFC" class="form-control">
                <br>
              <CENTER>
                <p>Carrera:
                  <select name="Especialidad" class= "form-control">
                    <option utf8_decode value="COMPONENTE BASICO Y PROPEDEUTICO">COM. BAS Y PROPEDEUTICO</option>
                    <option utf8_decode value="CONTABILIDAD">CONTABILIDAD</option>
                    <option utf8_decode value="OFIMÁTICA">OFIMÁTICA</option>
                    <option utf8_decode value="MANTENIMIENTO AUTOMOTRIZ">MANTENIMIENTO AUTOMOTRIZ</option>
                    <option value="PROGRAMACIÓN">PROGRAMACIÓN</option>
                  </select>
                </p>
                <p>Grupo:
                  <select name="Grupo"  class= "form-control">
                    <option value="1A">1A</option>
                    <option value="1B">1B</option>
                    <option value="1C">1C</option>
                    <option value="1D">1D</option>
                    <option value="1E">1E</option>
                    <option value="1F">1F</option>
                    <option value="2A">2A</option>
                    <option value="2B">2B</option>
                    <option value="3A">3A</option>
                    <option value="3B">3B</option>
                    <option value="4A">4A</option>
                    <option value="4B">4B</option>
                    <option value="5A">5A</option>
                    <option value="5B">5B</option>
                    <option value="6A">6A</option>
                    <option value="6B">6B</option>
                  </select>
                </p>
                <p>Semestre:
                  <select name="Semestre" class= "form-control" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                </p>
      </CENTER>
                <input type="button" value="Agregar" class="btn btn-primary btn-block" onclick="valida_datos();">
              </form>
            </div>
            <div class="col-xs-12 col-lg-8 p-3">
              <h1 class="text-center"><strong>Consulta Materia Maestro</strong></h1>
              <form action="#" method="post">
                <center>
                  
                  <input type="submit" value="Consultar" width="100px" >
                </center>
                <br>
              </form>
              <table class="table">
                <thead class="table">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Clave</th>
                    <th scope="col">Clave_RFC</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include("php_s/phpmm/mat-mae.php");
                    while($row= $query->fetch_assoc()){
                  ?> 
                    <tr>
                        <td><?php echo utf8_decode($row['Clave'])?></td>
                        <td><?php echo utf8_decode($row['Clave_RFC'])?></td>
                        <td><?php echo utf8_decode($row['Especialidad'])?></td>
                        <td><?php echo utf8_decode($row['Grupo'])?></td>
                        <td><?php echo utf8_decode($row['Semestre'])?></td>
                        <td><a href="editar_alumno.php?id=<?php echo $row['Num_Ctrl'] ?>" class="btn btn-primary">Editar</a></td>
                        <td><a href="php/delete.php?id=<?php echo $row['Num_Ctrl'] ?>"  class="btn btn-danger" >Eliminar</a></td>
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