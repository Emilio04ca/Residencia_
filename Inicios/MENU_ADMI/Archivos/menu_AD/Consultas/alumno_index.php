
<!doctype html>
<html lang="en">
  <head>
    <title>Consulta Alumno</title> 
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/style.css">
    
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/bootstrap.min.css" >
  </head>
  <body>
        <?php include 'menu.php';?>
        <script src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/script.js"></script>
      
        <br>
        <br>
      
        <h1 class="text-center"><strong>Consulta Alumnos</strong></h1>
        
          
        <form action="Consultas_/consulta_Alumno.php" method="post">
          <center>
            <input type="text" required name="buscar" style="margin: auto; text-align: center;" placeholder="Numero de control">
            <input type="submit" value="Buscar" width="100px" >
          </center>
        </form>
     
      <div class="container justify-items-center n">
        <div class="row">
          <div class="col-xs-12 col-lg-3"> 
            <form action="/Consultas_/consulta_Alumno.php" method="POST">
              <h1 class="text-center"><strong>Agregar Alumno</strong></h1>
              <input type="text" required placeholder="No. de Control" name="Num_Ctrl" class="form-control">
              <br>
              <input type="text" required placeholder="Nombre" name="Nombre" class="form-control">
              <br>
              <input type="text" required placeholder="Apellido P" name="Apellido_p" class="form-control">
              <br>
              <input type="text" required placeholder="Apellido M" name="Apellido_m" class="form-control">
              <br>
              <input type="text" required placeholder="Semestre" name="Semestre" class="form-control">
              <br>
              <input type="text" required placeholder="Carrera" name="Carrera" class="form-control">
              <br>
              <input type="text" required placeholder="Estado" name="Status" class="form-control">
              
              <input type="submit" value="Agregar" class="btn btn-primary btn-block">
            </form>
          </div>
          <div class="col-xs-12 col-lg-8 p-3">
              <table class="table">
                  <thead class="table">
                    <tr>
                      <th scope="col">Num_Ctrl</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido Paterno</th>
                      <th scope="col">Apellido Materno</th>
                      <th scope="col">Semestre</th>
                      <th scope="col">Carrera</th>
                      <th scope="col">Status</th>
                      <th scope="col">Editar</th>
                      <th scope="col">Eliminar</th>
                    </tr>
                  </thead>
              </table>
                <br>
                <br>
                <br>
                <br>
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