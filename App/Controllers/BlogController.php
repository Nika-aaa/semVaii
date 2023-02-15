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
//
////        if ($this->request()->getMethod() === 'POST') {
//            $title = $_POST['editBlogTitle'];
//            $text = $_POST['editBlogText'];
//            $id = $this->request()->getValue('id');
//
//            $postToBeEdited = BlogPost::getOne($id);
//            $postToBeEdited->setTitle($title);
//            $postToBeEdited->setText($text);
//
//            $postToBeEdited->save();
//
//
//            return $this->json(['success' => true, 'title' => $postToBeEdited->getTitle(), 'text'=> $postToBeEdited->getText()]);
////        }
//
//        return $this->redirect("?c=blog");


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

    public function createBlogpost() :Response
    {

        return $this->html(new BlogPost(), viewName: 'create');

    }

    public function store() :Response
    {


        $data = json_decode(file_get_contents('php://input'));
        $blogpost = new BlogPost();
        $blogpost->setText($data->text);
        $blogpost->setTitle($data->title);
        $blogpost->setDate(date('Y-m-d'));
        $blogpost->save();

        return $this->json(['success' => true]);
    }


}