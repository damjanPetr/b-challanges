<?php

$id = $_POST['reg-id'] ?? null;
$regDate = $_POST['regDate'] ?? null;
$newDate = $_POST['activate'] ?? null;
$againID = $_POST['againID'] ?? null;
require_once __DIR__ . '/Vehicles/Vehicles.php';


use Vehicles\Vehicles as Vehicles;

var_dump($_POST);
if ($newDate) {
    var_dump($_POST);
    try {
        $result = Vehicles::changeRegTo($againID, $newDate);

        if ($result) {
            header('Location: ./dashboard.php#table-view');
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
    <div class="regEdit">
        <form action="extendReg.php" method="POST">
            <label for="register-date">Registration Date:</label>
            <input type="text" name="againID" id="register-date" value="<?= $id ?>" hidden>
            <input type="date" name="activate" id="register-date" value="<?= $regDate ?>">
            <input type="submit" value="Edit">
        </form>
    </div>
</body>

</html>