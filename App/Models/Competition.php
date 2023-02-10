<?php

namespace App\Models;

use App\Core\Model;

class Competition extends Model
{

    protected int $id;
    protected string $name;
    protected int $club_id;
    protected int $place_id;
    protected string $date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getClubId(): int
    {
        return $this->club_id;
    }

    /**
     * @param int $club_id
     */
    public function setClubId(int $club_id): void
    {
        $this->club_id = $club_id;
    }

    /**
     * @return int
     */
    public function getPlaceId(): int
    {
        return $this->place_id;
    }

    /**
     * @param int $place_id
     */
    public function setPlaceId(int $place_id): void
    {
        $this->place_id = $place_id;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }




}