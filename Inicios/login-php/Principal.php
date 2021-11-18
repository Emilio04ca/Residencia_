<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../Estilo_General_Principal.css">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/overhang.min.css" />
	<script type="text/javascript">
		function cambiar_imagen(id, imagen)
			{
				x=document.getElementById(id);
				x.src = "../image_info/"+imagen;
			}
			var obj=null;
			function mostrar(id)
				{
					var targetId, srcElement, targetElement;
					var targetElement = document.getElementById(id);
					if (obj!=null) 
  						obj.style.display='none';
					obj=targetElement;
					targetElement.style.display = "";
				}
			/*function valida_datos()
				{
					formulario = document.acceso;
					if(formulario.tipo.value=='a')
					{
						msj_usr = "usuario";
						msj_pws = "contraseña";
					}
					else 
					{
						msj_usr = "número de control";
						msj_pws = "nip";
						if (formulario.tipo.value=='p')
						{
							if(isNaN(formulario.usuario.value))
							{
								window.alert("Introduce un número de solicitud numérico");	
								formulario.usuario.focus();
								return false;	
							}
						}
						
						if(isNaN(formulario.contrasena.value))
						{
							window.alert("Introduce un NIP numérico");
							formulario.contrasena.focus();
							return false;	
						}
						if(formulario.contrasena.value.length>4)
						{
							window.alert("Introduce un NIP de 4 caracteres");
							formulario.contrasena.focus();
							return false;	
						}
					}	
					
					if(formulario.usuario.value=="" || formulario.usuario.value==null)
					{
						window.alert("Por favor introduce tu "+msj_usr);
						formulario.usuario.focus();
						return false;
					}
					
					if(formulario.contrasena.value=="" || formulario.contrasena.value==null)
					{
						window.alert("Por favor introduce tu "+msj_pws);
						formulario.contrasena.focus();
						return false;
					}
					return true
					//formulario.submit();
				}*/
	</script>
</head>
<body>
	<br>
	<form name="acceso" id="loginForm" method="post" action="validarcode.php" role="form">
		
		<table width="200" align="center">
				<tbody>
					<tr>
						<td align="left"> 
							<img class="titulos" src="../image_info/Alumno.png" onclick="mostrar('p');" id="img_personal" 
							onmouseover="cambiar_imagen('img_personal','AlumnoOver.png',1)" onmouseout="cambiar_imagen('img_personal','Alumno.png')">
						</td>	
					</tr>
					<tr>
						<td align="right"> 
							<img class="titulos" src="../image_info/Personal.png" onclick="mostrar('a');" id="img_alumnos" 
							onmouseover="cambiar_imagen('img_alumnos','Personalover.png',1)" onmouseout="cambiar_imagen('img_alumnos','Personal.png')">
						</td>
					</tr>
				</tbody>
		</table>
	
	<div align="center" style="display:none;" id="a" class="box">
		<h1>Autentificación para acceso al sistema </h1>
		<label for="username" id="user">Usuario</label>
  		<input type="text" name="usuario" autofocus required >
  		<label for="password" id="pass">Contraseña</label>
  		<input type="password" name="contrasenas"  required >
  		<input type="submit" value="Acceso">
  	</div>
  	<div align="center" style="display:none;" id="p" class="box">
		<h1>Autentificación para acceso al sistema </h1>
		<label for="username" id="user">No. Control:</label>
  		<input type="text" name="alumno"  autofocus required>
  		<label for="password" id="pass">Nip</label>
  		<input type="password" name="contrasena"   required>
  		<input type="submit" value="Acceso">
  	</div>
   </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../assets/js/overhang.min.js"></script>
   <script src="../assets/js/app.js"></script>
</body>
</html>