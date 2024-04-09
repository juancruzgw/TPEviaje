<?php
include_once 'viaje.php';
include_once 'persona.php';
include_once 'responsableV.php';

    //----------------INSTANCIAS----------------//
    


$personaResponsable = new Responsable(21, 412, "Jorge","El curioso");

$pasajero = new Persona("Michael", "Jackson", 4283612, 90732234);
$pasajero1 = new Persona("Jack", "Herer", 420240, 9073224434);
$pasajero2 = new Persona("Carl", "Jhonson", 352896, 03373);
$pasajero3 = new Persona("Juan", "Pérez", 424283612, 42907334);
$pasajero4 = new Persona("Leo", "Messi", 545, 9207234);

$coleccionPasajeros = [$pasajero, $pasajero1,$pasajero2,$pasajero3,$pasajero4];

$objViaje = new Viaje (412,"Buenos Aires",100,$personaResponsable, $coleccionPasajeros);

//empieza($objViaje);


// ---------------- Clase Viaje ---------------- //
// - Mostrar Viaje (Atributos)
// - Cambiar Viaje (Atributos)
// - Atributos: #Codigo
//              #Destino 
//              #Cantidad Maxima de Pasajeros.
function mostrarViaje ($objViaje) {
echo "El destino del viaje es: ".$objViaje->getDestino() . "\n";
echo "El codigo es: ".$objViaje->getCodigo() . "\n";
echo "La capacidad maxima es de: ".$objViaje->getCantMax() . "\n";
}

/*$esta = $objViaje->buscaPasajero(562);
if ($esta){
    echo "esta";
}
elseif (!$esta){
    echo "NO esta";
}*/

function modificaViaje ($objViaje){
    echo "Que quieres modificar? "."\n";
    echo " 1 - El Codigo"."\n";
    echo " 2 - El Destino"."\n";
    echo " 3 - Cantidad Maxima "."\n";
    echo " 4 - Agregar Pasajero"."\n";
    echo " 5 - Cambiar Encargado"."\n";
    $eligio = trim(fgets(STDIN));
    

switch ($eligio){
    case 1:
     echo "El codigo actual es: ". $objViaje->getCodigo() . "\n";
     echo "Ingrese el nuevo codigo: ";
    $codigoNuevo = trim(fgets(STDIN));
     if ($codigoNuevo>0){
        $objViaje->setCodigo($codigoNuevo) . "\n";
        echo "Se cambio correctamente" ."\n";
        echo "El nuevo codigo es ".$objViaje->getCodigo(). "\n";
        echo "-----------------------------"."\n";
        break;
    }
    
    case 2:
        echo "El Destino actual es: ". $objViaje->getDestino() . "\n";
        echo "Ingrese el nuevo destino: ";
        $destino = trim(fgets(STDIN));
        if (is_string($destino)){
            $objViaje->setDestino($destino);
            echo "Se modifico correctamente.". "\n";
            echo "Su nuevo destino es: ". $objViaje->getDestino()."\n";
            echo "-----------------------------"."\n";
            break;
        }
        else {
            //no funciona el "is_string" de arriba :/ 
              echo "Intentelo nuevamente";
        }
    case 3:
        echo "La cantidad Maxima de viajeros es de: ". $objViaje->getCantMax();
        echo "Ingrese la cantidad maxima nueva: ";
        $cantMax = trim(fgets(STDIN));
        $objViaje->setCantMax($cantMax);
        echo "Se registro correctamente";
        echo "La capacidad ahora es de ". $objViaje->getCantMax();
    case 4:
        $objViaje->agregarPasajero();
}
}


function elegirOpcion ($objViaje,$opcion){

    switch($opcion){
        case 1:
        $objViaje->mostrarViaje();
            break;
        

    }
}



function cambiaEncargado ($objViaje){
    //$encargado seria el objeto de la clase responsableV.php
    $encargado = $objViaje->getObjResponsableV();
    $encargado->getNombre();

   
}




