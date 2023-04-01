<?php
$name = 'Damjan';
if ($name == 'Kathrin') {
    echo "Hello Kathrin";
} else {
    echo "Nice name <br>";
}
echo "<hr>";


$rating = 6;
$rated = true;

if ($rating >= 1 && $rating <= 10 && is_int($rating) == 1) {
    if ($rated == true) {
        echo "You already voted <br>";
    } else if ($rated != true) {
        echo "Thanks for voting <br>";
    }
    echo "Thank you for rating <br>";
} else {
    echo 'Invalid rating, only numbers between 1 and 10.';
}


$hour = date('h');

echo "<hr>";
echo " <br>" . $hour;

if ($hour <= 12) {
    echo "Good morning Kathrin";
} else if ($hour <= 12 && $hour >= 07) {
    echo " Good afternoon Kathrin";
} else if ($$hour >= 07) {
    echo "Good evening Kathrin";
}

echo "<hr>";
$voters_array = [
    "Jonh" => [true, 10],
    "Tesla" => [true, 2],
    "Sandy" => [false, 4],
    "Britney" => [true, 5],
    "Belian" => [false, 8],
    "Tom" => [true, 9],
    "Calvin" => [true, 13],
    "Sarah" => [true, 3],
    "Alina" => [true, 2],
    "Smith" => [false, 1],
];
foreach ($voters_array as $voter => $prop) {

    if ($hour <= 12) {
        echo "Good morning " . $voter . "<br>";
    } else if ($hour <= 12 && $hour >= 07) {
        echo " Good afternoon " . $voter . "<br>";
    } else if ($$hour >= 07) {
        echo "Good evening " . $voter . "<br>";
    }
    if ($prop[1] >= 1 && $prop[1] <= 10 && is_int($prop[1]) == 1) {

        if ($prop[0] == true) {
            echo "You already voted  with : " . $prop[1] . " <br>";
        }
        if ($prop[0] == false) {
            echo "Thanks for voting with : " . $prop[1] . " <br>";
        }
        echo "<br>";

    } else {
        echo 'Invalid rating, only numbers between 1 and 10. <br><br>';
    }

}
?>