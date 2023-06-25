<header>
    <div class="logo">

        <a href="index.php"><img src="./assets/cars-low-resolution-logo-color-on-transparent-background.svg" alt="logo"></a>

    </div>
    <nav>
        <?php var_dump($_REQUEST); ?>
        <?php if (!isset($_SESSION['username'])) : ?>
            <div class="login"><a href="./login.php" tabindex="-1">Login</a></div>
        <?php else : ?>
            <div class="login"><a href="./dashboard.php">Dashboard</a></div>
            <div class="login"><a href="./logout.php">Logout</a></div>
        <?php
        endif; ?>
    </nav>
</header>