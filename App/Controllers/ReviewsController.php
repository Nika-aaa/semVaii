<?php

namespace App\Controllers;


use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Review;
use App\Models\Translator;
use App\Models\User;

class ReviewsController extends AControllerBase
{

    public function index(): Response
    {
        $reviews = Review::getAll();
        $translators = Translator::getAll();
        return $this->html([$reviews, $translators]);
    }

//    public function deleteReview() :Response
//    {
//
//        $postToBeDeleted = Review::getOne($this->request()->getValue('id'));
//        $postToBeDeleted->delete();
//
//        return $this->redirect("?c=reviews");
//    }

    public function addReview() : Response{
        if (isset($_POST['reviewText'], $_POST['reviewTitle'], $_POST['rating'], $_SESSION['user'], $_POST['translatorName'])) {
            $reviewText = $_POST['reviewText'];
            $reviewTitle = $_POST['reviewTitle'];
            $reviewPercentage = $_POST['rating'];
            $userName = $_SESSION['user'];
            $translator = $_POST['translatorName'];

            $date = date('Y-m-d');

            $review = new Review();
            $review->setTitle($reviewTitle);
            $review->setText($reviewText);
            $review->setAuthor($userName);
            $review->setDate($date);
            $review->setPercentageSatisfaction($reviewPercentage);
            $review->setTranslatorIdFk($translator);
            $review->setDate(date('Y-m-d'));

            $review->save();

            $translatorName = Translator::getOne($translator)->getName();

            return $this->json(['success' => true, 'name' => $translatorName, 'percentage' => $reviewPercentage]);
        }
        return $this->json(false);
    }

}