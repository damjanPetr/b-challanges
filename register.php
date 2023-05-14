<?php

$heading = 'Register Page';
require __DIR__ . '/views/partials/head.php';
require_once __DIR__ . '/validation.php';

?>


<body>
    <main>


        <div class="header">
            <h1>Sign Up Form</h1>
        </div>
        <form action="./registeredUser.php" method="post">
            <div class="wrapper-input">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" />
            </div>
            <div class="wrapper-input">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" />
            </div>
            <div class="wrapper-input">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" />
            </div>

            <input type="submit" value="Submit">
        </form>

    </main>
    <?php

    if (!empty($_GET['errorMSG'])) {
        echo "<div class='error'><p class='error'>$_GET[errorMSG]</p></div>";
    };

    if (!empty($_GET['errorMSGemail'])) {
        echo "<div class='error'><p class='error-email'>$_GET[errorMSGemail]</p></div>";
    }; ?>
</body>

</html>