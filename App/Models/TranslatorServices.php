<?php

namespace App\Models;

use App\Core\Model;

class TranslatorServices extends Model
{

    protected $id;
    protected $id_tran_fk;
    protected $id_serv_fk;

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
    public function getIdTranFk()
    {
        return $this->id_tran_fk;
    }

    /**
     * @param mixed $id_tran_fk
     */
    public function setIdTranFk($id_tran_fk): void
    {
        $this->id_tran_fk = $id_tran_fk;
    }

    /**
     * @return mixed
     */
    public function getIdServFk()
    {
        return $this->id_serv_fk;
    }

    /**
     * @param mixed $id_serv_fk
     */
    public function setIdServFk($id_serv_fk): void
    {
        $this->id_serv_fk = $id_serv_fk;
    }


}