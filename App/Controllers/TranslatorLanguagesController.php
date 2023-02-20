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
    }

    public function deleteLanguage() :JsonResponse {
        $idRow = $this->request()->getValue('idLang');
        if ($idRow) {
            $language = TranslatorLanguages::getOne($idRow);
            $language->delete();

            return $this->json(true);
        }
        return $this->json(false);

    }

    public function addLanguage() :JsonResponse {
        $idLang = $this->request()->getValue('idLang');
        $idLevel = $this->request()->getValue('idLevel');
        $idTranslator = $this->request()->getValue('idTran');

        if ($idLang && $idTranslator && $idLevel) {
            $language = new TranslatorLanguages();
            $language->setLanguageFk($idLang);
            $language->setLevelFk($idLevel);
            $language->setTranslatorFk($idTranslator);

            $language->save();

            return $this->json([true, $language->getId()]);
        }
        return $this->json(false);
    }
}