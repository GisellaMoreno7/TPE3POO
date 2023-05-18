<?php
include_once 'Pasajero.php';

class PasajeroEspecial extends Pasajero
{
    //Atributos
    private $sillaDeRuedas;
    private $asistenciaEmbarque;
    private $comidasEspeciales;

    //Método constructor
    public function __construct($elNombre, $elApellido, $elDni, $tel, $numeroAsiento, $numeroTicket, $sillaRuedas, $asistencia, $comidasEsp)
    {
        parent::__construct($elNombre, $elApellido, $elDni, $tel, $numeroAsiento, $numeroTicket);
        $this->sillaDeRuedas = $sillaRuedas;
        $this->asistenciaEmbarque = $asistencia;
        $this->comidasEspeciales = $comidasEsp;
    }

    //Getters
    public function getSillaDeRuedas()
    {
        return $this->sillaDeRuedas;
    }
    public function getAsistenciaEmbarque()
    {
        return $this->asistenciaEmbarque;
    }
    public function getComidasEspeciales()
    {
        return $this->comidasEspeciales;
    }

    //Setters
    public function setSillaDeRuedas($dato)
    {
        $this->sillaDeRuedas = $dato;
    }
    public function setAsistenciaEmbarque($dato)
    {
        $this->asistenciaEmbarque = $dato;
    }
    public function setComidasEspeciales($dato)
    {
        $this->comidasEspeciales = $dato;
    }

    //Métodos de la clase
    /**
     * Retorna porcentaje de incremento
     * @return int
     */
    public function darPorcentajeIncremento()
    {
        $porcentaje = 0;
        if ($this->getSillaDeRuedas() == true && $this->getAsistenciaEmbarque() == true && $this->getComidasEspeciales() == true) {
            $porcentaje = 30;
        } elseif ($this->getSillaDeRuedas() == true || $this->getAsistenciaEmbarque() == true || $this->getComidasEspeciales() == true) {
            $porcentaje = 15;
        }
        return $porcentaje;
    }

    /**
     * Transforma en string un valor booleano
     * @return string
     */
    public function convertirBoolean($bool)
    {
        $cadena = "No";
        if ($bool) {
            $cadena = "Sí";
        }
        return $cadena;
    }


    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "\nSilla de ruedas: " . $this->convertirBoolean($this->getSillaDeRuedas()) .
            "\nAsistencia de embarque: " . $this->convertirBoolean($this->getAsistenciaEmbarque()) .
            "\nComidas especiales: " . $this->convertirBoolean($this->getComidasEspeciales());
        return $cadena;
    }
}
