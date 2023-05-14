<?php
require __DIR__ . '/functions.php';
// dd($_SERVER);
if (!empty($_GET)) {

    $username = $_GET['username'];
} else {
    echo "error";
};
?>
<?php

$heading = 'User Dashboard';
require __DIR__ . '/views/partials/head.php'; ?>

<body>
    <nav>
        <h1>Welcome User : <span> <?= $username ?></span></h1>

    </nav>

</body>

</html>