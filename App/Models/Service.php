<?php

namespace App\Models;

use App\Core\Model;

class Service extends Model
{

    protected $id_service;
    protected $service;

    /**
     * @return mixed
     */
    public function getIdService()
    {
        return $this->id_service;
    }

    /**
     * @param mixed $id_service
     */
    public function setIdService($id_service): void
    {
        $this->id_service = $id_service;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service): void
    {
        $this->service = $service;
    }



}