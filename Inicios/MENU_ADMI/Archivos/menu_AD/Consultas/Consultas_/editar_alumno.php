<?php
session_start();
if (($_SESSION ["usuario"]['Clave_RFC'] == null)) {
  header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
} 
else
{

 include ('../php_s/Consultar/cons_actualizar_alu.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Actualizar_Alumno</title>
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_SIIE/Submenu/style.css">
    <!--<link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/estilo2.css">--> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
          .n{
              margin-top: 100px;
              justify-content:  center;
          }
      </style>
      <script type="text/javascript">
          function valida_datos()
          {
              formulario = document.actualizar;

              if (formulario.Nombre.value == "" || formulario.Ape_paterno.value == "" || formulario.Ape_Materno.value == ""
              || formulario.Semestre.value == ""|| formulario.Especialidad.value == ""|| formulario.Turno.value == ""
              || formulario.Vigente.value == "" || formulario.Grupo.value == "" || formulario.Periodo.value == "") {
                Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              toast: true,
                              position: 'top',
                              allowOutsideClick: false,
                              allowEscapeKey: false,
                              allowEnterKey:false,
                              stopKeydownPropagation:false,
                              text: 'Por favor, verificar que los campos no esten vacios'
                          })
                          return false;
              }
              else{
              
                Swal.fire({
                    title: 'Deseas Actulizar?',
                    text: "Si es asi, prosigue con la operacion!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Claro!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        formulario.submit();
                    }
                    })
              }
              
          }
      </script>
  </head>
  <body>
    <?php include 'menu.php';?>
    <br>
    <br>        
      <form name="actualizar" action="../php_s/Actualizar/update_alumno.php" method="POST">
        <center><h1 class="text-center"><strong>Actualizar Alumno</strong></h1></center> 
        <input name="Num_Ctrl" type="hidden" value="<?php echo $row['Num_Ctrl'];?>">
          <table align="center" width="300px">
            <tbody>
              <tr>
                <th>No. de Control: </th>
                <center><td id="non"><input type="hidden" value=""> <?php echo $row['Num_Ctrl'];?></td></center>
              </tr>
              <tr>
                <th>Nombre </th>
                <td id="non"><input name="Nombre" type="text" value="<?php echo utf8_encode($row['Nombre']);?>"></td>
              </tr>
              <tr>
                <th>Apellido Paterno </th>
                <td id="non"><input name="Ape_paterno" type="text" value="<?php echo utf8_encode($row['Ape_paterno']);?>"></td>
              </tr>
              <tr>
                <th>Apellido Materno </th>
                <td id="non"><input name="Ape_Materno" type="text" value="<?php echo utf8_encode($row['Ape_Materno']);?>"></td>
              </tr>
              
              <tr>
                <th>Especialidad</th>
                <td id="non"> 
                <select name="Especialidad" class="form-control" >
                  <option value="<?php echo $row['Especialidad'];?>"><?php echo utf8_encode($row['Especialidad']);?></option>
                  <option value="">Selecciona</option>
                        <?php
                        include '../php_s/Consultar/conexion.php';
                        $sql= "SELECT Nombre FROM datos_carrera";
                        $query=mysqli_query($con,$sql);
                        while($Especilidad=mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo utf8_encode($Especilidad['Nombre'])?>"><?php echo utf8_encode($Especilidad['Nombre'])?></option>
                        <?php
                        }
                        ?>
                </select>
                </td>
                <!--<td id="non"><input name="Carrera" type="text"  value=""></td>-->
              </tr>
              <tr>
                <th>Semestre</th> 
                <td id="non"><input name="Semestre" type="text" value="<?php echo utf8_encode($row['Semestre']);?>"></td>
                    
              </tr>
              <tr>
                <th>Grupo </th>
                <td id="non"> 
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
                </td>
              </tr>
              <tr>
                <th>Turno</th>
                <td id="non"> 
                <select name="Turno" class="form-control" >
                    <option value="<?php echo $row['Turno'];?>"><?php echo $row['Turno']?></option>
                    <option value="matutino">matutino</option>
                    <option value="vespertino">vespertino</option>
                 <!-- </select><input name="Status" type="text"  value=""></td>-->
                 </select>
                </td>
              </tr> 
              <tr>
              <th>Periodo</th>
                <td id="non">
                <select name="Periodo" class="form-control" >
                  <option value="">Selecciona</option>
                    <?php
                    include '../php_s/Consultar/conexion.php';
                    $sql= "SELECT DISTINCT Periodo FROM datos_alumnos";
                    $query=mysqli_query($con,$sql);
                    while($rel=mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?php echo utf8_decode($rel['Periodo'])?>"><?php echo utf8_decode($rel['Periodo'])?></option>
                    <?php
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Vigente</th>
                <td id="non"> 
                <select name="Vigente" class="form-control" widht="100%">
                    <option value="<?php echo $row['Vigente']?>"><?php echo $row['Vigente']?></option>
                    <option value="activo">activo</option>
                    <option value="negativo">negativo</option>
                    </select>
                </td>
                 <!-- </select><input name="Status" type="text"  value=""></td>-->
              </tr>
            </tbody>
          </table>
        <br>  
          <div align="center">
          <input type="button" name="aceptar" value="Aceptar" class="boton" onclick="valida_datos();"> 
          </div>
      </form>
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