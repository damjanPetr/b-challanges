<header>
    <div class="logo">

        <a href="index.php"><img src="./assets/cars-low-resolution-logo-color-on-transparent-background.svg" alt="logo"></a>

    </div>
    <nav>
        <?php
        $usrsegments = explode('/', $_SERVER['REQUEST_URI']);
        $lastURL = explode('?', end($usrsegments));
        // function getLastIgnoreGet(array $args): string
        // {
        //     if ($lastURL = explode('?', end($arg))) {
        //         return end($lastURL);
        //     } else {
        //         return $arg;
        //     }
        // };

        if ($lastURL[0] !== 'dashboard.php' && isset($_SESSION['username'])) {
            echo "<div class='login'><a href='./dashboard.php'>Dashboard</a></div>";
        }

        ?>
        <?php if (!isset($_SESSION['username'])) : ?>
            <div class="login"><a href="./login.php" tabindex="-1">Login</a></div>
        <?php else : ?>
            <div class="login"><a href="./logout.php">Logout</a></div>
        <?php
        endif; ?>
    </nav>
</header>