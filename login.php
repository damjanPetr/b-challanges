<?php
require_once __DIR__ . '/validation.php';
require_once __DIR__ . '/functions.php';




$data = $_POST;
if (!empty($data)) {
    ['username' => $username, 'password' => $password] = $data;

    if (checkSavedUsers($username, $password) ===  true) {
        echo "Thank you for logging in!!!";
        header("Location:registeredUserDashboard.php?username=$username");
    } else {
        $auth = 'Wrong username/password combination';
        header("Location:login.php?errorMSG=$auth");
    }
}



$heading = 'Login Page';

require __DIR__ . '/views/partials/head.php'; ?>


<body>

    <main>
        <div class="header">
            <h1>Login Form</h1>

        </div>
        <form action="/login.php" method="POST">
            <div class="wrapper-input">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" />
            </div>

            <div class="wrapper-input">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" />
            </div>
            <input type="submit" value="Submit">
        </form>

    </main>
    <?php

    if (!empty($_GET['errorMSG'])) {
        echo "<div class='error'><p class='error'>$_GET[errorMSG]</p></div>";
    };
    ?>
</body>

</html>