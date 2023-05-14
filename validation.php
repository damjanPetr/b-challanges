<?php
$usersFile = trim(file_get_contents('./users.txt'));
$userRow = explode(PHP_EOL, $usersFile);
require_once __DIR__ . '/functions.php';
function checkSavedUsers(string $username, string $password)
{
    global $userRow;
    foreach ($userRow as $user) {
        $credentials = explode(',', $user, 2);
        $credentialsEmail = $credentials[0];
        [$credentialsUsername, $credentialsPassword] = explode('=', $credentials[1]);

        // dd($credentialsEmail);
        // dd($credentialsUsername);
        // dd($credentialsPassword);
        $credentials = explode('=', $user);
        if ($username == $credentialsUsername && password_verify($password, $credentialsPassword)) {

            return true;
        };
    };
    return false;
};


function checkIfUsernameExists(string $username): bool
{

    global $userRow;
    foreach ($userRow as $user) {
        $credentials = explode(',', $user, 2);
        $credentialsEmail = $credentials[0];
        [$credentialsUsername, $credentialsPassword] = explode('=', $credentials[1]);

        // dd($credentialsEmail);
        // d($credentialsUsername);
        // d($username . '         score');
        // var_dump($credentialsUsername);
        // dd($credentialsPassword);
        $credentials = explode('=', $user);
        if (strtolower($username) == strtolower($credentialsUsername)) {
            return true;
        };
    };
    return false;
};


function checkIfEmailExists(string $email): bool
{

    global $userRow;
    foreach ($userRow as $user) {
        $credentials = explode(',', $user, 2);
        $credentialsEmail = $credentials[0];
        [$credentialsUsername, $credentialsPassword] = explode('=', $credentials[1]);

        // dd($credentialsEmail);
        // d($credentialsUsername);
        // d($username . '         score');
        // var_dump($credentialsUsername);
        // dd($credentialsPassword);
        $credentials = explode('=', $user);
        if (strtolower($email) == strtolower($credentialsEmail)) {
            return true;
        };
    };
    return false;
};


function checkAllInputsPresent($arg1, $arg2, $arg3)
{
    if (!empty(($arg1)) && !empty(($arg2)) && !empty(($arg3))) {
        return true;
    };
    return false;
}
// var_dump(checkAllInputsPresent('n', 'n', 'n'));


function checkUsernameForForbidenCharacters($arg)
{

    $pattern = "/^[a-zA-Z0-9]+$/";
    // Some code...
    if (preg_match($pattern, $arg)) {
        return false;
    }
    return true;
}

// var_dump(checkUsernameForForbidenCharacters('damjan'));


function check5LenEmail($arg)
{
    $pre = explode('@', $arg);
    // d($pre);
    return (strlen($pre[0]) >= 5 ?  true :  false);
};


// var_dump(check5LenEmail('hhhha@gmail.com'));
function passwordCheck($arg)
{


    $pattern = '/(?=.*\d)(?=.*[A-Z])(?=.*\W)/';

    if (preg_match($pattern, $arg)) {
        return true;
    }
    return false;
}
// var_dump(passwordCheck('U122ueo!@@@*'));
