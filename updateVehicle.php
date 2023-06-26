<?php


require_once __DIR__ . '/Vehicles/Vehicles.php';

var_dump($_POST);
// die();

use Vehicles\Vehicles as Vehicles;

$result = Vehicles::updateVehicle($_POST);
if (
    $result
) {
    header('Location: ./dashboard.php#table-view');
} else {
    echo "ERROR";
}
