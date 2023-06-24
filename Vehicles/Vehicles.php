<?php

namespace Vehicles;





require __DIR__ . '/../Database/Connection.php';




use Database\Connection as Connection;

class Vehicles
{
    public function __construct($args)
    {
    }

    static function getModels(): array
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM models;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    static function getFuelType(): array
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM fuel_type;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
    static function getVehicleType(): array
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM vehicle_type;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll((\PDO::FETCH_ASSOC));
        return $results;
    }
}
