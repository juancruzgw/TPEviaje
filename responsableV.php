<?php 
class Responsable {
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    public function __construct($e, $n, $nombre, $ape) {
        $this->numEmpleado = $e;
        $this->numLicencia = $n;
        $this->nombre = $nombre;
        $this->apellido = $ape;
    }
    //getter
    public function getNumEmpleado (){
        return $this->numEmpleado;
    }
    public function getNumLicencia (){
        return $this->numLicencia;
    }
    public function getNombre (){
        return $this->nombre;
    }
    public function getApellido (){
        return $this->apellido;
    }
    //setter 
    public function setNumEmpleado ($num){
        $this->numEmpleado = $num;
    }
    public function setNumLicencia ($numLic){
        $this->numLicencia = $numLic;
    }
    public function setNombre ($nom){
        $this->nombre = $nom;
    }
    public function setApellido ($ape){
        $this->apellido = $ape;
    }


    public function __toString() {
        $cadena = ".........ENCARGADO.........\n" . " Numero: ".$this->getNumEmpleado(). "\n Licencia: ". $this->getNumLicencia(). "\n Nombre: ".$this->getNombre(). " ". $this->getApellido() ;
        return $cadena;
    }

}