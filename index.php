<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge 17</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <?php include_once __DIR__ . '/partials/Header.php'; ?>
    <div class="homepage">
        <div class="register">
            <h1 class="title">Vehicle Registration</h1>
            <h3 class="subtitle">Enter your vehicle registration number to check its validity</h3>
            <form action="userSearch.php" method="post">
                <input minlength="5" type="text" name="registration-number" id="reg_number" placeholder="Registration number">
                <input type="submit" value="Search" class="search_btn">
            </form>
        </div>
    </div>

</body>

</html>