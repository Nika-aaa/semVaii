<?php

namespace App\Models;

use App\Core\Model;

class TranslatorServices extends Model
{

    protected $id_translator_service;
    protected $id_transaltor_fk;
    protected $id_service_fk;

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
    public function getIdTransaltorFk()
    {
        return $this->id_transaltor_fk;
    }

    /**
     * @param mixed $id_transaltor_fk
     */
    public function setIdTransaltorFk($id_transaltor_fk): void
    {
        $this->id_transaltor_fk = $id_transaltor_fk;
    }

    /**
     * @return mixed
     */
    public function getIdServiceFk()
    {
        return $this->id_service_fk;
    }

    /**
     * @param mixed $id_service_fk
     */
    public function setIdServiceFk($id_service_fk): void
    {
        $this->id_service_fk = $id_service_fk;
    }


}