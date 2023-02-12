<?php

namespace App\Auth;

use App\Models\User;

class LoginAuthenticator extends DummyAuthenticator
{
    public function login($login, $password) : bool
    {

        $user = User::getAll("nickname = ?", [$login]);

        if (count($user) == 1) {
            $user = $user[0];
            if ($password == $user->getPassword()) {
                $_SESSION['user'] = $user->getNickname();
                return true;
            }
        }
        return false;

    }




}