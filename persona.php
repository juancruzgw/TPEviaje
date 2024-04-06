<?php 
class Persona {
    
    private $nombre;
    private $apellido;
    private $tipo;
    private $numDni;

    public function __construct($nom, $ape, $tip, $nDni)    {
        
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->tipo = $tip;
        $this->numDni = $nDni;
    }
    //getters
    public function getNombre (){
        return $this->nombre;
    }
    public function getApellido (){
        return $this->apellido;
    }
    public function getTipo (){
        return $this->tipo;
    }
    public function getnumDni (){
        return $this->numDni;
    }
    //setter
    public function setNombre ($nombre) {
        $this->nombre = $nombre;
    }
    public function setapellido ($apellido) {
        $this->apellido = $apellido;
    }
    public function setTipo ($tipo) {
        $this->tipo = $tipo;
    }
    public function setnumDni ($numDni) {
        $this->numDni = $numDni;
    }

    public function __toString() {
        return  "NOMBRE: ".$this->getNombre()."\n". "APELLIDO: " . $this->getApellido() . "\n"
        . "Tipo de DNI: ". $this->getTipo() . "\n" . "DNI: ". $this->getnumDni() . "\n";
    }


    

}
