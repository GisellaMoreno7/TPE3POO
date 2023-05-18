<?php

include_once 'Viaje.php';
include_once 'PasajeroVIP.php';
include_once 'PasajeroEspecial.php';

/**
 * Imprime menú de opciones, retorna opción elegida
 * @return int
 */
function menuOpciones()
{
    echo "\n---------------------------\n";
    echo "1) Mostrar datos completos del viaje\n2) Mostrar un pasajero\n3) Eliminar un pasajero";
    echo "\n4) Vender pasaje\n5) Modificar datos de un pasajero\n6) Modificar datos del responsable";
    echo "\n7) Modificar datos del viaje\n8) Salir";
    echo "\n---------------------------\n";
    echo "Seleccione una opción: ";
    $rta = trim(fgets(STDIN));
    return $rta;
}

//PRECARGA DE DATOS
$responsable = new ResponsableV(07, 1346, "Pepe", "Manzano");
$pasajeros = [];
$pasajeros[0] = new Pasajero("Juan", "Pérez", 43545, 155235535, 0, 7);
$pasajeros[1] = new Pasajero("Marta", "Serralima", 73455, 155346634, 2, 3);
$datosViaje = new Viaje("SdLg-777", "Senillosa", 25000, 4, $pasajeros, $responsable);

//PROGRAMA PRINCIPAL
echo "\nPrograma iniciado\n";
$opcion = menuOpciones();
while ($opcion != 8) {
    switch ($opcion) {
        case 1: {
                echo $datosViaje;
                break;
            }
        case 2: {
                echo "Ingrese DNI del pasajero: ";
                $dni = trim(fgets(STDIN));
                $pasajero = $datosViaje->buscarPasajero($dni);
                if ($pasajero == null) {
                    echo "No se ha encontrado al pasajero. ";
                } else {
                    echo $pasajero;
                }
                break;
            }
        case 3: {
                echo "Ingrese DNI del pasajero a borrar: ";
                $dni = trim(fgets(STDIN));
                if ($datosViaje->borrarPasajero($dni)) {
                    echo "Pasajero eliminado. ";
                } else {
                    echo "No se ha encontrado al pasajero. ";
                }
                break;
            }
        case 4: {
                echo "Ingrese nombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Número de DNI: ";
                $dni = trim(fgets(STDIN));
                if ($datosViaje->buscarPasajero($dni) == null) {
                    echo "Número de teléfono: ";
                    $telefono = trim(fgets(STDIN));
                    echo "Número de asiento: ";
                    $numAsiento = trim(fgets(STDIN));
                    echo "Número de ticket: ";
                    $numTicket = trim(fgets(STDIN));
                    echo "1) Pasajero normal\n2) Pasajero VIP\n3) Pasajero con necesidades especiales";
                    echo "\nSeleccione una opción: ";
                    $rta = trim(fgets(STDIN));
                    switch ($rta) {
                        case 1:
                            $pasajero = new Pasajero($nombre, $apellido, $dni, $telefono, $numAsiento, $numTicket);
                            break;
                        case 2:
                            echo "Número de pasajero frecuente: ";
                            $numPasajero = trim(fgets(STDIN));
                            echo "Cantidad de millas por pasajero: ";
                            $cantMillas = trim(fgets(STDIN));
                            $pasajero = new PasajeroVIP($nombre, $apellido, $dni, $telefono, $numAsiento, $numTicket, $numPasajero, $cantMillas);
                            break;
                        case 3:
                            $sillaDeRuedas = false;
                            $asistenciaEmbarque = false;
                            $comidasEspeciales = false;
                            echo "¿Ocupa silla de ruedas? (s/n): ";
                            $rta = trim(fgets(STDIN));
                            if ($rta == "s") {
                                $sillaDeRuedas = true;
                            }
                            echo "¿Necesita asistencia de embarque? (s/n): ";
                            $rta = trim(fgets(STDIN));
                            if ($rta == "s") {
                                $asistenciaEmbarque = true;
                            }
                            echo "¿Necesita comidas especiales? (s/n): ";
                            $rta = trim(fgets(STDIN));
                            if ($rta == "s") {
                                $comidasEspeciales = true;
                            }
                            $pasajero = new PasajeroEspecial($nombre, $apellido, $dni, $telefono, $numAsiento, $numTicket, $sillaDeRuedas, $asistenciaEmbarque, $comidasEspeciales);
                    }
                    echo "Se agregó el pasajero. ";
                } else {
                    echo "No se agregó el pasajero, DNI existente. ";
                }
                break;
            }
        case 5: {
                echo "Ingrese DNI del pasajero: ";
                $dni = trim(fgets(STDIN));
                $pasajero = $datosViaje->buscarPasajero($dni);
                if ($pasajero != null) {
                    echo "Dato a cambiar (nombre, apellido, dni, tel): ";
                    $opcion = trim(fgets(STDIN));
                    $datosViaje->modificarDatosPasajero($pasajero, $opcion);
                    echo "Cambio realizado.\n";
                } else {
                    echo "No se ha encontrado al pasajero.\n";
                }
                break;
            }
        case 6: {
                echo "Tipo de dato a modificar (nombre, apellido, numEmpleado, numLicencia): ";
                $opcion = trim(fgets(STDIN));
                $datosViaje->modificarDatosResponsable($opcion);
                break;
            }
        case 7: {
                echo "Tipo de dato que desea cambiar (codigo, destino, cantMaxima): ";
                $dato = trim(fgets(STDIN));
                $datosViaje->modificarDatosViaje($dato);
                echo "Cambio realizado.\n";
                break;
            }
    }
    $opcion = menuOpciones();
}
echo "Ha salido del menú de opciones.";
