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
			function mostrar(id)
				{
					document.acceso.tipo.value= id;
					var targetId, srcElement, targetElement;
					var targetElement = document.getElementById(id);
					if (obj!=null) 
  						obj.style.display='none';
					obj=targetElement;
					targetElement.style.display = "";
				}
			function ValidarDatos()
				{
					formulario = document.acceso;
						if (formulario.tipo.value =="p")
						{
							if(isNaN(formulario.alumno.value))
								{
									window.alert("Introduce un número de solicitud numérico");	
									formulario.alumno.focus();
									return false;	
								}
								else
									{			
										if(isNaN(formulario.contrasena.value))
										{
											window.alert("Introduce un NIP numérico");
											formulario.contrasena.focus();
											//return false;	
										}
										else
											{
												if(formulario.contrasena.value.length>4)
												{
													window.alert("Introduce un NIP de 4 caracteres");
													formulario.contrasena.focus();
													return false;	
												}
												else
													{
														if(formulario.alumno.value=="")
															{
																window.alert("Por favor introduce tu numero de control");
																formulario.usuario.focus();
																return false;
															}
															else
																{
																	if(formulario.contrasena.value=="")
																		{
																			window.alert("Por favor introduce tu contraseña");
																			formulario.contrasena.focus();
																			return false;
																		}
																		else
																		{
																			if(formulario.alumno.value !=="" || formulario.contrasena.value !=="")
																			return true;
																			//formulario.submit();
																		}
																}
													}
											}
									}							
						}
						else
						{
							if(isNaN(formulario.usuario.value))
								{
									window.alert("Introduce un número de solicitud numérico");	
									formulario.alumno.focus();
									return false;	
								}
								else
									{			
										if(isNaN(formulario.contrasenas.value))
										{
											window.alert("Introduce un NIP numérico");
											formulario.contrasenas.focus();
											return false;	
										}
										else
											{
												if(formulario.contrasenas.value.length>4)
												{
													window.alert("Introduce un NIP de 4 caracteres");
													formulario.contrasenas.focus();
													return false;	
												}
												else
													{
														if(formulario.usuario.value=="")
															{
																window.alert("Por favor introduce tu numero de control");
																formulario.usuario.focus();
																return false;
															}
															else
																{
																	if(formulario.contrasenas.value=="")
																		{
																			window.alert("Por favor introduce tu contraseña");
																			formulario.contrasenas.focus();
																			return false;
																		}
																		else
																		{
																			//formulario.submit();
																			return true;
																		}
																}
													}
											}
									}	
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
	<form name="acceso" id="loginForm" method="POST" action="validarcode.php" role="form"  onsubmit="return ValidarDatos()">
	<input name="tipo" type="hidden" value="">
		<table width="700px" border="0" align="center" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td align="left"  height="280px"> 
							<img class="titulos" src="../image_info/Alumno.png" onclick="mostrar('p');" id="img_personal" 
							onmouseover="cambiar_imagen('img_personal','AlumnoOver.png',1)" onmouseout="cambiar_imagen('img_personal','Alumno.png')">
						</td>	
						<td align="center" height="270px">
							<div align="center" style="display:none;" id="a" name='tipo' class="box">
								<h2>Autentificación para acceso al sistema </h2>
								<label for="username" id="user">Usuario</label>
						  		<input type="text" name="usuario">
						  		<label for="password" id="pass">Contraseña</label>
						  		<input type="password" name="contrasenas" >
						  		<input class="boton" type="submit" value="Acceso">
						  	</div>
						  	<div align="center" style="display:none;" id="p" name='tipo' class="box">
								<h2>Autentificación para acceso al sistema </h2>
								<label for="username" id="user">No. Control:</label>
						  		<input type="text" name="alumno">
						  		<label for="password" id="pass">Nip</label>
						  		<input type="password" name="contrasena"   >
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