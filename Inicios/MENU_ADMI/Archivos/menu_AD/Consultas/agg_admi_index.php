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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/CSS/sweetalert2.all.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css" >
    <script type="text/javascript">
      $(window).load(function() {
        $(".loader").fadeOut("slow");
      });
    </script>
    <script type="text/javascript"> 
        function ValidarDatos()
        {
          formulario = document.Consultar;
formulario = document.Consultar;
          if(formulario.Clave_RFC.value != "" || formulario.Nombre.value != "" || formulario.Apellido_p.value != ""
          || formulario.Apellido_m.value != "" || formulario.Contrasena.value != "" || formulario.Privilegios.value != "" )
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
                    formulario.Clave_RFC.value="";
                    formulario.Nombre.value="";
                    formulario.Apellido_p.value="";
                    formulario.Apellido_m.value="";
                    formulario.Contrasena.value="";
                    formulario.Privilegios.value="";
                      return false; 
                    }
                  })
                  }
                else{
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
        }
      </script>
  </head>
  <body>
    <div class="loader"></div>
        <?php include 'Consultas_/menu.php';?>
        <br>
        <br>   
     
      <div class="container justify-items-center n">
        <div class="row">
          <div class="col-xs-12 col-lg-3"> 
            <form name="Consultar" action="php_s/Insertar/insertar_admi.php" method="POST">
              <h5 class="text-center"><strong>Agregar Admi</strong></h5>
              <input type="text" required placeholder="Clave_RFC" name="Clave_RFC" class="form-control" autocomplete="off">
              <br>
              <input type="text" required placeholder="Nombre" name="Nombre" class="form-control" autocomplete="off">
              <br>
              <input type="text" required placeholder="Apellido P" name="Apellido_p" class="form-control" autocomplete="off"> 
              <br>
              <input type="text" required placeholder="Apellido M" name="Apellido_m" class="form-control" autocomplete="off">
              <br>
              <input type="text" required placeholder="Contraseña" name="Contrasena" class="form-control" autocomplete="off">
              <br>
                <center>
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
                      <th scope="col">Privilegios</th>
                    </tr>
                  </thead> 
                  <tbody>
                    
                  <?php
                    include("php_s/Consultar/consultar_admi.php");
                    require_once("Cripto/mcript.php");
                    while($row= $query->fetch_assoc()){
                  ?>      
                    <tr>
                        <td><?php echo utf8_decode($row['Clave_RFC'])?></td>
                        <td><?php echo utf8_decode($row['Nombre'])?></td>
                        <td><?php echo utf8_decode($row['Ape_paterno'])?></td>
                        <td><?php echo utf8_decode($row['Ape_Materno'])?></td>
                        <td><?php echo $dato_desencriptado = $desencriptar($row['Contrasena'])?></td>
                        <td><?php echo utf8_decode($row['Privilegios'])?></td>
                        <td><a href="php_s/Eliminar/Eliminar_Admi.php?id=<?php echo $row['Clave_RFC'] ?>"  class="btn btn-danger" >Eliminar</a></td>
                        
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