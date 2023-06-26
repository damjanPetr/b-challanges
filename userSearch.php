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
                        <th>Vehicle model</th>
                        <th>Vehicle type</th>
                        <th>Vehicle Chassis Number</th>
                        <th>Vehicle production Year</th>
                        <th>Registration Number</th>
                        <th>Fuel Type</th>
                        <th>Registered To</th>
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
            <div class="text">
                <h1 class="">No results found</h1>
                <a href="index.php">
                    <div class="back">
                        <p>Go Back</p><img src="./assets/page-previous.svg" alt="go-back-btn">
                    </div>
                </a>

            </div>
        <?php endif; ?>

    </div>
</body>

</html>