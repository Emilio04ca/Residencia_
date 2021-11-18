<?php
// Solo se permite el ingreso con el inicio de sesion.
session_id();
session_start();
$nombre = $_SESSION ["usuario"]['Num_Ctrl'];
$Estado = $_SESSION ["usuario"]['Estado'];
// Si el usuario no se ha logueado se le regresa al inicio.
if (($_SESSION ["usuario"]['Num_Ctrl'] != '')) {
?> 

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    
    <meta charset="UTF-8">
    <title> cambionip </title>
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Boxicons CDN Link -->
   
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

      <script type="text/javascript">
        function cambio_cont(t)
        {
          if (t == 1) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'Ya haz cambiado la contrasela anteriormente'
                    })
          }
        }
            function valida_datos()
                {
                  formulario = document.cambio_nip;
                   if(formulario.Estado.value == 1 )
                  {
                    formulario.nip.value="";
                    formulario.nip_nuevo.value="";
                    formulario.re_nip_nuevo.value="";
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'Ya haz cambiado la contrasela anteriormente'
                    })
                    return false;
                  }
                  
                  if(formulario.anterior.value !== formulario.nip.value)
                  {
                    
                    formulario.nip.value="";
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'Favor de escribir correctamente nip anterior.'
                    })
                    formulario.nip.focus();
                    return false;
                  }
                  if(formulario.nip.value == formulario.nip_nuevo.value)
                  {
                    
                    formulario.nip.focus();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'Nip anterior debe ser diferente de nip nuevo.'
                    })
                    return false;
                  }
                  
                  if(formulario.nip_nuevo.value == "")
                  {
                    formulario.nip_nuevo.focus();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'Favor de escribir nip nuevo.'
                    })
                    return false;
                  } 
                  if(formulario.re_nip_nuevo.value == "")
                  {
                    formulario.re_nip_nuevo.focus();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'Favor de escribir nip nuevo.'
                    })
                    return false;
                  }
                  if(formulario.nip_nuevo.value.length != 4)
                  {
                    formulario.nip_nuevo.focus();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'El nip nuevo debe ser de cuatro dígitos.'
                    })
                    return false;
                  }
                  if(formulario.re_nip_nuevo.value !== formulario.nip_nuevo.value )
                  {
                    formulario.re_nip_nuevo.value="";
                    formulario.nip_nuevo.value="";
                    formulario.nip_nuevo.focus();
                     Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'No coinciden nuevas contraseñas.'
                    })
                    return false;
                  }
                  
                  if(formulario.nip_nuevo.value < 1000)
                  {
                    formulario.re_nip_nuevo.value="";
                    formulario.nip_nuevo.value="";
                    formulario.nip_nuevo.focus();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        toast: true,
                        position: 'top',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey:false,
                        stopKeydownPropagation:false,
                        text: 'El nip nuevo no puede iniciar con cero.'
                    })
                    return false;
                  }
                  formulario.submit();
                }
      </script>

   </head>
<body>
<?php
    include 'Menu.php';
  ?>
<br>
<br>
<br>
<h3 align="center">Actualización de Nip</h3>
<form name="cambio_nip" action="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/php_s/cambiar_nip_bd.php" method="post">
  <input name="no_de_control" type="hidden" value="<?php echo $_SESSION ["usuario"]['Num_Ctrl']?>">
  <input name="anterior" type="hidden" value="<?php echo $_SESSION ["usuario"]['Contrasena']?>">
  <input name="Estado" type="hidden" value="<?php echo $_SESSION ["usuario"]['Estado']?>">
  <table align="center" width="300px">
    <tbody><tr>
      <th>No. de Control: </th>
      <td id="non"><?=$_SESSION ["usuario"]['Num_Ctrl']?><input name="no_de_control" type="hidden" value="<?php echo $_SESSION ["usuario"]['Num_Ctrl']?>"> </td>
    </tr>
    <tr>
      <th>Nombre: </th> 
      <td id="non"> <?=$_SESSION ["usuario"]['Nombre']?> <?=$_SESSION ["usuario"]['Ape_paterno']?> <?=$_SESSION ["usuario"]['Ape_Materno']?> </td>
    </tr>
    <tr>
      <th>Nip Anterior: </th>
      <td id="non"><input name="nip" type="password" size="8" maxlength="5" > </td>
      <td id="non">  </td>
    </tr> 
    <tr>
      <th>Nuevo Nip: </th>
      <td id="non"> <input name="nip_nuevo" type="password" id="pass1" size="8" maxlength="5"></td>
      
    </tr> 
        <tr>
      <th>Re Nuevo Nip: </th>
      <td id="non"> <input name="re_nip_nuevo" type="password" id="pass2" size="8" maxlength="5"> </td>
    </tr> 
  </tbody></table>
  <br>  
  <div align="center">
    <input type="button" name="aceptar" value="Aceptar" class="boton" onclick="valida_datos();"> 
    
    <input type="button" name="salir" value="Salir" class="boton"> 
  </div>
  

</body>
</html>
<?php
}else{

  header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
}
?>
