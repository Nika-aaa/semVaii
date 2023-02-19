<?php

namespace App\Models;

use App\Core\Model;

class Review extends Model
{

    protected $id;
    protected $author;
    protected $title;
    protected $text;
    protected $date;
    protected $percentage_satisfaction;
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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
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
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
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