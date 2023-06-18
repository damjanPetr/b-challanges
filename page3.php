<?php

use Company\Company;

$id = $_GET['id'];
require_once './Company/company.php';

$row = Company::getCompany($id);

$coverImg = $row['coverImg'];
$mainPageTitle = $row['mainPageTitle'];
$subtitleOfPage = $row['subtitleOfPage'];
$about = $row['about'];
$telNumber = $row['telNumber'];
$Location = $row['Location'];
$servicesOrProducts = $row['servicesOrProducts'];
$imgUrl1 = $row['imgUrl1'];
$descService1 = $row['descService1'];
$imgUrl2 = $row['imgUrl2'];
$descService2 = $row['descService2'];
$imgUrl3 = $row['imgUrl3'];
$descService3 = $row['descService3'];
$linkedin = $row['linkedin'];
$facebook = $row['facebook'];
$twitter = $row['twitter'];
$instagram = $row['instagram'];
$result = $servicesOrProducts == 'services' ? 'Services' : 'Product';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://kit.fontawesome.com/233b2c4e84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css//styles.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#result"><?= $result ?></a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="img__wrapper" style="background-image: url(<?php echo $coverImg ?>);">
            <div id=" hero" class="hero" ">
            <div class=" hero__img">
                <!-- <img src=" <?php echo $coverImg ?>" alt=""> -->
            </div>
            <div class="hero__text">
                <h1><?php echo $mainPageTitle ?></h1>
                <h2><?php echo $subtitleOfPage ?></h2>
            </div>
            <div id="about" class="about">
                <h2>About Us</h2>
                <div class="content">
                    <p><?= $about ?></p>
                    <p class="location">Location : <?= $Location ?></p>
                    <p>Contact Number: <?= $telNumber ?></p>
                </div>
                <div class="tel">
                </div>
            </div>
        </div>

        <div class="services" id="result">
            <h2><?= $result ?></h2>
        </div>
        <div class="content">
            <div class="content1">
                <div class="content__img">
                    <img src="<?= $imgUrl1 ?>" alt="">
                    <div class="content__text">
                        <p><?= $result ?> <?= $descService1 ?></p>
                    </div>
                </div>
            </div>
            <div class="content2">
                <div class="content__img">
                    <img src="<?= $imgUrl2 ?>" alt="">
                    <div class="content__text">
                        <p><?= $result ?> <?= $descService2 ?></p>
                    </div>

                </div>
            </div>
            <div class="content3">
                <div class="content__img">
                    <img src="<?= $imgUrl3 ?>" alt="">
                    <div class="content__text">
                        <p><?= $result ?> <?= $descService3 ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact" id="contact">
            <div class="contact__form">
                <div class="cont">

                    <h2>Contact Us</h2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas amet distinctio autem ea nisi ducimus corrupti odio repudiandae neque? Labore qui et, praesentium quidem commodi tempora numquam soluta quo, sed laboriosam veniam doloremque eaque voluptatibus ipsam necessitatibus consectetur quisquam! Voluptatum explicabo, alias nesciunt, sit modi numquam nemo doloremque aspernatur porro excepturi mollitia veritatis, unde necessitatibus consequatur eaque! Incidunt, hic neque.</p>
                </div>
                <form action="">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    <button>Send</button>
                </form>


            </div>
            <div class="contact__social">
                <a href="<?= $linkedin ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="<?= $facebook ?>"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="<?= $twitter ?>"><i class="fa-brands fa-square-twitter"></i></a>
                <a href="<?= $instagram ?>"><i class="fa-brands fa-square-instagram"></i></a>
            </div>
        </div>
    </main>


    <footer>
        <p>Template Creator &copy; Damjan @ Brainster</p>
    </footer>
</body>

</html>