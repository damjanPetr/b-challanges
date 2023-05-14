<?php

require './functions.php';

$data = $_POST;

['username' => $username, 'password' => $password] = $data;


$hashPassword = password_hash($password, PASSWORD_DEFAULT);


file_put_contents('./users.txt', "$username=$hashPassword" . PHP_EOL, FILE_APPEND);

header("Location:registeredUserDashboard.php?username=$username");
