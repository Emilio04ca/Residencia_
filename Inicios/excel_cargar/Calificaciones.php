<html lang="es">
	<head> 
		<title>calificaciones</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
       <!-- <link rel="stylesheet" href="css/cargando.css">-->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Latest compiled and minified CSS -->

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>   
   

	</head>
	<body>

     

	<header>
            <div class="alert alert-info">
            <h3>Insertar calificaciones de los alumnos</h3>
            </div>
        </header>

        <form action="files.php" method="post" enctype="multipart/form-data" id="filesForm">
            <div class="col-md-4 offset-md-4">
                <input class="form-control" type="file" name="fileContacts" id="cuadr"><br>
                <button type="button" onclick="uploadContacts()" class="btn btn-primary form-control" >Cargar</button>
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
            let timerInterval
                Swal.fire({
                  title: 'Espere!',
                  html: 'Subiendo archivos <b></b>.',
                  timer: 60000,
                  timerProgressBar: true,
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
                  }
})
        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url: "Import/import_calidicacion.php",
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
            if(ext == "calificacion-1.csv" && ext == "calificacion-2.csv" % ext == "calificacion-3.csv" && ext == "calificacion-4.csv"){
            }
            else
            {
                $( this ).val('');
                Swal.fire("Mensaje De Error","Archivo no permitida: " + ext+"","error");
            }
            }
        });
</script>