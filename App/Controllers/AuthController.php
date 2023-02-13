<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect('?c=homepage');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect('?c=homepage');
    }

    public function registrationForm(): Response
    {
        return $this->html([
            new User()
        ],
            'register'
        );
    }

    public function register()
    {
        if (empty($_POST['nickname']) || empty($_POST['passwordRegistration']) || empty($_POST['passwordRegistrationRepeat'])) {
            return $this->html(['error' => 'Fill out all the fields']);
        }

        $nickname = $_POST['nickname'];
        $password = $_POST['passwordRegistration'];
        $passwordRepeat = $_POST['passwordRegistrationRepeat'];

        if ($password != $passwordRepeat) {
            return $this->html(['error' => 'Passwords do not match']);
        }

        if (strlen($password) < 3 || strlen($passwordRepeat) > 20) {
            return $this->html(['error' => 'Invalid password length']);
        }

        if (strlen($nickname) < 4 || strlen($nickname) > 20) {
            return $this->html(['error' => 'Invalid nickname length']);
        }

        $existingUsers = User::getAll();
        foreach ($existingUsers as $user) {
            if ($user->getNickname() == $nickname) {
                return $this->html(['error' => 'Nickname already in use']);
            }
        }

//        Vsetko ok, ideme vytvorit usera

        $newUser = new User();
        $newUser->setNickname($nickname);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $newUser->setPassword($hashedPassword);

        $newUser->save();


        return $this->redirect('?c=auth&a=login');




    }
}