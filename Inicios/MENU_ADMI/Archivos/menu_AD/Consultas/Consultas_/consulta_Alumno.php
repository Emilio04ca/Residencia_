
<?php
  session_start();
  if (($_SESSION ["usuario"]['Clave_RFC'] == null)) {
    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
  $valor = 1;
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
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css">
      <script type="text/javascript"> 
        function Resultado()
          {
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
          function ValidarDatos()
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
                      text: 'No tienes la autorizacion para agregar nuevo alumno'                              
                  })
                  formulario.Num_Ctrl.value="";
                  formulario.Nombre.value="";
                  formulario.Apellido_p.value="";   
                  formulario.Apellido_m.value="";
                  formulario.Semestre.value="";
                  formulario.Especialidad.value=""; 
                  formulario.Grupo.value="";
                  formulario.Turno.value="";
                  formulario.Periodo.value="";  
                  return false;     
              }
              else
                {
                  if (formulario.Num_Ctrl.value == "null" || formulario.Nombre.value == "null" || formulario.Apellido_p.value == "null" 
                          || formulario.Apellido_m.value == "null" || formulario.Semestre.value == "null" || formulario.Especialidad.value == "null"
                          || formulario.Grupo.value == "null" || formulario.Turno.value == "null" || formulario.Periodo.value == "null")  
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
                                  title: 'Deseas Actulizar?',
                                  text: "Si es asi, prosigue con la operacion!",
                                  showDenyButton: true,
                                  confirmButtonText: 'Save',
                                  denyButtonText: `Don't save`,
                                }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) 
                                {
                                          formulario.submit();
                                } 
                                        else if (result.isDenied) 
                                {
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
        <br>
      <div class="container justify-items-center n">
        <div class="row">
          <div class="col-xs-12 col-lg-3"> 
            <form name="priv" action="../php_s/Insertar/insertar_alumno.php" method="POST">
              <h4 class="text-center"><strong>Agregar Alumno</strong></h4>
                <input type="text" required placeholder="No. de Control" name="Num_Ctrl" class="form-control">
                  <br>
                <input type="text" required placeholder="Nombre" name="Nombre" class="form-control">
                  <br>
                <input type="text" required placeholder="Apellido P" name="Apellido_p" class="form-control">
                  <br>
                <input type="text" required placeholder="Apellido M" name="Apellido_m" class="form-control">
                  <br>
                  <CENTER>
                <p>Semestre:
                  <select name="Semestre" class="form-control" >
                  <option value="">Selecciona</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                </p>
                <p>Especialidad:
                  <select name="Especialidad" class="form-control" >
                        <option value="">Selecciona</option>
                        <?php
                        include '../php_s/Consultar/conexion.php';
                        $sql= "SELECT Nombre FROM datos_carrera";
                        $query=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo utf8_encode($row['Nombre'])?>"><?php echo utf8_encode($row['Nombre'])?></option>
                        <?php
                        }
                        mysqli_close($con);
                        ?>
                  </select>
                </p>
                <p>Grupo:
                  <select name="Grupo" class="form-control" >
                    <option value="">Selecciona</option>
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
                <p>Turno:
                  <select name="Turno" class="form-control" >
                    <option value="">Selecciona</option>
                    <option value="matutino">matutino</option>
                    <option value="Vespertino">Vespertino</option>
                    <option value="1C">1C</option>
                  </select>
                </p>  
                <p>Periodo:
                  <select name="Periodo" class="form-control" >
                  <option value="">Selecciona</option>
                    <?php
                    include '../php_s/Consultar/conexion.php';
                    $sql= "SELECT DISTINCT Periodo FROM datos_alumnos";
                    $query=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?php echo utf8_decode($row['Periodo'])?>"><?php echo utf8_decode($row['Periodo'])?></option>
                    <?php
                    }
                    mysqli_close($con);
                    ?>
                  </select>
                </p>         
                  </CENTER>
                <input type="button" value="Agregar" class="btn btn-primary btn-block" onclick="ValidarDatos();">
            </form>
          </div>
          <div class="col-xs-12 col-lg-8 p-3">
            <h1 class="text-center"><strong>Consulta Alumnos</strong></h1>   
              <form action="consulta_Alumno.php" method="post">
                <center>
                  <input type="text" required name="buscar" style="margin: auto; text-align: center;" placeholder="Numero de control">
                  <input type="submit" value="Buscar" width="100px" >
                </center>
              </form>
              <br>
              <table class="table">
                <thead class="table">
                  <tr>
                    <th scope="col">Num_Ctrl</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Turno</th>
                    <th scope="col">Periodo</th>
                    <th scope="col">Vigente</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                        include("../php_s/Consultar/alumno_consultar.php");
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
                    <tr>
                        <td><?php echo utf8_encode($row['Num_Ctrl'])?></td>
                        <td><?php echo utf8_encode($row['Nombre'])?></td>
                        <td><?php echo utf8_encode($row['Ape_paterno'])?></td>
                        <td><?php echo utf8_encode($row['Ape_Materno'])?></td>
                        <td><?php echo utf8_encode($row['Especialidad']) ?></td>
                        <td><?php echo utf8_encode($row['Semestre'])?></td>
                        <td><?php echo utf8_encode($row['Grupo']) ?></td>
                        <td><?php echo utf8_encode($row['Turno']) ?></td>
                        <td><?php echo utf8_encode($row['Periodo']) ?></td>
                        <td><?php echo utf8_encode($row['Vigente'])?></td>
                        <?php
                          if ($_SESSION ["usuario"]["Privilegios"] == '1') {
                        ?>
                          <td><a href="editar_alumno.php?id=<?php echo $row['Num_Ctrl'] ?>" class="btn btn-primary">Editar</a></td>
                          <td><a href="../php_s/Eliminar/delete_alumno.php?id=<?php echo $row['Num_Ctrl'] ?>"  class="btn btn-danger" >Eliminar</a></td>
                        <?php
                          }
                          mysqli_close($con);
                        ?>      
                    </tr>
                  <?php
                  }
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