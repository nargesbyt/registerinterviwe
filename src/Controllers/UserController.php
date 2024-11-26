<?php namespace App\Controllers;

use App\Controllers\BaseController;
use Rakit\Validation\Validator;
use App\Models\User;
use RedBeanPHP\R;

class UserController extends BaseController{

    public function showRegister($request, $response)
    {
        return $this->render('register');
    }

    // Handle registration form submission
    public function register($request, $response)
    {
        $params = (array) $request->getParsedBody();

        // Validate input using Rakit Validation
        
        $validation = $this->validate($params, [
            'username' => 'required|min:3|unique:users,username',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            return $this->render('register', ['errors' => $errors]);
        }

        // Create the user using the User model
        $user = User::createUser($params['username'], $params['password']);

        // Redirect to login page after successful registration
        return $response->withRedirect('/login');
    }

    // Show login form
    public function showLogin($request, $response)
    {
        return $this->render('login');
    }

    // Handle login form submission
    public function login($request, $response)
    {
        $params = (array) $request->getParsedBody();

        // Find the user by username using the User model
        $user = User::findByUsername($params['username']);

        if ($user && $user->checkPassword($params['password'])) {
            // Start the session and store the user ID
            session_start();
            $_SESSION['user_id'] = $user->getId();
            return $response->withRedirect('/');
        }

        return $this->render('login', ['error' => 'Invalid credentials']);
    }
}