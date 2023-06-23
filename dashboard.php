<?php


if (isset($_SESSION['authError'])) {
    echo $_SESSION['authError'];
    unset($_SESSION['authError']);
}
if (isset($_SESSION['username'])) : ?>{
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Vehircle Registration</h1>
    <form action="post">
        <div class="">
            <label for="vehicle-model">Vehecle Model:</label>
            <select id="vehicle-model" name="vehicle-model"></select>
        </div>

        <div class="">
            <label for="vehecle-type">Vehicle Type:</label>
            <select id="vehecle-type" name="vehecle-type"></select>
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
        <div class=""><input type="submit" value="Submit"></div>
    </form>
</body>

</html>
}
<?php endif;

?>