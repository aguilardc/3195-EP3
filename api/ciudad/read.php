<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../../models/Ciudad.php';

$objCiudad = new Ciudad();

$ciudades = $objCiudad->read();

if (!$ciudades) {
    http_response_code(404);
    echo json_encode(
            array("message" => "No hay registros")
    );
}

$arrayCiudades = [];

foreach ($ciudades as $ciudad) {
    $arrayCiudades[] = [
        "id" => $ciudad->getId(),
        "name" => $ciudad->getCiudad_nombre(),
        "pais" => $ciudad->getCiudad_pais(),
        "clima" => $ciudad->getCiudad_estado_clima(),
        "temperatura" => $ciudad->getCiudad_temperatura() . "ºC",
        "humedad" => $ciudad->getCiudad_humedad(),
        "fecha" => date('d-M-Y', strtotime($ciudad->getCiudad_fecha())),

    ];
}

echo json_encode($arrayCiudades);

