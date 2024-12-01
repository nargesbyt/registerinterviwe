<?php namespace App\Controllers;

use App\Application;
use App\Controllers\BaseController;
use Rakit\Validation\Validator;
use App\Models\User;
use App\RedirectResponseWithErrors;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Rakit\Validation\ErrorBag;
use RedBeanPHP\R;

class UserController extends BaseController{

  
    public function register(ServerRequestInterface $request):ResponseInterface
    {   
        if($request->getMethod()=='GET'){

            return new HtmlResponse($this->blade->render('users.register'));
        }
        $params = (array) $request->getParsedBody();

        // Validate input using Rakit Validation
        $validation = $this->validate($params, [
            'name' =>'required|min:3|max:255',
            'username' => 'required|min:3|unique:users,username', //unique:table,column
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validation->fails()) {

            session()->flash('errors',$validation->errors());
            session()->flash('old_inputs',$params);
            return new RedirectResponse('/auth/register');



        }

        // Create the user using the User model
       /* $user = User::createUser($params['username'], $params['password']);

        // Redirect to login page after successful registration
        return $response->withRedirect('/login');*/
    }

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