<?php

namespace App\Models;

use App\Core\Model;

class BlogPost extends Model
{
    protected $id;
    protected $title;
    protected $text;
//    protected $author_fk;
    protected $photo;
    protected $date;

    /**
     * @param $id
     * @param $title
     * @param $text
     * @param $photo
     * @param $date
     */
//    public function __construct($title, $text, $photo, $date)
//    {
//        $this->title = $title;
//        $this->text = $text;
//        $this->photo = $photo;
//        $this->date = $date;
//    }


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
    public function getAuthorFk()
    {
        return $this->author_fk;
    }

    /**
     * @param mixed $author_fk
     */
    public function setAuthorFk($author_fk): void
    {
        $this->author_fk = $author_fk;
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
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }






}