<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{

    protected $id;
    protected $nickname;
    protected $password;
    protected $translator_id_fk;

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
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     */
    public function setNickname($nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getTranslatorIdFk()
    {
        return $this->translator_id_fk;
    }

    /**
     * @param mixed $translator_id_fk
     */
    public function setTranslatorIdFk($translator_id_fk): void
    {
        $this->translator_id_fk = $translator_id_fk;
    }



}