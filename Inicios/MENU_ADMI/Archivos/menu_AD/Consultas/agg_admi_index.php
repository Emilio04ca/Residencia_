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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css" >
    <script type="text/javascript"> 
        function ValidarDatos()
        {
          formulario = document.Consultar;
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
                    formulario.Clave_RFC.value="";
                    formulario.Nombre.value="";
                    formulario.Apellido_p.value="";
                    formulario.Apellido_m.value="";
                    formulario.Contrasena.value="";
                    formulario.Tipo.value="";
                    formulario.Privilegios.value="";
                      return false; 
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
            <form name="Consultar" action="php_s/php/ins_admi.php" method="POST">
              <h5 class="text-center"><strong>Agregar Admi</strong></h5>
              <input type="text" required placeholder="Clave_RFC" name="Clave_RFC" class="form-control">
              <br>
              <input type="text" required placeholder="Nombre" name="Nombre" class="form-control">
              <br>
              <input type="text" required placeholder="Apellido P" name="Apellido_p" class="form-control">
              <br>
              <input type="text" required placeholder="Apellido M" name="Apellido_m" class="form-control">
              <br>
              <input type="text" required placeholder="Contraseña" name="Contrasena" class="form-control">
              <br>
                <center>
                    <p>Tipo:
                        <select name="Tipo" class= "form-control">
                        <option utf8_decode value="">Selecciona un Tipo</option>
                        <option utf8_decode value="Adm_Root">Administrador Root</option>
                        <option utf8_decode value="Adm_Inv">Administrador Invitado</option>
                        </select>
                    </p>
                    <p>Privilegio:
                        <select name="Privilegios" class= "form-control">
                        <option value="">Selecciona un Tipo</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        </select>
                    </p>
                </center>
                <input type="button" value="Agregar" class="btn btn-primary btn-block" onclick="ValidarDatos();">
            </form> 
          </div>
          <div class="col-xs-12 col-lg-8 p-3">
          <h3 class="text-center"><strong>Consulta Administrador</strong></h3>
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
                      <th scope="col">Clave_RFC</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido Paterno</th>
                      <th scope="col">Apellido Materno</th>
                      <th scope="col">Contrasena</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Privilegios</th>
                    </tr>
                  </thead> 
                  <tbody>
                    
                  <?php
                    include("php_s/php/edit_admi.php");
                    require_once("Cripto/mcript.php");
                    while($row= $query->fetch_assoc()){
                  ?>      
                    <tr>
                        <td><?php echo utf8_decode($row['Clave_RFC'])?></td>
                        <td><?php echo utf8_decode($row['Nombre'])?></td>
                        <td><?php echo utf8_decode($row['Ape_paterno'])?></td>
                        <td><?php echo utf8_decode($row['Ape_Materno'])?></td>
                        <td><?php echo $dato_desencriptado = $desencriptar($row['Contrasena'])?></td>
                        <td><?php echo utf8_decode($row['Usuario']) ?></td>
                        <td><?php echo utf8_decode($row['Privilegios'])?></td>
                        <td><a href="php_s/php/Eliminar_Admi.php?id=<?php echo $row['Clave_RFC'] ?>"  class="btn btn-danger" >Eliminar</a></td>
                        
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
        {
        if ($_SESSION ["usuario"]['Privilegios'] >= '2') 
          {
            phpAlert("Oops... \\n\\Solo se te permite ¡Consultar!");  
          }
        }

  }
}
  else
  {

    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>