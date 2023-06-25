<?php
require_once './Users/Users.php';

use Users\Users as Users;

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if (isset($username) && isset($password)) {
    require_once './Users/Users.php';
    $user = new Users($username, $password);

    if ($user->login()) {
        header('Location: ./dashboard.php');
    } else {
        header('Location: ./login.php?error=1');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Login</title>
</head>

<body>
    <?php include_once __DIR__ . '/partials/Header.php'; ?>

    <div class="loginpage">
        <form action="./login.php" method="post">
            <div class="">

                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password">
            </div>
            <input type="submit" value="Login">
            <?php
            if (isset($_GET['error'])) {
                echo "<div class='errorUsername'><p>Wrong username or password</p></div>";
            };
            ?>
        </form>

    </div>
</body>



</html>