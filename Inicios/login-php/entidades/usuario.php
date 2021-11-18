<?php
 
class Usuario
{

    private $Num_Ctrl;
    private $Nombre;
    private $Ape_Paterno;
    private $Ape_Materno;
    private $Semestre;
    private $Especialidad;
    private $Status;
    private $Contrasena;
    
    public function getNum_Ctrl(){
        return $this->Num_Ctrl;
    }

    public function setNum_Ctrl($Num_Ctrl){
        $this->Num_Ctrl = $Num_Ctrl;
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

    public function getSemestre(){
        return $this->Semestre;
    }

    public function setSemestre($Semestre){
        $this->Semestre = $Semestre;
    }

    public function getEspecialidad(){
        return $this->Especialidad;
    }

    public function setEspecialidad($Especialidad){
        $this->Especialidad = $Especialidad;
    }
    public function getGrupo(){
        return $this->Grupo;
    }

    public function setGrupo($Grupo){
        $this->Grupo = $Grupo;
    }
    public function getPeriodo(){
        return $this->Periodo;
    }

    public function setPeriodo($Periodo){
        $this->Periodo = $Periodo;
    }

    public function getStatus(){
        return $this->Status;
    }

    public function setStatus($Status){
        $this->Status = $Status;
    }

    public function getContrasena(){
        return $this->Contrasena;
    }

    public function setContrasena($Contrasena){
        $this->Contrasena = $Contrasena;
    }
    public function getEstado(){
        return $this->Estado;
    }

    public function setEstado($Estado){
        $this->Estado = $Estado;
    }
}
