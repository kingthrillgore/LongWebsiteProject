<?php

include_once( dirname(__FILE__) . "/parse_env.php");

class DatabaseHandler {
    // Fields
    private string $database_host;
    private string $database_name;
    private string $database_user;
    private string $database_password;
    private string $database_port;
    private string $database_charset;

    public function __construct() {
        $envLines = [];
        $fh = fopen(dirname(__FILE__) . "/../../.env", "r");
        print_r($fh);
        while ($line = fgets($fh)) {
            $envLines[] = $line;
        }
        fclose($fh);

        print_r("Test");
        print_r($envLines);

        $this->database_host = 'host.docker.internal';
        $this->database_name = 'project';
        $this->database_user = "project";
        $this->database_password = "secret";
        $this->database_port = "3306";
        $this->database_charset = 'utf8mb4';
    }

    /**
     * Use this method to open a PDO object.
     *
     * @return \PDO
     */
    public function pdo_connect() {
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