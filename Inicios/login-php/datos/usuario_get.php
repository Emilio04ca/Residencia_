<?php
 
include 'Conexion.php';
include '../entidades/usuario.php';
include '../entidades/admi.php';

class UsuarioDao extends Conexion
{
    protected static $cnx;

    private static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    /**
     * Metodo que sirve para validar el login
     *
     * @param      object         $usuario
     * @return     boolean
     */
    public static function login($usuario)
    {
        $query = "SELECT * FROM login_est WHERE Num_Ctrl = :Num_Ctrl AND Contrasena = :Contrasena";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":Num_Ctrl", $usuario->getNum_Ctrl());
        $resultado->bindValue(":Contrasena", $usuario->getContrasena());

        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if ($filas["Num_Ctrl"] == $usuario->getNum_Ctrl()
                && $filas["Contrasena"] == $usuario->getContrasena()) {
                return true;
            }
        }

        return false;
    }
    public static function loginadmi($usuario)
    {
        $query = "SELECT * FROM login_admi WHERE Clave_RFC = :Clave_RFC AND Contrasena = :Contrasena";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":Clave_RFC", $usuario->getClave_RFC());
        $resultado->bindValue(":Contrasena", $usuario->getContrasena());

        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if ($filas["Clave_RFC"] == $usuario->getClave_RFC()
                && $filas["Contrasena"] == $usuario->getContrasena()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Metodo que sirve obtener un usuario
     *
     * @param      object         $usuario
     * @return     object
     */
    public static function getClave_RFC($usuario)
    {
        $query = "SELECT Clave_RFC,Nombre,Ape_paterno,Ape_Materno, Privilegios FROM login_admi WHERE Clave_RFC = :Clave_RFC AND Contrasena = :Contrasena";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":Clave_RFC", $usuario->getClave_RFC());
        $resultado->bindValue   (":Contrasena", $usuario->getContrasena());

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Admi();
        $usuario->setClave_RFC($filas["Clave_RFC"]);
        $usuario->setNombre($filas["Nombre"]);
        $usuario->setApe_Paterno($filas["Ape_paterno"]);
        $usuario->setApe_Materno($filas["Ape_Materno"]);
        $usuario->setPrivilegios($filas["Privilegios"]);

        return $usuario;
    }
     public static function getNum_Ctrl($usuario)
    {
        $query = "SELECT datos_alumnos.Num_Ctrl, datos_alumnos.Nombre, datos_alumnos.Ape_paterno, datos_alumnos.Ape_Materno,datos_alumnos.Semestre, datos_alumnos.Especialidad, datos_alumnos.Grupo, datos_alumnos.Periodo, datos_alumnos.Vigente, login_est.Contrasena, login_est.Estado FROM datos_alumnos
 INNER JOIN login_est ON datos_alumnos.Num_Ctrl = login_est.Num_Ctrl WHERE login_est.Contrasena = :Contrasena AND login_est.Num_Ctrl= :Num_Ctrl ";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":Num_Ctrl", $usuario->getNum_Ctrl());
        $resultado->bindValue(":Contrasena", $usuario->getContrasena());

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuario();
        $usuario->setNum_Ctrl($filas["Num_Ctrl"]);
        $usuario->setNombre($filas["Nombre"]);
        $usuario->setApe_Paterno($filas["Ape_paterno"]);
        $usuario->setApe_Materno($filas["Ape_Materno"]);
        $usuario->setSemestre($filas["Semestre"]);
        $usuario->setEspecialidad($filas["Especialidad"]);
        $usuario->setGrupo($filas["Grupo"]);
        $usuario->setPeriodo($filas["Periodo"]);
        $usuario->setStatus($filas["Vigente"]);
        $usuario->setContrasena($filas["Contrasena"]);
        $usuario->setEstado($filas["Estado"]);

        return $usuario;
    }
}
