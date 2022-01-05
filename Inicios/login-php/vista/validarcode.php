 <?php
include '../Controlador/UsuarioControlador.php';
include '../helps/helps.php';
include '../helps/mcript.php';
session_start();

header('Content-type: application/json');
$resultado = array();
$resultados = array();
$valor = $_POST['tipo'];
$user  = validar_campo($_POST["usuario"]);
$cont = validar_campo($_POST["contrasena"]);
$Contrasena = $encriptar($cont);
if ($valor == "p") {
        $resultado = array("estado" => "trues" );

        if (UsuarioControlador::login($user, $Contrasena)) {
            $usuario             = UsuarioControlador::getNum_Ctrl($user, $Contrasena);
            $_SESSION["usuario"] = array(
                "Num_Ctrl"         => $usuario->getNum_Ctrl(),
                "Nombre"           => $usuario->getNombre(),
                "Ape_paterno"      => $usuario->getApe_Paterno(),
                "Ape_Materno"      => $usuario->getApe_Materno(),
                "Semestre"         => $usuario->getSemestre(),
                "Especialidad"     => $usuario->getEspecialidad(),
                "Grupo"            => $usuario->getGrupo(),
                "Periodo"          => $usuario->getPeriodo(),
                "Contrasena"       => $desencriptar($usuario->getContrasena()),
                "Estado"           => $usuario->getEstado()
            );
            return print(json_encode($resultado));
        }
        else
        {
            $resultado = array("estado" => "nooo");
            return print(json_encode($resultado)); 
        }
    }
    else
    {
        if ($valor =="a") {
            $resultados = array("estado" => "true");
    
            if (UsuarioControlador::loginadmi($user, $Contrasena)) {
                $usuario             = UsuarioControlador::getClave_RFC($user, $Contrasena);
                $_SESSION["usuario"] = array(
                    "Clave_RFC"         => $usuario->getClave_RFC(),
                    "Nombre"            => $usuario->getNombre(),
                    "Ape_Paterno"       => $usuario->getApe_Paterno(),
                    "Ape_Materno"       => $usuario->getApe_Materno(),
                    "Privilegios"       => $usuario->getPrivilegios(),
                );
                return print(json_encode($resultados));
                
            }
            else
            {
                $resultados = array("estado" => "nooo");
                return print(json_encode($resultados)); 
            }
    }

    
}