function agregarPasajeros ($objViaje,$coleccionPasajeros){
    
    do {
     
   
    if (count($coleccionPasajeros) < $objViaje->getCantMax()){
    echo "ingrese el nombre del pasajero ";
    $nombreP = trim(fgets(STDIN));
    echo "ingrese el apellido: ";
    $apellidoP = trim(fgets(STDIN));
    echo "Ingrese el telefono: ";
    $telP = trim(fgets(STDIN));
    echo "Ingrese el DNI: ";
    $dniP = 545; // NO ME FUNCIONA EL trim(fgets(STDIN)); ni el readline(); 
        
    $encontrado = $objViaje->buscaPasajero($dniP);  
    // chequear que no se repita  
    if ($encontrado){
        echo "El pasajero con ese DNI ya se encuentra en la lista". "\n";
        //SIEMPRE ENTRA EN EL ELSE-IF :(

    }elseif (!$encontrado){
        $pasajero = new Persona($nombreP,$apellidoP,$telP,$dniP);
        $coleccionPasajeros[] = $pasajero; 
        echo "El pasajero se agrego correctamente" . "\n";
    }
    }
    else {
        echo "El cupo esta lleno";
    }
    echo "Desea ingresar otro?";
    $sigue = strtolower(trim(fgets(STDIN)));

    } while ($sigue == "si");
return $coleccionPasajeros;
}



 function agregaPasajero ($dniPasajero,$coleccionPasajeros, $objViaje){


   $encontrado = $objViaje->buscaPasajero($dniPasajero);

   if ($encontrado){
    echo "La persona con ese DNI ya está registrado.";
   }
   else {
    agregarPasajeros($objViaje ,$coleccionPasajeros);
   }
 }

 // ------------ MENU ------------ //
//comienza();

 function comienza ($objViaje){

    echo "--- INFORMACION DEL VIAJE ---" ."\n ";
    echo $objViaje->mostrarViaje();
    do{
        menu();

        $opcion = trim(fgets(STDIN));
        eligio($opcion, $objViaje);

    } while ($opcion!=0);
 }


 function menu (){
    echo " 1- Informacion de todos los pasajeros". "\n ";
    echo "2- Modificar el viaje". "\n ";
    echo "3- Agregar Pasajero". "\n ";
    echo "4- Mostrar info del encargado del viaje". "\n ";
    echo "5- Modificar datos del encargado". "\n ";
    $opcion = trim(fgets(STDIN));
    return $opcion;
 }

 function eligio ($opcion, $objViaje){

    switch ($opcion){

    case 1:     echo $objViaje->verPasajeros(); //
     break;

    case 2:     modificaViaje($objViaje); //
    break;

    case 3:     $objViaje->agregaPasajero(); //NO anda todavia
    break;
    case 4: 
    }
 }

 //comienza ($objViaje);
 //echo $objViaje->muestraResponsable();

 function modificaResponsable ($objViaje){
    echo "Que quieres modificar? "."\n";
    echo " 1 - El nombre"."\n";
    echo " 2 - El apellido"."\n";
    echo " 3 - El numero de empleado "."\n";
    echo " 4 - El numero de Licencia"."\n";
    $eligio = trim(fgets(STDIN));
    
switch ($eligio){
    case 1:
     echo "El nombre del empleado actual es: ". $objViaje->getObjResponsableV()->getNombre() . "\n";
     echo "Ingrese el nombre nuevo: ";
    $nuevoNombre = trim(fgets(STDIN));
     if (is_string($nuevoNombre)){
        $objViaje->modificaNombreResponsable($nuevoNombre) . "\n";
        echo "Se cambio correctamente" ."\n";
        echo "El nuevo nombre del empleado es: ".$objViaje->getObjResponsableV()->getNombre(). "\n";
        echo "-----------------------------"."\n";
        break;
    }
    
    case 2:
        echo "El Destino actual es: ". $objViaje->getDestino() . "\n";
        echo "Ingrese el nuevo destino: ";
        $destino = trim(fgets(STDIN));
        if (is_string($destino)){
            $objViaje->setDestino($destino);
            echo "Se modifico correctamente.". "\n";
            echo "Su nuevo destino es: ". $objViaje->getDestino()."\n";
            echo "-----------------------------"."\n";
            break;
        }
        else {
            //no funciona el "is_string" de arriba :/ 
              echo "Intentelo nuevamente";
        }
    case 3:
        echo "La cantidad Maxima de viajeros es de: ". $objViaje->getCantMax();
        echo "Ingrese la cantidad maxima nueva: ";
        $cantMax = trim(fgets(STDIN));
        $objViaje->setCantMax($cantMax);
        echo "Se registro correctamente";
        echo "La capacidad ahora es de ". $objViaje->getCantMax();
        
}
}

//agregarPasajeros($objViaje,$coleccionPasajeros);
//modificaViaje ($objViaje);
