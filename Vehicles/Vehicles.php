<?php

namespace Vehicles;

require_once __DIR__ . '/../Database/Connection.php';

use Database\Connection as Connection;

class Vehicles
{
    public function __construct(
        protected string $model,
        protected string $vehicleType,
        protected string $vehicleChasisNumber,
        protected string $vehicleProductionYear,
        protected string $vehicleRegistrationNumber,
        protected string $fuelType,
        protected string $registerDate,
    ) {
    }

    static function getAllVehicles(): array
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM registrations;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function createNewVehicle(): bool
    {
        try {
            $conn = new Connection();
            $pdo = $conn->getConnection();
            $sql = "INSERT INTO registrations (model, vehicle_type, vehicle_chasis_number, vehicle_production_year,vehicle_registration_number, fuel_type, register_date) VALUES (:model, :vehicle_type, :vehicle_chasis_number, :vehicle_production_year,:vehicle_registration_number, :fuel_type, :register_date);";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['model' => $this->model, 'vehicle_type' => $this->vehicleType, 'vehicle_chasis_number' => $this->vehicleChasisNumber, 'vehicle_production_year' => $this->vehicleProductionYear, 'vehicle_registration_number' => $this->vehicleRegistrationNumber, 'fuel_type' => $this->fuelType, 'register_date' => $this->registerDate]);
            if ($stmt->rowCount() > 0) {

                return true;
            } else {
                return false;
            }
        } catch (\Throwable $e) {
            header("Location:dashboard.php?chassisError=$this->vehicleChasisNumber'is already registered!'");
        }
    }
    static function getModels(): array
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM vehicle_model;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
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
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function createNewVehicleModel(string $args): bool
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "INSERT INTO vehicle_model (model) VALUES (:model);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['model' => $args]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    static function deleteVehicle(string $args): bool
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "DELETE FROM registrations WHERE id = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $args]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    static function editVehicle(string $id): bool
    {

        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "UPDATE registrations SET model = :model, vehicle_type = :vehicle_type, vehicle_chasis_number = :vehicle_chasis_number, vehicle_production_year = :vehicle_production_year, vehicle_registration_number = :vehicle_registration_number, fuel_type = :fuel_type, register_date = :register_date WHERE id = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'model' => $_POST['model'], 'vehicle_type' => $_POST['vehicle_type'], 'vehicle_chasis_number' => $_POST['vehicle_chasis_number'], 'vehicle_production_year' => $_POST['vehicle_production_year'], 'vehicle_registration_number' => $_POST['vehicle_registration_number'], 'fuel_type' => $_POST['fuel_type'], 'register_date' => $_POST['register_date']]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    static function getVehicleById(string $id): array
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM registrations WHERE id = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
    static function insertNewModel(string $arg)
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $checkIfExistModelSql = "SELECT * FROM vehicle_model WHERE model = :model;";
        $findStmt = $pdo->prepare($checkIfExistModelSql);
        $findStmt->execute(['model' => $arg]);
        $model = $findStmt->fetchAll(\PDO::FETCH_ASSOC);
        if ($model == null) {
            $sql = "INSERT INTO vehicle_model (model) VALUES (:model);";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['model' => $arg]);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                echo "model insert error";
                return false;
            }
        } else {
            return false;
        }
    }
    static function updateVehicle($arg)
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "UPDATE registrations SET model = :model, vehicle_type = :vehicle_type, vehicle_chasis_number = :vehicle_chasis_number, vehicle_production_year = :vehicle_production_year, vehicle_registration_number = :vehicle_registration_number, fuel_type = :fuel_type, register_date = :register_date WHERE id = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $arg['id'], 'model' => $arg['vehicle-model'], 'vehicle_type' => $arg['vehicle-type'], 'vehicle_chasis_number' => $arg['vehicle-chas-number'], 'vehicle_production_year' => $arg['vehicle-prod-year'], 'vehicle_registration_number' => $arg['vehicle-reg-number'], 'fuel_type' => $arg['fuel-type'], 'register_date' => $arg['register-date']]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    static function changeRegTo($id, $regDate)
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "UPDATE registrations SET register_date = :register_date WHERE id = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'register_date' => $regDate]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    static function search($query)
    {

        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM registrations WHERE vehicle_registration_number LIKE :query OR vehicle_chasis_number LIKE :query OR model LIKE :query;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['query' => '%' . $query . '%']);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
    static function getVehicleByRegNumber($regNumber)
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM registrations WHERE vehicle_registration_number = :vehicle_registration_number;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['vehicle_registration_number' => $regNumber]);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
}
