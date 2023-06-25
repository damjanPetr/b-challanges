<?php


require_once __DIR__ . '/Vehicles/Vehicles.php';

// var_dump(array_values($_POST));

use Vehicles\Vehicles as Vehicles;
// 
var_dump($_POST['vehicle-model']);
$result = Vehicles::updateVehicle($_POST);
if (
    $result
) {
    header('Location: ./dashboard.php');
} else {
    echo "No id provided";
}
