<?php

/*namespace App\Models;*/
require_once 'db.php';

class User extends Database
{

    function __construct($table = 'users')
    {
        $this->table = $table;
    }

    public function register($user)
    {

        //validation must be done.email & username must be unique
        $conn = $this->connectDB();
        $statement = $conn->prepare("insert into {$this->table}(firstname,lastname,username,email,password)
             values (:firstname ,:lastname,:username,:email,:password)");
        $statement->bindParam($user['firstname'], $user['lastname'], $user['email'], $user['password']);
        $statement->execute();
        echo $statement->rowCount();
    }

    public function getUserByUsername($username)
    {
        $conn = $this->connectDB();
        $statement = $conn->prepare("select * from {$this->table} where username= :username");
        $statement->bindParam(':username', $username);
        $statement->execute();
        $user = $statement->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }
}
