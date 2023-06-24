<?php

session_start();
if (isset($_SESSION['authError'])) {
    echo $_SESSION['authError'];
    unset($_SESSION['authError']);
}
require __DIR__ . '/Vehicles/Vehicles.php';

use Vehicles\Vehicles as Vehicles;

$vehicle = Vehicles::getVehicleType();
echo "<pre>";

var_dump($vehicle);
echo "</pre>";
if (isset($_SESSION['username'])) : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="./styles.css">
    </head>

    <body>
        <div class="dashboardpage">
            <h1>Vehircle Registration</h1>
            <form action="./dashboard.php" method="post">
                <div class="">
                    <label for="vehicle-model">Vehicle Model:</label>
                    <select id="vehicle-model" name="vehicle-model">

                    </select>
                </div>

                <div class="">
                    <label for="vehecle-type">Vehicle Type:</label>
                    <select id="vehecle-type" name="vehicle-type">
                        <?php foreach ($vehicle as $item => $value)
                            echo "<option value='$value'>$value</option>";
                        ?>
                    </select>

                </div>
                <div class="">
                    <label for="vehicle-chas-number">Vehicle Chassis Number:</label>
                    <input type="text" id="vehicle-chas-number" name="vehicle-chas-number">
                </div>
                <div class="">
                    <label for="vehicle-prod-year">Vehicle Production Year:</label>
                    <input type="date" id="vehicle-prod-year" name="vehicle-prod-year">
                </div>
                <div class="">
                    <label for="vehicle-reg-number">Vehicle Registration Number:</label>
                    <input type="text" id="vehicle-reg-number" name="vehicle-reg-number">
                </div>
                <div class="">
                    <label for="fuel-type">Fuel Type:</label>
                    <select id="fuel-type" name="fuel-type"></select>
                </div>
                <div class="">
                    <label for="register-date">Registered to Date:</label>
                    <input type="text" id="register-date" name="register-date">
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>

    </html>
<?php endif; ?>