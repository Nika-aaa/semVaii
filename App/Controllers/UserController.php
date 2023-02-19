<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Request;
use App\Core\Responses\Response;
use App\Models\Translator;
use App\Models\User;

class UserController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
        // TODO: Implement index() method.
    }

    public function assignTranslatorToUser() {
        //update fk transaltor in the user table after the user registers as a translator
        //i get transaltor id from the url

        $id = $this->request()->getValue('id');

        $userQuery = User::getAll('nickname = ?', [$_SESSION['user']]);

        $user =$userQuery[0];

        $user->setTranslatorIdFk($id);
        $user->save();

        return $this->json(true);
    }

    public function getTranslator(){
        $userName = $_SESSION['user'];
        $userQuery = User::getAll('nickname = ?', [$userName]);
        $translatorFk = $userQuery[0]->getTranslatorIdFk();
        if ($translatorFk == null) {
            return $this->json(false); //not a translator
        } else {
            $translator = Translator::getOne($userQuery[0]->getTranslatorIdFk());
            return $this->json($translator); //return translator info
        }
    }
}