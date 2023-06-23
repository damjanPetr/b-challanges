<?php

namespace Users;

require_once './Database/Connection.php';

use Database\Connection as Connection;

class Users
{

    protected string $username;
    protected string $password;

    public function __construct($username, $password,)
    {
        $this->username = $username;
        $this->password = $password;
    }
    public function login()
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password;";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $this->username, 'password' => $this->password]);
        if (

            $stmt->rowCount() > 0
        ) {

            session_start();
            $_SESSION['username'] = $this->username;
            return true;
        } else {
            $_SESSION['authError'] = "No authorization!";

            return false;
        }
    }
    public function getUserByUsername($username): array

    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM users WHERE username = :username;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $results = $stmt->fetchAll();
        return $results;
    }
    public function getLastId()
    {
        return;
    }
}
