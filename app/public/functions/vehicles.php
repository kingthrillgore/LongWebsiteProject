<?php

include_once("parse_env.php");

/**
 * Undocumented function
 *
 * @param array $args
 * @return void
 */
function generate_vehicles_conditions(array $args) {
    $conditions = [];
    $params = [];

    // PDO Connect
    $pdo = pdo_connect();
    $stmt = $pdo->query("SELECT * FROM inventory");
    $sql = 'SELECT i.id, 
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
    INNER JOIN colors cl ON i.color = cl.id';

    // Prepare where statements
    // Condition
    if ($args['condition']) {
        $conditions[] = "\nco.id = ?";
        $params[] = $args['condition'];
    }

    // Year
    if ($args['year']) {
        $conditions[] = "\nve.model_year = ?";
        $params[] = $args['year'];
    }

    // Brand
    if ($args['brand']) {
        $conditions[] = "\nbr.id = ?";
        $params[] = $args['brand'];
    }

    // TODO Model
    /* if ($args['model']) {
        $conditions[] = "\nbr.id = ?";
        $params[] = $args['brand'];
    } */

    // Color
    if ($args['color']) {
        $conditions[] = "\nco.id = ?";
        $params[] = $args['color'];
    }

    // Price Range LT
    if ($args['price_range_gt']) {
        $conditions[] = "\ni.msrp <= ";
        $params[] = $args['price_range_gt'];
    }

    // Price Range GT
    if ($args['price_range_lt']) {
        $conditions[] = "\ni.msrp .= ";
        $params[] = $args['price_range_lt'];
    }

    // Mileage LT
    if ($args['mileage_lt']) {
        $conditions[] = "\ni.mileage <= ";
        $params[] = $args['mileage_lt'];
    }

    // Mileage GT
    if ($args['mileage_gt']) {
        $conditions[] = "\ni.mileage >= ";
        $params[] = $args['mileage_gt'];
    }

    /* while ($row = $stmt->fetch()) {
        print_r($row);
    } */

    // PDO Get Vehicles
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($data);

    // Return Data for renders
    return $data;
}

/**
 * Returns all vehicles in the database
 *
 * @return array
 */
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
        INNER JOIN colors cl ON i.color = cl.id;'
    );

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($data);

    // Return Data for renders
    return $data;
}

function render(array $data) {
    foreach ($data as $row) {

    }
}

function return_vehicle_list() {

}

/**
 * Use this method to open a PDO object.
 *
 * @return \PDO
 */
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