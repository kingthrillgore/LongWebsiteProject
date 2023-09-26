<?php

include_once( dirname(__FILE__) . "/../helpers/parse_env.php");

class Vehicles {
    // Fields

    // Methods
    /**
     * Undocumented function
     *
     * @param array $args
     * @return array
     */
    public function generate_vehicles_conditions(array $args) {
        $conditions = [];
        $params = [];

        // PDO Connect
        $pdo = $this->pdo_connect();
        $stmt = $pdo->query("SELECT * FROM inventory");
        $sql = 'SELECT i.id, 
            i.stock_id,
            i.msrp,
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
    public function generate_all_vehicle_results() {
        // PDO Connect
        $pdo = $this->pdo_connect();

        // PDO Get Vehicles
        $stmt = $pdo->query('SELECT i.id, 
                i.stock_id,
                i.msrp,
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

        // Return Data for renders
        return $data;
    }

    /**
     * Undocumented function
     *
     * @param array|null $data
     * @return void
     */
    public function render(array $data) {
        foreach ($data as $record) {
            print_r($record);
            print '<div class="row">';
            print '<div class="interior">';
            print '<img src="' . $this->generate_image_url($record) . '" alt="Vehicle Image" />';
            print '<p>' . $record['brand_name'] . '</p>';
            print '<h3>'. $this->generate_full_vehicle_name($record).'</h3>';
            print '<a href="#">Video</a>';
            print $this->generate_details_rendered($record);
            print $this->generate_row_links_rendered();
            print '</div>';
            print '</div>';
        }


    }

    /**
     * Undocumented function
     *
     * @param array|null $args
     * @return void
     */
    public function generate_page(array $args = null) {
        if (!$args) {
            $results = self::generate_all_vehicle_results();
            return self::render($results);
        }

        $results = self::generate_vehicles_conditions($args);
        return self::render($results);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function return_vehicle_list() {

    }

    public function return_vehicle_features(int $id) {
        // PDO Connect
        $pdo = $this->pdo_connect();
        $stmt = $pdo->prepare('SELECT fe.feature
            FROM features fe
            INNER JOIN features_vehicles fev ON fev.feature_id = fe.id
            INNER JOIN vehicles ve ON ve.id = fev.vehicle_id
            WHERE ve.id = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    /**
     * Undocumented function
     *
     * @param array $record
     * @return void
     */
    private function generate_full_vehicle_name(array $record) {
        return $record['model_year'] . " " . $record['brand_name'] . " " . $record['vehicle_name'];
    }

    /**
     * Undocumented function
     *
     * @param array $record
     * @return void
     */
    private function generate_details_rendered(array $record) {
        $output = "";
        //$price = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

        $output .= "<dl>\n";
        $output .= "\t<dt>Condition:</dt>\n";
        $output .= "\t<dd>" . $record['condition'] . "</dd>\n";
        $output .= "\t<dt>Retail Price:</dt>\n";
        $output .= "\t<dd>$" . sprintf('%01.2f', $record['msrp']) . "</dd>\n";
        $output .= "\t<dt>Stock #:</dt>\n";
        $output .= "\t<dd>". $record['stock_id'] . "</dd>\n";
        $output .= "\t<dt>Mileage:</dt>";
        $output .= "\t<dd>". $record['mileage'] . "</dd>\n";
        $output .= "</dl>";
        
        return $output;
    }

    /**
     * Undocumented function
     *
     * @param array $record
     * @return void
     */
    private function generate_image_url(array $record) {
        return "static/images/vehicles/" . $record['photo_url'];
    }

    private function generate_row_links_rendered() {
        $output = "";

        $output .= "<div>\n";
        $output .= "\t<a href='#'>Calculate Payments</a>\n";
        $output .= "\t<a href='#'>Details</a>\n";
        $output .= "\t<a href='#'>Incentives</a>\n";
        $output .= "\t<a href='#'>Concierge</a>\n";
        $output .= "\t<a href='#'>Compare</a>\n";
        $output .= "\t<a href='#'>Get Pre-Approved Now</a>\n";
        $output .= "</div>";

        return $output;
    }

    /**
     * Use this method to open a PDO object.
     *
     * @return \PDO
     */
    private function pdo_connect() {
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
}