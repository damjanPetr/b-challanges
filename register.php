<?php

$heading = 'Register Page';
require __DIR__ . '/views/partials/head.php';
?>


<body>
    <main>


        <div class="header">
            <h1>Sign Up Form</h1>
        </div>
        <form action="./registeredUser.php" method="post">
            <div class="wrapper-input">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="wrapper-input">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required />
            </div>
            <input type="submit" value="Submit">
        </form>

    </main>
</body>

</html>