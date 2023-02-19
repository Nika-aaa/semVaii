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
        return $this->html($reviews);
    }

    public function deleteReview() :Response
    {

        $postToBeDeleted = Review::getOne($this->request()->getValue('id'));
        $postToBeDeleted->delete();

        return $this->redirect("?c=reviews");
    }

    public function addReview() : Response{

        $reviewText = $_POST['reviewText'];
        $reviewTitle = $_POST['reviewTitle'];
        $reviewPercentage = $_POST['percentage'];
        $date = date('Y-m-d');

        $userName = $_SESSION['user'];
//        $usernameFk = User::getAll('nickname=?', [$userName]);

        $translator = $_POST['translatorName'];
//        $translatorFk = Translator::getAll('name = ?', [$translator]);

        $review = new Review();
        $review->setTitle($reviewTitle);
        $review->setText($reviewText);
//        $review->setAuthor($usernameFk[0]->getId());
        $review->setAuthor($userName);
        $review->setDate($date);
        $review->setPercentageSatisfaction($reviewPercentage);
//        $review->setTranslatorIdFk($translatorFk[0]->getId());
        $review->setTranslatorIdFk($translator);
        $review->setDate(date('Y-m-d'));


        $review->save();

        // Return a JSON response to the view
        return $this->json(['success' => true]);
    }

}