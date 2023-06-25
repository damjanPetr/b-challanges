<?php

require_once __DIR__ . '/Vehicles/Vehicles.php';
session_start();

use Vehicles\Vehicles as Vehicles;

$searchQuery = $_POST['search'] ?? null;


$result = Vehicles::search($searchQuery);
var_dump($result);


if ($result) {
    $_SESSION['search'] = $result;
    header('Location: ./dashboard.php#table-view');
} else {
    header('Location: ./dashboard.php?noresults=1#table-view');
}
