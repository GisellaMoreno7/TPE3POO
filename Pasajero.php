<?php

class Pasajero
{
    //Atributos
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;
    private $nroAsiento;
    private $nroTicket;

    //Método constructor
    public function __construct($elNombre, $elApellido, $elDni, $tel, $numeroAsiento, $numeroTicket)
    {
        $this->nombre = $elNombre;
        $this->apellido = $elApellido;
        $this->dni = $elDni;
        $this->telefono = $tel;
        $this->nroAsiento = $numeroAsiento;
        $this->nroTicket = $numeroTicket;
    }

    //Getters
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getNroAsiento()
    {
        return $this->nroAsiento;
    }
    public function getNroTicket()
    {
        return $this->nroTicket;
    }

    //Setters
    public function setNombre($dato)
    {
        $this->nombre = $dato;
    }
    public function setApellido($dato)
    {
        $this->apellido = $dato;
    }
    public function setDni($dato)
    {
        $this->dni = $dato;
    }
    public function setTelefono($dato)
    {
        $this->telefono = $dato;
    }
    public function setNroAsiento($dato)
    {
        $this->nroAsiento = $dato;
    }
    public function setNroTicket($dato)
    {
        $this->nroTicket = $dato;
    }

    //Métodos de la clase
    /**
     * Retorna porcentaje de incremento
     * @return int
     */
    public function darPorcentajeIncremento()
    {
        return 10;
    }

    public function __toString()
    {
        return "\nNombre del pasajero: " . $this->getNombre() . " " . $this->getApellido() .
            "\nNúmero de documento: " . $this->getDni() . "\nTeléfono: " . $this->getTelefono() .
            "\nNúmero de asiento: " . $this->getNroAsiento() . "\nNúmero de ticket: " . $this->getNroTicket() . "\n";
    }
}
