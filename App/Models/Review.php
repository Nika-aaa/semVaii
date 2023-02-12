<?php

namespace App\Models;

use App\Core\Model;

class Review extends Model
{

    protected $id_review;
    protected $user_fk;
    protected $title;
    protected $date;
    protected $percentage_satisfaction;
    protected $translator_id_fk;

    /**
     * @return mixed
     */
    public function getIdReview()
    {
        return $this->id_review;
    }

    /**
     * @param mixed $id_review
     */
    public function setIdReview($id_review): void
    {
        $this->id_review = $id_review;
    }

    /**
     * @return mixed
     */
    public function getUserFk()
    {
        return $this->user_fk;
    }

    /**
     * @param mixed $user_fk
     */
    public function setUserFk($user_fk): void
    {
        $this->user_fk = $user_fk;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPercentageSatisfaction()
    {
        return $this->percentage_satisfaction;
    }

    /**
     * @param mixed $percentage_satisfaction
     */
    public function setPercentageSatisfaction($percentage_satisfaction): void
    {
        $this->percentage_satisfaction = $percentage_satisfaction;
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