<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Estilo_General_Principal.css">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/overhang.min.css"/>
	<script type="text/javascript">
		function cambiar_imagen(id, imagen)
			{
				x=document.getElementById(id);
				x.src = "../image_info/"+imagen;
			}
			var obj=null;
			
			function mostrar(t)
			{
				document.acceso.tipo.value = t;
				acc = document.getElementById("tabla_acceso");
				texto_usr = document.getElementById("user");
				texto_pws = document.getElementById("pass");

					switch(t)
					{
						case 'a':	//asp.style.visibility = "hidden";
								acc.style.visibility = "visible";
								texto_usr.innerHTML = "Usuario:";
								texto_pws.innerHTML = "Contraseña:";
								document.acceso.usuario.focus()
								break;
						case 'p':	//asp.style.visibility = "hidden";
								acc.style.visibility = "visible";
								texto_usr.innerHTML = "No. Control:";
								texto_pws.innerHTML = "NIP:";
								document.acceso.usuario.focus()
								break;
					}
			}
			
	</script>
	
</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<form name="acceso" id="loginForm" method="POST" action="validarcode.php">
	<input name="tipo" type="hidden" value="">
		<table width="700px" border="0" align="center" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td align="left"  height="280px"> 
							<img class="titulos" src="../image_info/Alumno.png" onclick="mostrar('p');" id="img_personal" 
							onmouseover="cambiar_imagen('img_personal','AlumnoOver.png',1)" onmouseout="cambiar_imagen('img_personal','Alumno.png')">
						</td>	
						<td align="center" height="270px">
							<div align="center"style="visibility:hidden;" id="tabla_acceso"  name='tipo' class="box">
								<h2>Autentificación para acceso al sistema </h2>
								<label for="username" id="user">Usuario</label>
						  		<input type="text" name="usuario" required>
						  		<label for="password" id="pass">Contraseña</label>
						  		<input type="password"  class="2" name="contrasena" minlenght="4" required>
						  		<input class="boton" type="submit" value="Acceso">
						  	</div>
						</td>
						<td align="right" height="280px"> 
							<img class="titulos" src="../image_info/Personal.png" onclick="mostrar('a');" id="img_alumnos" 
							onmouseover="cambiar_imagen('img_alumnos','Personalover.png',1)" onmouseout="cambiar_imagen('img_alumnos','Personal.png')">
						</td>
					</tr>
					<tr>
						
					</tr>
				</tbody>
		</table>	
   </form>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/overhang.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>