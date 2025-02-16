<?php
namespace Tracker;

use PDO;

class Database {

    public $connection;

    public function __construct($config, $username = 'root', $password = 'passw0rd')
    {
        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])   
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }

}