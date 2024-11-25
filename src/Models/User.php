<?php namespace App\Models;

namespace App\Models;

use RedBeanPHP\R;

class User
{
    protected $user;

    // Constructor accepts an existing RedBean object or creates a new one
    public function __construct($user = null)
    {
        if ($user) {
            $this->user = $user;
        } else {
            $this->user = R::dispense('users');
        }
    }

    // Save or update the user in the database
    public function save()
    {
        // Store the user object using RedBean
        return R::store($this->user);
    }

    // Find a user by their username
    public static function findByUsername($username)
    {
        return R::findOne('users', 'username = ?', [$username]);
    }

    // Create a new user
    public static function createUser($username, $password)
    {
        $user = new self();
        $user->setUsername($username);
        $user->setPassword($password);
        return $user->save();
    }

    // Set the username
    public function setUsername($username)
    {
        $this->user->username = $username;
    }

    // Set the password (hashed)
    public function setPassword($password)
    {
        $this->user->password = password_hash($password, PASSWORD_BCRYPT);
    }

    // Check if a given password matches the hashed password
    public function checkPassword($password)
    {
        return password_verify($password, $this->user->password);
    }

    // Get user details (if needed)
    public function getId()
    {
        return $this->user->id;
    }

    public function getUsername()
    {
        return $this->user->username;
    }

    public function getPassword()
    {
        return $this->user->password;
    }
}