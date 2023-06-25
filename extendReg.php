<?php

$id = $_POST['reg-id'] ?? null;
$regDate = $_POST['regDate'] ?? null;
$activate = $_POST['activate'] ?? null;

require_once __DIR__ . '/Vehicles/Vehicles.php';

use Vehicles\Vehicles as Vehicles;

if ($activate) {
    try {
        $result = Vehicles::changeRegTo($id, $activate);
        if ($result) {
            header('Location: ./dashboard.php');
        } else {
            header('Location: ./dashboard.php?error=Vehicle not edited!');
        }
    } catch (\Throwable $e) {
        var_dump($e->getmessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Edit registration Date</title>
</head>

<body>
    <form action="extendReg.php" method="POST">
        <label for="register-date">Registration Date:</label>
        <input type="text" name="reg-id" id="register-date" value="<?= $id ?>" hidden>
        <input type="date" name="activate" id="register-date" value="<?= $regDate ?>">
        <input type="submit" value="Edit">
    </form>
</body>

</html>