<?php namespace App\Controllers;

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

    // Handle registration form submission
    public function register(ServerRequestInterface $request):ResponseInterface
    {   
        if($request->getMethod()=='GET'){
            $errors = session()->flash('errors')?? new ErrorBag();
            return new HtmlResponse($this->blade->render('users.register'));
        }
        //$response = new Response();
        $params = (array) $request->getParsedBody();
        //var_dump($params); die;

        // Validate input using Rakit Validation
        $validation = $this->validate($params, [
            'name' =>'required|min:3|max:255',
            'username' => 'required|min:3|unique:users,username', //unique:table,column
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validation->fails()) {
            session()->flash('errors',$validation->errors());
            var_dump(session()->flash('errors'));die;
            // Redirect back to the registration page or form
            $response=  new RedirectResponseWithErrors('/auth/register');
            return $response->withErrors($validation->errors());

        }

        // Create the user using the User model
       /* $user = User::createUser($params['username'], $params['password']);

        // Redirect to login page after successful registration
        return $response->withRedirect('/login');*/
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