<?php 
class Persona {
    
    private $nombre;
    private $apellido;
    private $dni;
    private $tel;
    public function __construct($nom, $ape, $dni, $tel)    {
        
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->dni = $dni;
        $this->tel = $tel;
    }
    //getters
    public function getNombre (){
        return $this->nombre;
    }
    public function getApellido (){
        return $this->apellido;
    }
    public function getDni (){
        return $this->dni;
    }
    public function getTel (){
        return $this->tel;
    }

    //setter
    public function setNombre ($nombre) {
        $this->nombre = $nombre;
    }
    public function setapellido ($apellido) {
        $this->apellido = $apellido;
    }
    public function setDni ($dni) {
        $this->dni = $dni;
    }
    public function setTel ($tel) {
        $this->tel = $tel;
    }

    public function __toString() {
        return  "NOMBRE: ".$this->getNombre()."\n". "APELLIDO: " . $this->getApellido() . "\n"
        . "DNI: ". $this->getDni() . "\n" . "Telefono: ". $this->getTel();
    }


    

}
