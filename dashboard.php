<?php
require_once __DIR__ . '/Vehicles/Vehicles.php';

use Vehicles\Vehicles as Vehicles;

session_start();
if (isset($_SESSION['authError'])) {
    echo $_SESSION['authError'];
    unset($_SESSION['authError']);
} {
};

if (!empty($_POST)) {
    $vehicle = new Vehicles(...array_values($_POST));
    $vehicle->createNewVehicle();
    header("Location:dashboard.php#table-view");
}
$vehicle_type = Vehicles::getVehicleType();
$vehicle_model = Vehicles::getModels();
$vehicle_fuel_type = Vehicles::getFuelType();

// for rending of the table
$vehicleResult = Vehicles::getAllVehicles();

// for rendeing seach results
$vehicleSearchResult = $_SESSION['search'] ?? null;

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
        <?php include_once __DIR__ . '/partials/Header.php'; ?>
        <div class="dashboardpage">
            <div class="forms">
                <form action="./createNewModel.php" method="post" class="model-form">
                    <label for="new-model">Create New Vehicle Model</label>
                    <div>
                        <input type="text" name="new-model" id="new-model" minlength="3">
                        <input type="submit" value="Create">
                    </div>
                    <?php
                    if (isset($_GET['modelError'])) {
                        echo "<p>Model already exists!</p>";
                    }
                    ?>
                </form>
                <form action="./dashboard.php" method="post" class="reg-form" id="reg-form">
                    <h2>Vehicle Registration</h2>
                    <div class="">
                        <label for="vehicle-model">Vehicle Model:</label>
                        <select id="vehicle-model" name="vehicle-model">
                            <?php
                            foreach ($vehicle_model as $item => $value) {
                                echo "<option value='{$value['model']}'>{$value['model']}</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="">
                        <label for="vehecle-type">Vehicle Type:</label>
                        <select id="vehecle-type" name="vehicle-type">
                            <?php foreach ($vehicle_type as $item => $value)
                                echo "<option value='{$value['type']}'>{$value['type']}</option>";
                            ?>
                        </select>
                    </div>
                    <div class="">
                        <label for="vehicle-chas-number">Vehicle Chassis Number:</label>
                        <input placeholder="e.g: PJ12345U123456P" required type="text" id="vehicle-chas-number" name="vehicle-chas-number">

                    </div>
                    <?php
                    if (isset($_GET['chassisError'])) {
                        echo "<p class='chassisError'>This number has already been registered</p>";
                    }
                    ?>
                    <div class="">
                        <label for="vehicle-prod-year">Vehicle Production Year:</label>
                        <input required type="date" id="vehicle-prod-year" name="vehicle-prod-year">
                    </div>
                    <div class="">
                        <label for="vehicle-reg-number">Vehicle Registration Number:</label>
                        <input placeholder="e.g: TN 75 AA 7106" required type="text" id="vehicle-reg-number" name="vehicle-reg-number">
                    </div>
                    <div class="">
                        <label for="fuel-type">Fuel Type:</label>
                        <select id="fuel-type" name="fuel-type">
                            <?php foreach ($vehicle_fuel_type as $item => $value)
                                echo "<option value='{$value['type']}'>{$value['type']}</option>";
                            ?>
                        </select>
                    </div>
                    <div class="">
                        <label for="register-date">Registered to Date:</label>
                        <input required type="date" id="register-date" name="register-date">
                    </div>
                    <input type="submit" value="Submit">
                </form>

            </div>

        </div>
        <div class="table-view" id="table-view">
            <div class="search">
                <?php if (!empty($_GET['noresults'])) :
                ?>
                    <p>No results were found</p>
                <?php endif; ?>
                <form action="search.php" method="post">
                    <input type="text" name="search" id="search">
                    <input type="submit" value="Search">
                </form>

            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vehicle model</th>
                        <th>Vehicle type</th>
                        <th>Vehicle Chassis Number</th>
                        <th>Vehicle production Year</th>
                        <th>Registration Number</th>
                        <th>Fuel Type</th>
                        <th>Registered To</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($_GET['noresults'])) :
                    ?>
                        <?php
                        $tableid = 1;
                        foreach (($vehicleSearchResult ?? $vehicleResult) as $key => $item) : ?>
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
                                <td><?= $tableid++ ?></td>
                                <td><?= $item['model'] ?></td>
                                <td><?= $item['vehicle_type'] ?></td>
                                <td><?= $item['vehicle_chasis_number'] ?></td>
                                <td><?= $item['vehicle_production_year'] ?></td>
                                <td><?= $item['vehicle_registration_number'] ?></td>
                                <td><?= $item['fuel_type'] ?></td>
                                <td><?= $item['register_date'] ?></td>
                                <td class="crudBtns">
                                    <form action="./deleteReg.php" method="post">
                                        <input type="text" name="reg-id" id="reg-id" value="<?= $item['id'] ?>" hidden>
                                        <input type="submit" value="Delete">
                                    </form>
                                    <form action="./editReg.php" method="post">
                                        <input type="text" name="reg-id" id="reg-id" value="<?= $item['id'] ?>" hidden>
                                        <input type="submit" value="Edit">
                                    </form>
                                    <?php
                                    if ($diff <= 30 && $diff >= 0) :
                                    ?>
                                        <form action="extendReg.php" method="post">
                                            <input type="text" name="reg-id" id="reg-id" value="<?= $item['id'] ?>" hidden>
                                            <input type="text" name="regDate" id="reg-id" value="<?= $item['register_date'] ?>" hidden>
                                            <input type="submit" value="Expand">
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>
            <?php endif; ?>



            </table>
        </div>
    </body>

    </html>
<?php endif; ?>