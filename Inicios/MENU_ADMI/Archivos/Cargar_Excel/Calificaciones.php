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
		<title>Registro Califas</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
      <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/style.css">  
       <!-- <link rel="stylesheet" href="css/cargando.css">-->
      <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/bootstrap.min.css" >
      <script src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/CSS/sweetalert2.all.min.js"></script>
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> 
        <!-- Latest compiled and minified CSS -->
        <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
            <h3>Insertar o Actulizar Calificaciones de Alumnos por Unidad</h3>
          </div>
        </header>
       
        <form name="Valores" action="Import/verificar_dat_cali.php" method="post" enctype="multipart/form-data" id="filesForm">
          <div class="col-md-4 offset-md-4">
              <input class="form-control" type="file" name="fileContacts" id="cuadr"><br>
              <center><button type="button" onclick="ValidarDatos()" class="btn btn-primary form-control" >Cargar</button></center>
          </div>      
        </form>
  </body>
</html>
<script type="text/javascript">
    function Subir()
    {
       /* //obteniendo el valor que se puso en campo text del formulario
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
              title: 'Deseas hacer cambios en la infrmacion de los estudiantes?',
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, claro!',
              allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey:false,
                stopKeydownPropagation:false,
            }).then((result) => {
              if (result.isConfirmed) {
                let timerInterval
                Swal.fire({
                     
                  title: 'Espera, para que los cambios se hagan correctamente.',
                  html: ' <b></b>.',
                  timer: 300000,
                  timerProgressBar: true,
                  allowOutsideClick: false,
                    allowEscapeKey:false,
                    allowEnterKey:false,
                    stopKeydownPropagation:false,
                  didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                     b.textContent = Swal.getTimerLeft()
                    }, 100)
                  },
                  willClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                 /* Read more about handling dismissals below 
                  if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                    miCampoTexto.innerHTML = "";

                  }
            })
            var Form = new FormData($('#filesForm')[0]);
                  $.ajax({

                      url: "Import/import_cali.php",
                      type: "post",
                      data : Form,
                      processData: false,
                      contentType: false,
                  });    
              }
            })
         
    }*/
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
                      Swal.fire('Se te notificara cuando ya se termino el registro!', '', 'success')
                      var Form = new FormData($('#filesForm')[0]);
                        $.ajax({ 
                            url: "Import/import_cali.php",
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
                Swal.fire("Mensaje De Error","Extensi??n no permitida: " + ext+"","error");
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
            phpAlert("Oops... \\n\\Solo se te permite ??Consultar!");  
          }
      }

  }
  else
  {

    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>