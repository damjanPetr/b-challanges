<?php

namespace Users;

session_start();


require_once __DIR__ . '/../Database/Connection.php';

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



        try {
            $conn = new Connection();
            $pdo = $conn->getConnection();
            $sql = "SELECT * FROM users WHERE username = :username AND password = :password;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $this->username, 'password' => $this->password]);
            var_dump($stmt->rowCount());
            if (
                $stmt->rowCount() > 0
            ) {
                $_SESSION['username'] = $this->username;
                return true;
            } else {
                $_SESSION['authError'] = "No authorization!";
                return false;
            }
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
        }
    }

    public function getUserByUsername(): array
    {
        $conn = new Connection();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM users WHERE username = :username;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $this->username]);
        $results = $stmt->fetch();
        return $results;
    }
}
