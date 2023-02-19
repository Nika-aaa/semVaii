<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\Language;
use App\Models\TranslatorLanguages;

class TranslatorLanguagesController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
        // TODO: Implement index() method.
    }

    public function deleteLanguage() :JsonResponse {
        $idRow = $this->request()->getValue('idLang');
        $language = TranslatorLanguages::getOne($idRow);
        $language->delete();

        return $this->json(true);
    }

    public function addLanguage() :JsonResponse {
        $idLang = $this->request()->getValue('idLang');
        $idLevel = $this->request()->getValue('idLevel');
        $idTranslator = $this->request()->getValue('idTran');

        $language = new TranslatorLanguages();
        $language->setLanguageFk($idLang);
        $language->setLevelFk($idLevel);
        $language->setTranslatorFk($idTranslator);

        $language->save();

        return $this->json([true, $language->getId()]);
    }
}