<?php
include 'Pasajero.php';
include 'ResponsableV.php';

class Viaje
{
    //Atributos
    private $codViaje;
    private $destino;
    private $costoViaje;
    private $sumaCostos;
    private $maxPasajeros;
    private $datosPasajeros;
    private $responsable;

    //Método constructor
    public function __construct($codigo, $lugarDestino, $elCostoViaje, $cantMaxPsj, $cantTotal, $elResponsable)
    {
        $this->codViaje = $codigo;
        $this->destino = $lugarDestino;
        $this->costoViaje = $elCostoViaje;
        $this->sumaCostos = 0;
        $this->maxPasajeros = $cantMaxPsj;
        $this->datosPasajeros = $cantTotal;
        $this->responsable = $elResponsable;
    }

    //Getters
    public function getCodigoViaje()
    {
        return $this->codViaje;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getCostoViaje()
    {
        return $this->costoViaje;
    }
    public function getSumaCostos()
    {
        return $this->sumaCostos;
    }
    public function getMaxPasajeros()
    {
        return $this->maxPasajeros;
    }
    public function getDatosPasajeros()
    {
        return $this->datosPasajeros;
    }
    public function getResponsable()
    {
        return $this->responsable;
    }

    //Setters
    public function setCodigoViaje($dato)
    {
        $this->codViaje = $dato;
    }
    public function setDestino($dato)
    {
        $this->destino = $dato;
    }
    public function setCostoViaje($dato)
    {
        $this->costoViaje = $dato;
    }
    public function setSumaCostos($dato)
    {
        $this->sumaCostos = $dato;
    }
    public function setMaxPasajeros($cant)
    {
        $this->maxPasajeros = $cant;
    }
    public function setDatosPasajeros($pasajeros)
    {
        $this->datosPasajeros = $pasajeros;
    }
    public function setResponsable($dato)
    {
        $this->responsable = $dato;
    }

    /**
     * Modifica datos de un pasajero o los elimina
     * @return string
     */
    public function modificarDatosPasajero($pasajero, $opcion)
    {
        $listado = $this->getDatosPasajeros();

        switch ($opcion) {
            case "nombre": {
                    echo "Nuevo nombre: ";
                    $pasajero->setNombre(trim(fgets(STDIN)));
                    break;
                }
            case "apellido": {
                    echo "Nuevo apellido: ";
                    $pasajero->setApellido(trim(fgets(STDIN)));
                    break;
                }
            case "dni": {
                    echo "Nuevo DNI: ";
                    $pasajero->setDni(trim(fgets(STDIN)));
                    break;
                }
            case "telefono": {
                    echo "Nuevo teléfono: ";
                    $pasajero->setTelefono(trim(fgets(STDIN)));
                    $this->setDatosPasajeros($listado);
                    break;
                }
        }
    }

    /**
     * Agrega un pasajero a la colección, verifica que no exista previamente
     * y retorna true si se agregó al listado
     * @return boolean
     */
    public function agregarPasajero($objPasajero)
    {
        $listado = $this->getDatosPasajeros();
        $i = 0;
        $n = count($listado);
        $retornar = false;
        $existe = false;

        while ($i < $n && $existe == false) {
            if ($listado[$i]->getDni() == $objPasajero->getDni()) {
                $existe = true;
            }
            $i++;
        }
        if (!$existe) {
            array_push($listado, $objPasajero);
            $this->setDatosPasajeros($listado);
            $retornar = true;
        }
        return $retornar;
    }

    /**
     * Elimina a un pasajero de la colección de pasajeros
     */
    public function borrarPasajero($dni)
    {
        $listado = $this->getDatosPasajeros();
        $i = 0;
        $n = count($listado);
        $existe = false;

        while ($i < $n && !$existe) {
            if ($listado[$i]->getDni() == $dni) {
                unset($listado[$i]);
                $listado = array_values($listado); //Acomodo los índices para que no quede ninguno vacío
                $this->setDatosPasajeros($listado);
                $existe = true;
            }
            $i++;
        }
        return $existe;
    }

    /**
     * Busca a un pasajero del viaje, muestra su información
     */
    public function buscarPasajero($dni)
    {
        $listado = $this->getDatosPasajeros();
        $i = 0;
        $n = count($listado);
        $existe = false;

        while ($i < $n && !$existe) {
            if ($listado[$i]->getDni() == $dni) {
                $existe = true;
                $pasajero = $listado[$i];
            }
            $i++;
        }
        if ($existe == false) {
            $pasajero = null;
        }
        return $pasajero;
    }

    /**
     * Muestra la información de todos los pasajeros por pantalla
     * @return string
     */
    public function mostrarPasajeros()
    {
        $listado = $this->getDatosPasajeros();
        $n = count($listado);
        $i = 0;
        if ($n == 0) {
            $cadena = "\nNingún pasajero registrado.\n";
        } else {
            $cadena = "\n>> DATOS PASAJEROS";
            for ($i; $i < $n; $i++) {
                $cadena .= $listado[$i]->__toString();
            }
        }
        return $cadena;
    }

    /**
     * Modifica los datos del responsable del viaje
     */
    public function modificarDatosResponsable($opcion)
    {
        $responsable = $this->getResponsable();
        switch ($opcion) {
            case "nombre": {
                    echo "Nuevo nombre: ";
                    $responsable->setNombre(trim(fgets(STDIN)));
                    break;
                }
            case "apellido": {
                    echo "Nuevo apellido: ";
                    $responsable->setNombre(trim(fgets(STDIN)));
                    break;
                }
            case "numEmpleado": {
                    echo "Nuevo número de empleado: ";
                    $responsable->setNroEmpleado(trim(fgets(STDIN)));
                    break;
                }
            case "numLicencia": {
                    echo "Nuevo número de licencia: ";
                    $responsable->setNroLicencia(trim(fgets(STDIN)));
                    break;
                }
        }
        echo "Cambio realizado con éxito.";
    }

    /**
     * Modifica los datos del viaje
     */
    public function modificarDatosViaje($dato)
    {
        switch ($dato) {
            case "codigo": {
                    echo "Nuevo código de viaje: ";
                    $this->setCodigoViaje(trim(trim(fgets(STDIN))));
                    break;
                }
            case "destino": {
                    echo "Nuevo destino: ";
                    $this->setDestino(trim(fgets(STDIN)));
                    break;
                }
            case "cantMaxima": {
                    echo "Nueva cantidad máxima: ";
                    $this->setMaxPasajeros(trim(fgets(STDIN)));
                    break;
                }
        }
    }
    /**
     * Retorna verdadero si la cantidad de pasajeros del viaje es 
     * menor a la cantidad máxima de pasajeros y falso caso contrario
     * @return boolean
     */
    public function hayPasajesDisponibles()
    {
        return (count($this->getDatosPasajeros()) < $this->getMaxPasajeros());
    }

    /**
     * Incorpora pasajero a la colección solo si hay asientos disponibles
     */
    public function venderPasaje($objPasajero)
    {
        $costoFinal = -1;
        if ($this->hayPasajesDisponibles()) {
            $this->agregarPasajero($objPasajero);
            $costoFinal = $this->getCostoViaje() + ($this->getCostoViaje() / $objPasajero->darPorcentajeIncremento());
            $this->setSumaCostos($this->getSumaCostos() + $costoFinal);
        }
        return $costoFinal;
    }
    /**
     * Recorre la colección de pasajeros y obtiene el monto total
     * de pasajes vendidos
     * @return float
     */
    public function montoTotalPasajes()
    {
        $acumulador = 0;
        $listado = $this->getDatosPasajeros();
        foreach ($listado as $pasajero) {
            $acumulador += $this->getCostoViaje() + ($this->getCostoViaje() / $pasajero->darPorcentajeIncremento());
        }
        return $acumulador;
    }

    public function __toString()
    {
        $n = count($this->getDatosPasajeros());
        return "\n>> DATOS VIAJE\nCódigo del viaje: " . $this->getCodigoViaje() . "\nDestino: " .
            $this->getDestino() . "\nMonto total de pasajes vendidos: $" . $this->montoTotalPasajes() . "\nCantidad máxima de pasajeros: " . $this->getMaxPasajeros() . "\nPasajeros a bordo: " . $n .
            "\n" . $this->mostrarPasajeros() .
            "\n>> RESPONSABLE DEL VIAJE\n" . $this->getResponsable() . "\n";
    }
}
