<?php
session_start();
if (($_SESSION ["usuario"]['Clave_RFC'] == null)) {
  header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
else
{
 include ('../php_s/Consultar/cons_doc_actualizar.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Actualizar_Docente</title>
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
          formulario = document.actualizar;
          if (formulario.Nombre.value == "" || formulario.Ape_paterno.value == "" 
          || formulario.Ape_Materno.value == "" || formulario.Area.value == "") {
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
      <form  name="actualizar"action="../php_s/Actualizar/update_docente.php" method="POST">
        <center><h1 class="text-center"><strong>Actualizar Docente</strong></h1></center>
        <br>
        <input name="Clave_Docente" type="hidden" value="<?php echo $row['Clave_Docente'];?>">
        
        <table align="center" width="200px">
          <tbody>
            <tr>
              <th>RFC</th>
              <td id="non"><input type="hidden" value=""> <?php echo $row['Clave_Docente'];?></td>
            </tr>
            <tr>
              <th>Nombre </th>
              <td id="non"><input name="Nombre" type="text" value="<?php echo utf8_encode( $row['Nombre']);?>">  </td>
            </tr>
            <tr>
              <th>Apellido Paterno </th>
              <td id="non"><input name="Ape_paterno" type="text" value="<?php echo $row['Ape_paterno'];?>"></td>
            </tr>
            <tr>
              <th>Apellido Materno </th>
              <td id="non"><input name="Ape_Materno" type="text" value="<?php echo $row['Ape_Materno'];?>"></td>
            </tr>
            <tr>
              <th>Area</th>
              <td id="non">
                <select name="Area" class="form-control" >
                    <option value="">Selecciona</option>
                    <option value="INFO">Sin Seccionar</option>
                    <option value="INFO">Sin Seccionar</option>
                    <option value="INFO">Sin Seccionar</option>
                  </select>
                </td>
            </tr> 
          </tbody>
        </table>
          <br>  
          <div align="center">
            <input name="aceptar" type="button" value="Actualizar" class="boton" onclick="valida_datos();"> 
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