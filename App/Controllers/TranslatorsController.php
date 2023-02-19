<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\Language;
use App\Models\Level;
use App\Models\Service;
use App\Models\Translator;
use App\Models\TranslatorLanguages;
use App\Models\TranslatorServices;
use App\Models\User;

class TranslatorsController extends AControllerBase
{

    public function index(): Response
    {
        $transaltors = Translator::getAll();
//        $assignedServices = TranslatorServicesController::getAll();
//        $assignedLanguages = TranslatorLanguages::getAll();
//        $users = User::getAll();
        $services = Service::getAll();
        $levels = Level::getAll();
        $languages = Language::getAll();


//        $usedLanguages = array_unique($this->getUniqueLanguages());

//        return $this->html([$transaltors, $assignedServices, $assignedLanguages, $users, $services, $levels, $languages]);
        return $this->html([$transaltors, $services, $levels, $languages]);
        // TODO: Implement index() method.
    }

    /**
     * @return JsonResponse
     * @throws \Exception
     */
    public function getUniqueUsedLanguages() :JsonResponse
    {
        $langTrans = TranslatorLanguages::getAll();
        $usedLang = array();
        $i = 0;
        foreach ($langTrans as $lang) {
            $id = $lang->getLanguageFk();
            $usedLang[$i] = Language::getOne($id)->getLanguage();
            $i++;
        }

        $usedLang = array_unique($usedLang);
        return $this->json($usedLang);
    }


    /**
     * @return JsonResponse
     * @throws \Exception
     */
    public function getUniqueUsedServices() :JsonResponse
    {
        $servTrans = TranslatorServices::getAll();
        $usedServ = array();
        $i = 0;
        foreach ($servTrans as $serv) {
            $id = $serv->getIdServFk();
            $usedServ[$i] = Service::getOne($id)->getService();
            $i++;
        }

        $usedServ = array_unique($usedServ);
        return $this->json($usedServ);
    }

    public function getTranslatorServices() :JsonResponse {
        $id = $_GET['id'];
        //id = id of a translator
        $data = array();
        $services = TranslatorServices::getAll();
        foreach ($services as $service) {
            if ($service->getIdTranFk() == $id) {
                //add service name to the array if the translator offers this service
                array_push($data, Service::getOne($service->getIdServFk())->getService());
            }
        }

        return $this->json($data);
    }

    public function getServices() :JsonResponse {
        $data = array();
        $services = TranslatorServices::getAll("id_tran_fk = ?", [$this->request()->getValue('id')]);
        foreach ($services as $service) {
              //add service
                array_push($data, Service::getOne($service->getIdServFk()));
        }

        return $this->json($data);
    }

    public function getTranslatorLanguages() : JsonResponse
    {
        $id = $_GET['id'];
        //id = id of a translator
        $data = array();
        $languages = TranslatorLanguages::getAll();
        foreach ($languages as $language) {
            if ($language->getTranslatorFk() == $id) {
                //add service name to the array if the translator offers this service
                //add language and add language level
                $lang = Language::getOne($language->getLanguageFk())->getLanguage();
                $level = Level::getOne($language->getLevelFk())->getLevel();
                $temp = array([$lang, $level]);
                array_push($data, $temp);
            }
        }

        return $this->json($data);
    }

    public function getLanguages() {
        $translatorId = $this->request()->getValue('id');
        $data = array();
        $languages = TranslatorLanguages::getAll("translator_fk = ?", [$translatorId]);
        foreach ($languages as $language) {
            //add service                                                                                                                               //table row id, PK
            array_push($data, [Language::getOne($language->getLanguageFk())->getLanguage(), Level::getOne($language->getLevelFk())->getLevel(), $language->getId()]);
        }

        return $this->json($data);
    }

//    public function isUserTranslator() :JsonResponse{
//
//        $user = User::getAll("nickname = ?", [$_SESSION['user']]);
//        if ($user[0]->getTranslatorIdFk() != null) {
//            return $this->json([true]);
//
//        } else {
//            return $this->json([false]);
//
//        }
//    }

    public function isLogged() :JsonResponse {
        if ($_SESSION['user'] == null) {
            return $this->json(false);
        } else {
            return $this->json(true);
        }
    }

    public function registerTranslator() :JsonResponse {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];

        /** @var Translator $translator*/
        $translator = new Translator();
        $translator->setName($name);
        $translator->setEmail($email);
        $translator->setTelephone($telephone);

        $translator->save();


        $id = $translator->getId();
//
        return $this->json(['success' => true, 'id' => $translator->getId()]);

    }

    public function isUserTranslator() :JsonResponse{
        $loggedUser = $_SESSION['user'];
        $user = User::getAll("nickname = ?", [$loggedUser]);
//        echo $user;
        if ($user[0]->getTranslatorIdFk() == null) {
            //not a translator, show become a translator, hide edit info
            return $this->json(['success' => false, 'data' => null]);
        } else {
            //yep, return their info so DOM could full edits
            //hide becom a translator, show edit info
            $translator = Translator::getOne($user[0]->getTranslatorIdFk());
            return $this->json(['success' => true, 'translator' => $translator]);
        }
    }


    public function editTranslator() :JsonResponse{
        $loggedUser = $_SESSION['user'];

        $user = User::getAll('nickname = ?', [$loggedUser]);
        $translatorQuery = Translator::getOne($user[0]->getTranslatorIdFk());

        //TODO from _post get info and save it
        $name = $_POST['nameEdit'];
        $email = $_POST['emailEdit'];
        $telephone = $_POST['telephoneEdit'];

        $translator = Translator::getOne($user[0]->getTranslatorIdFk());
        $translator->setName($name);
        $translator->setTelephone($telephone);
        $translator->setEmail($email);

        $translator->save();

        return $this->json(['success' => true]);
    }




}