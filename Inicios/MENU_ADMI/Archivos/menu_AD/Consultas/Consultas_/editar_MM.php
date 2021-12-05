<?php
session_start();
if (($_SESSION ["usuario"]['Clave_RFC'] == null)) {
  header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
else
{
 include ('../php_s/Consultar/cons_a_actualizar.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Actualizar_MM</title>
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/style.css">
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/estilo2.css">
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
          formulario = document.actaulizar;
          Swal.fire({
                    title: 'Deseas Actulizar?',
                    text: "Si es asi, prosigue con la operacion!",
                    showDenyButton: true,
                    confirmButtonText: 'Save',
                    denyButtonText: `Don't save`,
                  }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                      formulario.submit();
                    } else if (result.isDenied) {
                      return false; 
                    }
                  })
        }
      </script>
  </head>
  <body>
    <?php include 'menu.php';?>
<br>
<br>
      <center><h1><strong>Actualizar Materia-Maestro</strong></h1></center>
      <form name="actaulizar" action="../php_s/Actualizar/update_ma_do.php" method="POST">
      
      <input name="Clave_Materia" type="hidden" value="<?php echo $row['Clave_Materia'];?>">
      <input name="Especialidad" type="hidden" value="<?php echo utf8_encode($row['Especialidad']);?>">
      <br>
        <table align="center" width="300px">
              <tbody>
                <center>
                <tr>
                  <th>Clave_Materia</th>
                  <td id="non"><input type="hidden" value=""> <?php echo $row['Clave_Materia'];?></td>
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
              <th>Semestre</th>
              <td id="non">
                      <select name="Semestre" class= "form-control">
                        <option value=""><?php echo $row['Semestre'];?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
               </td>
              </tr>
              <tr>
                <th>Especialidad</th>
                <td id="non"> 
                  <input type="hidden"> <?php echo utf8_encode($row['Especialidad']);?>
                </td>
                  
                <!--<td id="non"><input name="Carrera" type="text"  value=""></td>-->
              </tr>
                <tr>
                  <th>Clave_Maestro</th>
                  <td id="non"><input name="Clave_Maestro" type="text" value="<?php echo $row['Clave_Maestro'];?>"></td>
                </tr>
                <tr>
                  <th>Periodo</th>
                  <td id="non"><input name="Periodo" type="text" value="<?php echo $row['Periodo'];?>"></td>
                </tr>
              </tbody>
            </table>
              <br>  
              <div align="center">
                <input name="aceptar" type="button" value="Actualizar" class="boton" onclick="valida_datos();"> 
              </div>
              </center>
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