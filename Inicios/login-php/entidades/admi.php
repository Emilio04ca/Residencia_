 <?php

class Admi
{
    private $Clave_RFC;
    private $Nombre;
    private $Ape_Paterno;
    private $Ape_Materno;
    private $Contrasena;
    private $Usuario;
    private $Privilegios;

    public function getClave_RFC(){
        return $this->Clave_RFC;
    }

    public function setClave_RFC($Clave_RFC){
        $this->Clave_RFC = $Clave_RFC;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function getApe_Paterno(){
        return $this->Ape_Paterno;
    }

    public function setApe_Paterno($Ape_Paterno){
        $this->Ape_Paterno = $Ape_Paterno;
    }
     public function getApe_Materno(){
        return $this->Ape_Materno;
    }

    public function setApe_Materno($Ape_Materno){
        $this->Ape_Materno = $Ape_Materno;
    }


    public function getContrasena(){ 
        return $this->Contrasena;
    }

    public function setContrasena($Contrasena){
        $this->Contrasena = $Contrasena;
    }
    public function getUsuario(){ 
        return $this->Usuario;
    }

    public function setUsuario($Usuario){
        $this->Usuario = $Usuario;
    }
    public function getPrivilegios(){ 
        return $this->Privilegios;
    }

    public function setPrivilegios($Privilegios){
        $this->Privilegios = $Privilegios;
    }
}