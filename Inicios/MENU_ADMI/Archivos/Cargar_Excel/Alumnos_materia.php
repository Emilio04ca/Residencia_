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
?>
<html lang="es">
	<head> 
		<title>registros_Alumnos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
      <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/style.css">  
       <!-- <link rel="stylesheet" href="css/cargando.css">-->
      <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css" >
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> 
        <!-- Latest compiled and minified CSS -->
        <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>   
      <script type="text/javascript">
        function ValidarDatos()
        {
          formulario = document.Valores;
          Swal.fire({
            title: 'Que deseas hacer?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Registrar',
            denyButtonText: `Verificar Datos`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              Subir();
            } else if (result.isDenied) {
              formulario.submit();
            }
          })
        }
      </script>
	</head>
	<body>
    <?php include '../menu_AD/Consultas/Consultas_/menu.php';?>
      <br>
        <header>
          <div class="alert alert-info">
            <h3>Insertar registros de Alumnos</h3>
          </div>
        </header>
       
        <form action="Import/verificar_alumno_materia.php" method="post" enctype="multipart/form-data" name="Valores" id="filesForm">
          <div class="col-md-4 offset-md-4">
              <input class="form-control" type="file" name="fileContacts" id="cuadr"><br>
              <center><button type="button" onclick="ValidarDatos();" class="btn btn-primary form-control" >Cargar</button></center>
          </div>      
        </form>
  </body>
</html>
<script type="text/javascript">
    function Subir()
    {
        //obteniendo el valor que se puso en campo text del formulario
        miCampoTexto = document.getElementById("cuadr").value;
        if (miCampoTexto.length == "") {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Para cargar un archivo ANTES DEBES DE SELECCIONAR UNO',
            footer: '<a href="">Why do I have this issue?</a>'
        })

        }
        else{
          Swal.fire({
                    title: 'Deseas Registrar nuevos datos?',
                    showDenyButton: true,
                    confirmButtonText: 'Registrar',
                    denyButtonText: `No Registrar`,
                  }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                      Swal.fire('Se te notificara cuando ya se termino el registro, por favor no cierres!', '', 'success')
                      var Form = new FormData($('#filesForm')[0]);
                        $.ajax({
                            url: "Import/import_alumno.php",
                            type: "post",
                            data : Form,
                            processData: false,
                            contentType: false,
                            success: function(data)
                                      {
                                        Swal.fire('Registros Exitosos!', '', 'success')
                                      }
                        });
                    } else if (result.isDenied) {
                       
                    }
                  })
              
    
     
        } 
}
</script>
<script>
       $('input[type="file"]').on('change', function(){
            var ext = $( this ).val().split('.').pop();
            if ($( this ).val() != '') {
            if(ext == "csv"){
            }
            else
            {
                $( this ).val('');
                Swal.fire("Mensaje De Error","Extensión no permitida: " + ext+"","error");
            }
            }
        });
</script>
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