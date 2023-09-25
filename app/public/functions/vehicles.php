<?php

include_once("parse_env.php");

function generate_vehicles_markup() {
    // PDO Connect
    $pdo = pdo_connect();
    $stmt = $pdo->query("SELECT * FROM inventory");

    while ($row = $stmt->fetch()) {
        print_r($row);
    }

    // PDO Get Vehicles

    // Render Contents to HTML
}

function generate_all_vehicle_results() {
    // PDO Connect
    $pdo = pdo_connect();

    // PDO Get Vehicles
    $stmt = $pdo->query('SELECT i.id, 
            i.stock_id,
            i.msrp AS "price",
            i.mileage,
            i.photo_url,
            cl.name AS "color",
            ve.name AS "vehicle_name",
            ve.model_year,
            br.name AS "brand_name",
            co.condition AS "condition"
        FROM inventory i
        INNER JOIN vehicles ve ON i.vehicle = ve.id
        INNER JOIN conditions co ON i.condition = co.id
        INNER JOIN brands br ON ve.brand = br.id
        INNER JOIN colors cl ON i.color = cl.id'
    );

    while ($row = $stmt->fetch()) {
        print_r($row);
    }

    // Render Contents to HTML
}

function pdo_connect() {
    // TODO Switch over to use .env
    $host = 'host.docker.internal';
    $db   = 'project';
    $user = 'project';
    $pass = 'secret';
    $port = '3306';
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);
    return $pdo;
}