 <?php
include '../Controlador/UsuarioControlador.php';
include '../helps/helps.php';
include '../helps/mcript.php';
session_start();
$var= "true";

header('Content-type: application/json');
$resultado = array();
$resultados = array();

if ($var == "true") {
    if ($_POST["usuario"] != null) {

        $Clave_RFC  = validar_campo($_POST["usuario"]);
        $cont = validar_campo($_POST["contrasenas"]);
        $Contrasena = $encriptar($cont);

        $resultados = array("estado" => "true");

        if (UsuarioControlador::loginadmi($Clave_RFC, $Contrasena)) {
            $usuario             = UsuarioControlador::getClave_RFC($Clave_RFC, $Contrasena);
            $_SESSION["usuario"] = array(
                "Clave_RFC"         => $usuario->getClave_RFC(),
                "Nombre"            => $usuario->getNombre(),
                "Ape_Paterno"       => $usuario->getApe_Paterno(),
                "Ape_Materno"       => $usuario->getApe_Materno(),
                "Usuario"       => $usuario->getUsuario(),
                "Privilegios"       => $usuario->getPrivilegios(),
            );
            return print(json_encode($resultados));
            
        }

    }
    else
    {
        if ($_POST["alumno"] != null) {

        $Num_Ctrl  = validar_campo($_POST["alumno"]);
        $cont = validar_campo($_POST["contrasena"]);
        $Contrasena = $encriptar($cont);


        $resultado = array("estado" => "trues" );

        if (UsuarioControlador::login($Num_Ctrl, $Contrasena)) {
            $usuario             = UsuarioControlador::getNum_Ctrl($Num_Ctrl, $Contrasena);
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
                "Estado"          => $usuario->getEstado()
            );
            return print(json_encode($resultado));
        }
    }
    else
    {
        if ($_POST['alumno'] == null && $_POST['usuario'] == null) {
            $resultado = array("estado" => "falso");
            print(json_encode($resultado));
            // code...
        }
    }
}

}
else
{
    $resultado = array("estado" => "false");
    return print(json_encode($resultado));

}


