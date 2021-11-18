<html lang="es">
	<head> 
		<title>registros_Alumnos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/style.css">
        
       <!-- <link rel="stylesheet" href="css/cargando.css">-->
       <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/bootstrap.min.css" >
       <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> 
        <!-- Latest compiled and minified CSS -->

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>   
	</head>
	<body>
    <?php include 'menu.php';?>
    <script src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/script.js"></script>
    <br>
      <header>
        <div class="alert alert-info">
          <h3>Insertar registros de Alumnos</h3>
        </div>
      </header>
      <form action="files.php" method="post" enctype="multipart/form-data" id="filesForm">
        <div class="col-md-4 offset-md-4">
            <input class="form-control" type="file" name="fileContacts" id="cuadr"><br>
            <center><button type="button" onclick="uploadContacts()" class="btn btn-primary form-control" >Cargar</button></center>
        </div>      
      </form>
  </body>
</html>
<script type="text/javascript">
    function uploadContacts()
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
                  title: 'Espera 1 minuto para que los cambios se hagan correctamente.',
                  html: ' <b></b>.',
                  timer: 60000,
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
                 /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                    miCampoTexto.innerHTML = "";

                  }
            })
              }
            })
        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url: "/import/import_alumno.php",
            type: "post",
            data : Form,
            processData: false,
            contentType: false,
        });        
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
