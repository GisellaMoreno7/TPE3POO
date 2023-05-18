<?php
include_once 'Pasajero.php';

class PasajeroVIP extends Pasajero
{
    //Atributos
    private $nroViajeroFrecuente;
    private $cantMillasPasajero;

    //Método constructor
    public function __construct($elNombre, $elApellido, $elDni, $tel, $numeroAsiento, $numeroTicket, $viajeroFrecuente, $millasPasajero)
    {
        parent::__construct($elNombre, $elApellido, $elDni, $tel, $numeroAsiento, $numeroTicket);
        $this->nroViajeroFrecuente = $viajeroFrecuente;
        $this->cantMillasPasajero = $millasPasajero;
    }

    //Getters
    public function getNroViajeroFrecuente()
    {
        return $this->nroViajeroFrecuente;
    }
    public function getCantMillasPasajero()
    {
        return $this->cantMillasPasajero;
    }

    //Setters
    public function setNroViajeroFrecuente($dato)
    {
        $this->nroViajeroFrecuente = $dato;
    }
    public function setCantMillasPasajero($dato)
    {
        $this->cantMillasPasajero = $dato;
    }

    //Métodos de la clase
    /**
     * Retorna porcentaje de incremento
     * @return int
     */
    public function darPorcentajeIncremento()
    {
        $porcentaje = 35;
        if ($this->getCantMillasPasajero() > 300) {
            $porcentaje = 30;
        }
        return $porcentaje;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "\nNúmero de viajero frecuente: " . $this->getNroViajeroFrecuente() .
            "\nCantidad de millas de pasajero: " . $this->getCantMillasPasajero();
        return $cadena;
    }
}
// $aaaaa = new PasajeroVIP("pepe", 20, 23, 44, 2333);
// echo $aaaaa;
