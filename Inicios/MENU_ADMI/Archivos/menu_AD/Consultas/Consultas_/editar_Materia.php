<?php
 include ('phpmate/actualizar.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Actualizar_Materia</title>
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/style.css">
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/estilo2.css">
    
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
                        
                    }
                    })
        }
      </script>
  </head>
  <body>
    <?php include 'menu.php';?>
    <script src="script.js"></script>
    
      <form action="phpmate/update.php" method="POST">
        <h1 class="text-center"><strong>Actualizar Materia</strong></h1>
        <br>
        <table>
          <tbody>
              <tr>
                <th>Clave</th>
                <td id="non"><input type="hidden" value=""> <?php echo $row['Clave'];?></td>
              </tr>
              <tr>
                <th>Nombre</th>
                <td id="non"><input name="Nombre" type="text" value="<?php echo $row['Nombre'];?>"></td>
              </tr>
              <tr>
                <th>Tipo</th>
                <td id="non"><input name="Tipo" type="text" value="<?php echo $row['Tipo'];?>"></td>
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