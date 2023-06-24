<?php

namespace Database;

class Connection
{

    const HOST = 'localhost:3307';
    const DB_NAME = 'challenge17';
    const USERNAME = 'root';
    const PASSWORD = '';


    protected $connection;
    public function __construct()
    {
        try {
            $this->connection  = new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME, self::USERNAME, self::PASSWORD);
        } catch (\PDOException $e) {

            echo "<pre>";
            var_dump($e);
            echo "</pre>";
        }
    }
    public function getConnection()
    {
        return $this->connection;
    }


    public function __destruct()
    {
        $this->connection = null;
    }
    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}
