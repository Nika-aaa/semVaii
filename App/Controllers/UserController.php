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
    }

    public function assignTranslatorToUser() {
        //update fk translator in the user table after the user registers as a translator
        //id get translator id from the url

        $id = $this->request()->getValue('id');
        if ($id) {
            $userQuery = User::getAll('nickname = ?', [$_SESSION['user']]);

            if ($userQuery) {
                $user =$userQuery[0];

                $user->setTranslatorIdFk($id);
                $user->save();

                return $this->json(true);
            }

        }
        return $this->json(false);

    }

    public function getTranslator(){
        if (isset($_SESSION['user'])){
            $userName = $_SESSION['user'];
            $userQuery = User::getAll('nickname = ?', [$userName]);
            if ($userQuery) {
                $translatorFk = $userQuery[0]->getTranslatorIdFk();
                if ($translatorFk == null) {
                    return $this->json(false); //not a translator
                } else {
                    $translator = Translator::getOne($userQuery[0]->getTranslatorIdFk());
                    return $this->json($translator); //return translator info
                }
            }
        }
        return $this->json(false);

    }
}