<?php

namespace App\Models;

use App\Core\Model;

class Language extends Model
{
    protected $id_language;
    protected $language;

    /**
     * @return mixed
     */
    public function getIdLanguage()
    {
        return $this->id_language;
    }

    /**
     * @param mixed $id_language
     */
    public function setIdLanguage($id_language): void
    {
        $this->id_language = $id_language;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language): void
    {
        $this->language = $language;
    }




}