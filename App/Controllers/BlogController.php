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
        if (!isset($_POST['editBlogTitle'], $_POST['editBlogText'])) {
            return $this->errorResponse("Missing required POST variables");
        }

        $title = $_POST['editBlogTitle'];
        $text = $_POST['editBlogText'];
        $id = $this->request()->getValue('id');

        if (empty($title) || empty($text)) {
            return $this->errorResponse("Title and text cannot be empty");
        }

        try {
            $postToBeEdited = BlogPost::getOne($id);
            $postToBeEdited->setTitle($title);
            $postToBeEdited->setText($text);

            $postToBeEdited->save();
        } catch (Exception $e) {
            error_log("Error editing blog post: " . $e->getMessage());

            return $this->errorResponse("An error occurred while editing the blog post");
        }

        return $this->redirect("?c=blog");
    }



    public function deleteBlogpost() :Response
    {
        $id = $this->request()->getValue('id');
        if (!is_numeric($id)) {
            return $this->errorResponse("Wrong id");

        }

        $postToBeDeleted = BlogPost::getOne($id);
        if (!$postToBeDeleted) {
            return $this->errorResponse("Unsuccessful deletion");
        }

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