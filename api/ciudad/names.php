<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../models/Ciudad.php';

$objCiudad = new Ciudad();

$ciudades = $objCiudad->getCities();

if (!$ciudades) {
    http_response_code(404);
    echo json_encode(
        array("message" => "No hay registros")
    );
    die();
}

$arrayCiudades = [];

foreach ($ciudades as $ciudad) {
    $arrayCiudades[] = [
        "name" => $ciudad->getCiudad_nombre(),
        "pais" => $ciudad->getCiudad_pais(),
    ];
}

echo json_encode($arrayCiudades);

