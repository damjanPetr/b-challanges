<?php

$registrationNumber = $_POST['registration-number'] ?? null;

require_once __DIR__ . '/Vehicles/Vehicles.php';

use Vehicles\Vehicles as Vehicles;

$resultArray = Vehicles::getVehicleByRegNumber($registrationNumber);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Vehicle registration Numbers</title>
</head>

<?php include __DIR__ . '/partials/Header.php'; ?>

<body>
    <div class="userSearchPage">
        <?php
        if (!empty($resultArray)) : ?>
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Vehicle model</td>
                        <td>Vehicle type</td>
                        <td>Vehicle Chassis Number</td>
                        <td>Vehicle production Year</td>
                        <td>Registration Number</td>
                        <td>Fuel Type</td>
                        <td>Registered To</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($resultArray as $key => $item) : ?>
                        <tr class="<?php
                                    $date1 = new DateTime($item['register_date']);
                                    $now = new DateTime('now');
                                    $res = $now->format('m-d-Y');
                                    $diff = $date1->diff($now)->format("%r%a");
                                    if ($diff <= 30 && $diff >= 0) {
                                        echo "available";
                                    } elseif ($diff > -30) {
                                        echo "expired";
                                    }
                                    ?>">
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['model'] ?></td>
                            <td><?= $item['vehicle_type'] ?></td>
                            <td><?= $item['vehicle_chasis_number'] ?></td>
                            <td><?= $item['vehicle_production_year'] ?></td>
                            <td><?= $item['vehicle_registration_number'] ?></td>
                            <td><?= $item['fuel_type'] ?></td>
                            <td><?= $item['register_date'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <h1>No results found</h1>

        <?php endif; ?>

    </div>
</body>

</html>