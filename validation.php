<?php
function checkSavedUsers(string $username, string $password)
{
    $usersFile = trim(file_get_contents('./users.txt'));
    $userRow = explode(PHP_EOL, $usersFile);


    foreach ($userRow as $user) {
        $credentials = explode('=', $user);
        if ($username == $credentials[0] && password_verify($password, $credentials[1])) {
            return true;
        };
    };
    return false;
};
