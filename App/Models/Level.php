<?php

namespace App\Models;

use App\Core\Model;

class Level extends Model
{
    protected $id_level;
    protected $level;

    /**
     * @return mixed
     */
    public function getIdLevel()
    {
        return $this->id_level;
    }

    /**
     * @param mixed $id_level
     */
    public function setIdLevel($id_level): void
    {
        $this->id_level = $id_level;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level): void
    {
        $this->level = $level;
    }



}