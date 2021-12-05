<?php
  // Solo se permite el ingreso con el inicio de sesion.
    session_start();
    function phpAlert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '");</script>';
        echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/admi_menu.php";</script>';
    }
      // Si el usuario no se ha logueado se le regresa al inicio.
    if (($_SESSION ["usuario"]['Clave_RFC'] != null)) 
    {
        if ($_SESSION ["usuario"]["Privilegios"] == '1') 
        {
    // code...
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css" >
        <script type="text/javascript"> 
        function ValidarDatos()
        {
            formulario = document.Consultar;
                    Swal.fire({
                    title: 'Deseas Dar de alta una Carrera',
                    showDenyButton: true,
                    confirmButtonText: 'Registrar',
                    denyButtonText: `No Registrar`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                    formulario.submit();
                    } else if (result.isDenied) {
                    formulario.clave_carrera.value="";
                    formulario.nombre.value="";
                    formulario.clave_division.value="";
                    return false; 
                    }
                    })
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
            <form name="Consultar" action="php_s/Insertar/insertar_carrera.php" method="POST" enctype="multipart/form-data">
              <h5 class="text-center"><strong>Agregar Carrera</strong></h5>
              <br>
                <input type="text" required placeholder="Clave Carrera" name="clave_carrera" class="form-control">
                <br>
                <input type="text" required placeholder="Nombre" name="nombre" class="form-control">
                <br>
                <input type="text" required placeholder="Clave Division" name="clave_division" class="form-control">
                <br>
                <input type="button" name="subir" value="Agregar" class="btn btn-primary btn-block" onclick="ValidarDatos();">
            </form>
          </div>
          <div class="col-xs-12 col-lg-8 p-3">
          <h1 class="text-center"><strong>Lista de los Horarios Registrados</strong></h1>
            <!--<form action="Consultas_/consulta_Alumno.php" method="post">
              <center>
                <input type="text" required name="buscar" style="margin: auto; text-align: center;" placeholder="Numero de control">
                <input type="submit" value="Buscar" width="100px" >
              </center>
            </form>-->
            <br>
              <table class="table">
                  <thead class="table">
                    <tr>
                      <th scope="col">Clave Carrera</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Clave Division</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include("php_s/Consultar/Consultar_carrera.php");
                    while($row= $resultado->fetch_assoc()){
                  ?> 
                    <tr>
                        <td><?php echo utf8_decode($row['clave_carrera'])?></td>
                        <td><?php echo utf8_encode($row['Nombre'])?></td>
                        <td><?php echo utf8_decode($row['clave_division'])?></td>
                        <?php
                          if ($_SESSION ["usuario"]["Privilegios"] == '1') {
                        ?>
                        <td><a href="Consultas_/edit_carrera.php?clave_carrera=<?php echo $row['clave_carrera']?>"  class="btn btn-danger" >Editar</a></td>
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
    }
        else
      {
        if ($_SESSION ["usuario"]['Privilegios'] >= '2') 
          {
            phpAlert("Oops... \\n\\Solo se te permite ¡Consultar!");  
          }
      }
  }
  else
  {

    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>