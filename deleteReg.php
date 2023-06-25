<?php

require_once __DIR__ . '/Vehicles/Vehicles.php';
$id = $_POST['reg-id'] ?? null;



use Vehicles\Vehicles as Vehicles;


if ($id) {
    try {
        $vehicle = Vehicles::deleteVehicle($id);
        header('Location: ./dashboard.php');
    } catch (\Throwable $e) {
        var_dump($e->getMessage());
    }
} else {
    echo "No id provided";
}
