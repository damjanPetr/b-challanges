

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
            $this  = new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME, self::USERNAME, self::PASSWORD);
        } catch (\Throwable $e) {
            var_dump($e);
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
    public function query($sql)
    {

        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>