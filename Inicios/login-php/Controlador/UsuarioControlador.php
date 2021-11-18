 <?php
 
include '../datos/usuario_get.php';

class UsuarioControlador
{

    public static function login($Num_Ctrl, $Contrasena)
    {
        $obj_usuario = new Usuario();
        $obj_usuario->setNum_Ctrl($Num_Ctrl);
        $obj_usuario->setContrasena($Contrasena);

        return UsuarioDao::login($obj_usuario);
    }
    public static function loginadmi($Clave_RFC, $Contrasena)
    {
        $obj_usuario = new Admi();
        $obj_usuario->setClave_RFC($Clave_RFC);
        $obj_usuario->setContrasena($Contrasena);

        return UsuarioDao::loginadmi($obj_usuario);
    }
    

    public static function getNum_Ctrl($Num_Ctrl, $Contrasena)
    {
        $obj_usuario = new Usuario();
        $obj_usuario->setNum_Ctrl($Num_Ctrl);
        $obj_usuario->setContrasena($Contrasena);

        return UsuarioDao::getNum_Ctrl($obj_usuario);
    }
    public static  function getClave_RFC($Clave_RFC, $Contrasena)
    {
        $obj_usuario = new Admi();
        $obj_usuario->setClave_RFC($Clave_RFC);
        $obj_usuario->setContrasena($Contrasena);

        return UsuarioDao::getClave_RFC($obj_usuario);
    }
    

    

}
