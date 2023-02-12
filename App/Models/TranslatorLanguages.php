<?php

namespace App\Models;

use App\Core\Model;

class TranslatorLanguages extends Model
{

    protected $id_translator_service;
    protected $transaltor_fk;
    protected $language_fk;
    protected $level_fk;

    /**
     * @return mixed
     */
    public function getIdTranslatorService()
    {
        return $this->id_translator_service;
    }

    /**
     * @param mixed $id_translator_service
     */
    public function setIdTranslatorService($id_translator_service): void
    {
        $this->id_translator_service = $id_translator_service;
    }

    /**
     * @return mixed
     */
    public function getTransaltorFk()
    {
        return $this->transaltor_fk;
    }

    /**
     * @param mixed $transaltor_fk
     */
    public function setTransaltorFk($transaltor_fk): void
    {
        $this->transaltor_fk = $transaltor_fk;
    }

    /**
     * @return mixed
     */
    public function getLanguageFk()
    {
        return $this->language_fk;
    }

    /**
     * @param mixed $language_fk
     */
    public function setLanguageFk($language_fk): void
    {
        $this->language_fk = $language_fk;
    }

    /**
     * @return mixed
     */
    public function getLevelFk()
    {
        return $this->level_fk;
    }

    /**
     * @param mixed $level_fk
     */
    public function setLevelFk($level_fk): void
    {
        $this->level_fk = $level_fk;
    }



}