<?php
session_start();
require_once("config.php");
$id = $_POST['alumno'];
$id2 = $_POST['usuario'];
$cont = $_POST['contrasena'];

$clave  = 'la encripatcion es lo mejor que puede haber, por el simpe hecho de que la gnete jamas debe de saber sobre estos datos';
//Metodo de encriptación
$method = 'aes-256-cbc';
// Puedes generar una diferente usando la funcion $getIV()
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
 /*
 Encripta el contenido de la variable, enviada como parametro.
  */
 $encriptar = function ($valor) use ($method, $clave, $iv) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };
 /*
 Desencripta el texto recibido
 */
 $desencriptar = function ($valor) use ($method, $clave, $iv) {
     $encrypted_data = base64_decode($valor);
     return openssl_decrypt($valor, $method, $clave, false, $iv);
 };

//VERIFICACION DE ESCRITURA DE DATOS EN EL FORM
			if ($id == null)
            {
            	if ($id2 == null)
            	{

            	}
            	else
            	{

            		//  SI SE CONECTO Y SI SE ENVIARON AMBOS DATOS SE PROCEDE CON LA CONSULTA DE EXISTENCIA DEL USUARIO EVITANDO INYECCIONES SQL ?
						if ($stmt = $conn->prepare('SELECT Clave_RFC, Contrasena FROM login_admi WHERE Clave_RFC = ?'))
							{
								$stmt->bind_param('s', $id2);
								$stmt->execute();
								$stmt->store_result();
							     
							     // SI EL USUARIO EXISTE EN LA TABLA SE EXTRAE Y SE APUNTA SU DNI Y SU CLAVE
							     if ($stmt->num_rows > 0)
							      {
									$stmt->bind_result($nombre, $claves);
									$stmt->fetch();
							        
										// AHORA VERIFICA SI LA CLAVE QUE SE EXTRAJO DE LA TABLA ES IGUAL A LA QUE SE ENVIA DESDE EL FORMULARIO  
										       
							        	if ($_POST['contrasenas'] == $claves) 
							          	//if(password_verify( $_POST['password'],$clave))
							        		{
							                    // SI COINICIDEN AMBAS CONTRASEÑAS SE INICIA LA SESION Y SE LE DA LA BIENCENIDA AL USUARIO CON ECHO
												session_regenerate_id();
												$_SESSION['loggedin'] = TRUE;
												$_SESSION['name'] = $id2;
												$_SESSION['cont'] =  $claves;
										         echo 'BIENVENIDO USUARIO: ' . $_SESSION['name'] .' CON TU DNI NUMERO : '. $_SESSION['cont'] . '!';
							                   	header('Location: ../Admin_Edel/inicio_menu.html');
							                   
											} 
							           
							       				// SI EL USUARIO EXISTE PERO EL PASSWORD NO COINCIDE IMPRIMIR EN PANTALLA PASSWORD INCORRECTO
							       
							                   		else { echo "  <p> </p>   <p style=text-align:center;> <img src=https://cdn141.picsart.com/292255026029211.png?type=webp&to=min&r=640 style=width:200px;height:220px;></p>
		                        <p> </p>     <table border=1 cellspacing=0 cellpading=0 align=center BORDER BGCOLOR=#16DFDF>
		                        <tr align=center > <td ><font color=red><h2>¡PASSWORD INCORRECTO admi!</h2>  <a href='../Login_SIIE/Principal_1.html' >SALIR</a>  </td>    </tr>
		                        </table>"; 
		                        echo 'BIENVENIDO USUARIO: '. $_POST['contrasenas'] . '!';}
							                        
							       	}  
							      
							      
							      			   // SI EL USUARIO NO EXISTE MOSTRAR USUARIO INCORRECTO
							          				else { echo "  <p> </p>   <p style=text-align:center;> <img src=https://cdn141.picsart.com/292255026029211.png?type=webp&to=min&r=640 style=width:200px;height:220px;></p>
		                        <p> </p>     <table border=1 cellspacing=0 cellpading=0 align=center BORDER BGCOLOR=#16DFDF>
		                        <tr align=center > <td ><font color=red><h2>¡USUARIO INCORRECTO admi!</h2>  <a href='../Login_SIIE/Principal_1.html' >SALIR</a>  </td>    </tr>
		                        </table>"; }
			                        

									$stmt->close();
								}
            		}
            	}
			
			else{
						//  SI SE CONECTO Y SI SE ENVIARON AMBOS DATOS SE PROCEDE CON LA CONSULTA DE EXISTENCIA DEL USUARIO EVITANDO INYECCIONES SQL ?
						if ($stmt = $conn->prepare('SELECT info_estudiantes.Num_Ctrl, info_estudiantes.Nombre, info_estudiantes.Ape_paterno, info_estudiantes.Ape_Materno, login_est.Contrasena FROM info_estudiantes
 							INNER JOIN login_est ON info_estudiantes.Num_Ctrl = login_est.Num_Ctrl WHERE login_est.Num_Ctrl= ? '))
							{
								$stmt->bind_param('s', $id);
								$stmt->execute();
								$stmt->store_result();
							     
							     // SI EL USUARIO EXISTE EN LA TABLA SE EXTRAE Y SE APUNTA SU DNI Y SU CLAVE
							     if ($stmt->num_rows > 0)
							      {
									$stmt->bind_result($Num_ctrl, $Nombre, $Ape_Paterno, $Ape_Materno, $clave);
									$stmt->fetch();
							        
										// AHORA VERIFICA SI LA CLAVE QUE SE EXTRAJO DE LA TABLA ES IGUAL A LA QUE SE ENVIA DESDE EL FORMULARIO  
										       
							        	if ($encriptar($_POST['contrasena']) == utf8_decode($clave)) 
							          	//if(password_verify( $_POST['password'],$clave))
							        		{
							                    // SI COINICIDEN AMBAS CONTRASEÑAS SE INICIA LA SESION Y SE LE DA LA BIENCENIDA AL USUARIO CON ECHO
												session_regenerate_id();
												$_SESSION['loggedin'] = TRUE;
												$_SESSION['Num_Ctrl'] = $Num_ctrl;
												$_SESSION['Nombre'] =  $Nombre;
												$_SESSION['Ape_Paterno'] = $Ape_Paterno;
												$_SESSION['Ape_Materno'] =  $Ape_Materno;
										         echo 'BIENVENIDO USUARIO: ' . $_SESSION['name'] .' CON TU DNI NUMERO : '. $_SESSION['dni'] . '!';
							                    header('Location: ../MENU_SIIE/inicio_menu.php');
							                   
											} 
							           
							       				// SI EL USUARIO EXISTE PERO EL PASSWORD NO COINCIDE IMPRIMIR EN PANTALLA PASSWORD INCORRECTO
							       
							                   		else { echo "  <p> </p>   <p style=text-align:center;> <img src=https://cdn141.picsart.com/292255026029211.png?type=webp&to=min&r=640 style=width:200px;height:220px;></p>
		                        <p> </p>     <table border=1 cellspacing=0 cellpading=0 align=center BORDER BGCOLOR=#16DFDF>
		                        <tr align=center > <td ><font color=red><h2>¡PASSWORD INCORRECTO !</h2>  <a href='../Login_SIIE/Principal_1.php' >SALIR</a>  </td>    </tr>
		                        </table>"; }
							                        
							       	}  
							      
							      
							      			   // SI EL USUARIO NO EXISTE MOSTRAR USUARIO INCORRECTO
							          				else { echo "  <p> </p>   <p style=text-align:center;> <img src=https://cdn141.picsart.com/292255026029211.png?type=webp&to=min&r=640 style=width:200px;height:220px;></p>
		                        <p> </p>     <table border=1 cellspacing=0 cellpading=0 align=center BORDER BGCOLOR=#16DFDF>
		                        <tr align=center > <td ><font color=red><h2>¡USUARIO INCORRECTO lol !</h2>  <a href='../Login_SIIE/Principal_1.php' >SALIR</a>  </td>    </tr>
		                        </table>"; }
			                        

									$stmt->close();
								}
							}
			
			/*else
			{

				//  SI SE CONECTO Y SI SE ENVIARON AMBOS DATOS SE PROCEDE CON LA CONSULTA DE EXISTENCIA DEL USUARIO EVITANDO INYECCIONES SQL ?
				if ($stmt = $conn->prepare('SELECT Num_Ctrl, Contrasena FROM login WHERE Num_Ctrl = ?'))
					{
						$stmt->bind_param('s', $_POST['alumno']);
						$stmt->execute();
						$stmt->store_result();
					     
					     // SI EL USUARIO EXISTE EN LA TABLA SE EXTRAE Y SE APUNTA SU DNI Y SU CLAVE
					     if ($stmt->num_rows > 0)
					      {
							$stmt->bind_result($dni, $clave);
							$stmt->fetch();
					        
								// AHORA VERIFICA SI LA CLAVE QUE SE EXTRAJO DE LA TABLA ES IGUAL A LA QUE SE ENVIA DESDE EL FORMULARIO         
					        	if ($_POST['contrasena'] == $clave) 
					          	//if(password_verify( $_POST['password'],$clave))
					        		{
					                    // SI COINICIDEN AMBAS CONTRASEÑAS SE INICIA LA SESION Y SE LE DA LA BIENCENIDA AL USUARIO CON ECHO
										session_regenerate_id();
										$_SESSION['loggedin'] = TRUE;
										$_SESSION['name'] = $_POST['alumno'];
										$_SESSION['dni'] = $_POST['contrasena'];
								         echo 'BIENVENIDO USUARIO: ' . $_SESSION['name'] .' CON TU DNI NUMERO : '. $_SESSION['dni'] . '!';
					                   // header('Location: perfil.php');
					                   
									} 
					           
					       				// SI EL USUARIO EXISTE PERO EL PASSWORD NO COINCIDE IMPRIMIR EN PANTALLA PASSWORD INCORRECTO
					       
					                   		else { 
												header("Location:../Login_SIIE/Principal_1.html");
												echo'
						                   			<script type="text/javascript">
													    alert("PASSWORD NO COINCIDE");
													    window.location.href="../Login_SIIE/Principal.html";
													</script>';
												

											}
					                        
					       	}  
					      
					      
					      			   // SI EL USUARIO NO EXISTE MOSTRAR USUARIO INCORRECTO
					          				else { 
												header("Location:../Login_SIIE/Principal_1.html");
												echo'
						                   			<script type="text/javascript">
													    alert("EL USUARIO NO EXISTE");
													    window.location.href="../Login_SIIE/Principal.html";
													</script>';
												
											}
	                        

							
					}
			}*/
?>