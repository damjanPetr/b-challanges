<?php

require_once './functions.php';
require __DIR__ . '/validation.php';
$data = $_POST;

['username' => $username, 'password' => $password, 'email' => $email] = $data;

if (checkIfUsernameExists($username)) {
    $auth = 'Username taken!!!';
    header("Location:register.php?errorMSG=$auth");
    return;
};

if (!checkAllInputsPresent($username, $email, $password)) {
    $auth = 'Please fill each input!!!';
    header("Location:register.php?errorMSG=$auth");
    return;
};


if (checkIfEmailExists($email)) {
    $auth = 'A user with this email already exists!!!';
    header("Location:register.php?errorMSGemail=$auth");
    return;
};

if (checkUsernameForForbidenCharacters($username)) {
    $auth = 'Plase remove special characters from username!!!';
    header("Location:register.php?errorMSG=$auth");
    return;
};

if (!check5LenEmail($email)) {
    $auth = 'Plase enter a valid email address';
    header("Location:register.php?errorMSG=$auth");
    return;
};
if (!passwordCheck($password)) {
    $auth = 'Plese enter a password that contains at least one : UpperCase letter,  Symbol, and Number';
    header("Location:register.php?errorMSG=$auth");
    return;
};


$hashPassword = password_hash($password, PASSWORD_DEFAULT);


file_put_contents('./users.txt', "$email,$username=$hashPassword" . PHP_EOL, FILE_APPEND);

header("Location:registeredUserDashboard.php?username=$username");
