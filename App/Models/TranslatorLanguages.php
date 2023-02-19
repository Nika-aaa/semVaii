<?php

namespace App\Models;

use App\Core\Model;

class TranslatorLanguages extends Model
{

    protected $id;
    protected $translator_fk;
    protected $language_fk;
    protected $level_fk;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTranslatorFk()
    {
        return $this->translator_fk;
    }

    /**
     * @param mixed $translator_fk
     */
    public function setTranslatorFk($translator_fk): void
    {
        $this->translator_fk = $translator_fk;
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