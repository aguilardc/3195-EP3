<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../models/Ciudad.php';

$city = $_GET['city'] ?? null;

if (!isset($city)) {
    http_response_code(400);
    echo json_encode(["message" => "No hay registros"]);
    die();
}

$objCiudad = new Ciudad();

$climas = $objCiudad->getWeather($city);

if (!$climas) {
    http_response_code(404);
    echo json_encode(["message" => "No hay climas"]);
    die();
}

$arrayCiudades = [];

/** @var CiudadDTO $clima */
foreach ($climas as $clima) {
    $arrayCiudades[] = [
        "id" => $clima->getId(),
        "clima" => $clima->getCiudad_estado_clima(),
        "temperatura" => $clima->getCiudad_temperatura(),
        "humedad" => $clima->getCiudad_humedad(),
        "fecha" => date('l | M j | H:i', strtotime($clima->getCiudad_fecha())),
    ];
}

echo json_encode($arrayCiudades);

