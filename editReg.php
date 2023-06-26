<?php
require_once __DIR__ . '/Vehicles/Vehicles.php';

$id = $_POST['reg-id'] ?? null;

use Vehicles\Vehicles as Vehicles;

var_dump($_POST);
$vehicle_model = Vehicles::getModels();
$vehicle_type = Vehicles::getVehicleType();
$vehicle_fuel_type = Vehicles::getFuelType();

if (isset($_POST['vehicle-model'])) {
    $vehicle_model = $_POST['vehicle-model'];
}
?>
<?php

if ($id) : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles.css">
        <title>Edit Registration</title>
    </head>

    <body>
        <div class="thirdPage">
            <div class="edit">
                <form action="updateVehicle.php" method="post">
                    <?php
                    try {
                        $vehicles = Vehicles::getVehicleById($id);
                    } catch (\Throwable $e) {
                        var_dump($e->getMessage());
                    }
                    ?>

                    <?php foreach ($vehicles as $item => $value) :
                    ?>

                        <div class="">
                            <label for="vehicle-model">Vehicle Model:</label>
                            <select id="vehicle-model" name="vehicle-model">
                                <?php
                                foreach ($vehicle_model as $item => $valueModel) {
                                    if ($value['model'] === $valueModel['model']) {
                                        echo "<option value='{$value['model']}' selected>{$value['model']}</option>";
                                    } else {
                                        echo "<option value='{$va['model']}'>{$valueModel['model']}</option>";
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="">
                            <label for="vehecle-type">Vehicle Type:</label>
                            <select id="vehecle-type" name="vehicle-type">
                                <?php foreach ($vehicle_type as $item => $valueType)
                                    if ($value['vehicle_type'] == $valueType['type']) {
                                        echo "<option value='{$valueType['type']}' selected>{$valueType['type']}</option>";
                                    } else {
                                        echo "<option value='{$valueType['type']}'>{$valueType['type']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="">
                            <label for="vehicle-chas-number">Vehicle Chassis Number:</label>
                            <input type="text" id="vehicle-chas-number" name="vehicle-chas-number" value="<?= $value['vehicle_chasis_number'] ?>">

                        </div>
                        <?php
                        if (isset($_GET['chassisError'])) {
                            echo "<p class='chassisError'>This number has already been registered</p>";
                        }
                        ?>
                        <div class="">
                            <label for="vehicle-prod-year">Vehicle Production Year:</label>
                            <input type="date" id="vehicle-prod-year" name="vehicle-prod-year" value="<?= $value['vehicle_production_year'] ?>">
                        </div>
                        <div class="">
                            <label for="vehicle-reg-number">Vehicle Registration Number:</label>
                            <input type="text" id="vehicle-reg-number" name="vehicle-reg-number" value="<?= $value['vehicle_registration_number'] ?>">
                        </div>
                        <div class="">
                            <label for="fuel-type">Fuel Type:</label>
                            <select id="fuel-type" name="fuel-type">
                                <?php foreach ($vehicle_fuel_type as $item => $valueFuel)
                                    if ($value['fuel_type'] == $valueFuel['type']) {
                                        echo "<option value='{$valueFuel['type']}'selected >{$valueFuel['type']}</option> ";
                                    } else {
                                        echo "<option value='{$valueFuel['type']}'>{$valueFuel['type']}</option> ";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="">
                            <label for="register-date">Registered to Date:</label>
                            <input type="date" id="register-date" name="register-date" value="<?= $value['register_date'] ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                        <input type="submit" value="Submit">
                </form>
            <?php endforeach; ?>
            </div>
        </div>
    </body>

    </html>


<?php endif; ?>