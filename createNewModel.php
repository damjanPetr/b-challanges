<?php
require_once __DIR__ . '/Vehicles/Vehicles.php';

use Vehicles\Vehicles as Vehicles;

if (isset($_POST['new-model'])) {
    $result = Vehicles::insertNewModel($_POST['new-model']);
    if ($result) {
        header("Location:dashboard.php");
    } else {
        header("Location:dashboard.php?modelError=Model already exists!");
    }
}
