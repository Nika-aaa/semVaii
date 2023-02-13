<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\BlogPost;

class BlogController extends AControllerBase
{

    public function index(): Response
    {
        $posts = BlogPost::getAll();
        return $this->html($posts);
    }

    public function editBlogPost() : Response
    {

       $title = $_POST['editBlogTitle'];
       $text = $_POST['editBlogText'];
       $id = $this->request()->getValue('id');


       $postToBeEdited = BlogPost::getOne($id);
       $postToBeEdited->setTitle($title);
       $postToBeEdited->setText($text);

       $postToBeEdited->save();


        return $this->redirect("?c=blog");
    }

    public function deleteBlogpost() :Response
    {

        $postToBeDeleted = BlogPost::getOne($this->request()->getValue('id'));

        $postToBeDeleted->delete();

        return $this->redirect("?c=blog");
    }

    public function createNewBlogpost() :Response
    {

        return $this->redirect("?c=blog");

    }
}