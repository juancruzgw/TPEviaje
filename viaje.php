<?php /*Importante: Deben enviar el link a la resolución en su repositorio en GitHub del ejercicio.
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.
Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.
Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.

Nota: Recuerden que deben enviar el link a la resolución en su repositorio en GitHub*/


class Viaje {

    private $codigo;
    private $destino;
    private $cantMax;
    private $objPasajeros;
    private $objResponsableV;

    public function __construct($c,$d,$cantMax, $responsable, $pasajero)   {
        $this->codigo = $c;
        $this->destino = $d;
        $this->cantMax = $cantMax;  
        $this->objResponsableV = $responsable;
        $this->objPasajeros = $pasajero;
    }
    //GETTERS
    public function getCodigo (){
        return $this->codigo;
    }
    public function getDestino (){
        return $this->destino;
    }
    public function getCantMax (){
        return $this->cantMax;
    }
    public function getObjPasajeros (){
        return $this->objPasajeros;
    }
    public function getObjResponsableV (){
        return $this->objResponsableV;
    }
    //SETTERS
    public function setCodigo($c){
        $this->codigo = $c;
    }
    public function setDestino ($c){
        $this->destino = $c;
    }
    public function setCantMax ($c){
        $this->cantMax = $c;
    }
    public function setObjPasajeros ($c){
        $this->objPasajeros = $c;
    }
    public function setObjResponsableV($c){
        $this->objResponsableV = $c;
    }
    // esta function accede al arreglo donde estan los viajeros
    // luego recorre todos los elementos (objetos)
    // $arrayPasajeros le asigno el objeto con el metodo de acceso 
    public function verPasajeros (){
        
        if ($this->getObjPasajeros()!= null) {

            $arrayPasajeros = $this->getObjPasajeros();
            $Persona = "";

            foreach($arrayPasajeros as $pasajero){
                
                $Persona .= $pasajero . "\n";
                $Persona .= "---------------\n";
                
            }  
        }
        return $Persona;
    }

    /*public function colPersonasAstring ($coleccionPasajeros){
        $persona = "";

        foreach ($coleccionPasajeros as $pasajero){
            echo $pasajero ."\n";
        }
        return $pasajero;
    }*/

    public function __toString() {
        $cadena = "Codigo de viaje: ". $this->getCodigo() . "\n Destino: ". $this->getDestino(). "\n Capacidad maxima de pasajeros: ". $this->getCantMax(). "\n"."--------------------------------------------------\n" .$this->getObjResponsableV(). "\n";
       $cadena .= $this->verPasajeros();  
        return $cadena;
    }

    public function buscaPasajero ($dniBuscado){ 

        $arregloPasajeros = $this->getObjPasajeros();
        $encontrado = false;
        
        foreach ($arregloPasajeros as $pasajero){

            if ($pasajero->getDni() === $dniBuscado){
            
                $encontrado = true;
                
             }
            }
        return $encontrado;
    }

    public function mostrarViaje(){
        return 
       "Su destino es: ".$this->getDestino(). "\n ".
       "Codigo: ".$this->getCodigo(). " \n ".
       "Cantidad maxima de pasajeros: ". $this->getCantMax() ."\n";
    }
      
// TERMINAR...
   


    //METODOS DE RESPONSABLE V.
    public function muestraResponsable (){
       return  $this->getObjResponsableV();
    }
    //NOMBRE
    public function modificaNombreResponsable ($nuevoNombre){
        $responsable = $this->getObjResponsableV();
        return $responsable->setNombre($nuevoNombre);
    }
    // Num de empleado
    public function modificaNumResponsable ($nuevoNum){
        $responsable = $this->getObjResponsableV();
        return $responsable->setNumEmpleado($nuevoNum);
    }
    //Licencia
    public function modificaNumLicencia ($nuevoNumLicencia){
        $responsable = $this->getObjResponsableV();
        return $responsable->setNumLicencia($nuevoNumLicencia);
    }
    // Apellido
    public function modificaApellido ($nuevoApellido){
        $responsable = $this->getObjResponsableV();
        return $responsable->setApellido($nuevoApellido);
    }
    






}