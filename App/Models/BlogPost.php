<?php

namespace App\Models;

use App\Core\Model;

class BlogPost extends Model
{
    protected $id_post;
    protected $title;
    protected $text;
    protected $author_fk;
    protected $date;

    /**
     * @return mixed
     */
    public function getIdPost()
    {
        return $this->id_post;
    }

    /**
     * @param mixed $id_post
     */
    public function setIdPost($id_post): void
    {
        $this->id_post = $id_post;
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





}