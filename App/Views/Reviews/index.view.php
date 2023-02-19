<head>
<!--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<!---->
<!--    <script src="public/js/reviews.js"></script>-->
</head>


<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Translator[] $translators */
/** @var \App\Models\Review[] $data */


if ($auth->isLogged()) { ?>
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Add review
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form id="add-review-form">
                <div class="form-group">
                    <label for="reviewTitle">Title of your review</label>
                    <textarea class="form-control" id="reviewTitle" name="reviewTitle" rows="1"></textarea>
                </div>
<br>
                <div class="form-group">
                    <label for="reviewText"> Text</label>
                    <textarea class="form-control" id="reviewText" name="reviewText" rows="1"></textarea>
                </div>

                <div class="form-group">
                    <label for="percentage">Satisfaction with provided service</label>
                    <textarea class="form-control" id="percentage" name="percentage" rows="1"></textarea>
                </div>

                <div class="form-group">
                    <label for="translatorName">Name of your translator</label>
                    <select class="form-control" id="translatorName" name="translatorName">
                        <?php
                        $translators = \App\Models\Translator::getAll();
                        foreach ($translators as $translator) {
                            echo '<option value="'.$translator->getId().'">'.$translator->getName().'</option>';
                        }
                        ?>

                    </select>
                </div>

                <div>
                    <p id="formFeedback" class="text-center"></p>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

<?php } ?>


<div id="cards" >

<?php foreach ($data as $review) { ?>
<?php //foreach (array_reverse($data) as $review) { ?>
    <div class="card my-3" >
        <div class="card-body">
            <h5 class="card-title text-center"><?php echo $review->getTitle() ?></h5>
            <p class="card-text"> <?php echo $review->getText() ?> </p>
            <p class="card-text"> <?php echo $review->getDate() ?></p>
            <p class="card-text"> <?php echo $review->getAuthor() ?></p>
            <p class="card-text"> <?php echo $review->getPercentageSatisfaction()?></p>
<!--            //TODO decode name of the translator-->
            <p class="card-text" id="transaltorNameDecode"> <?php echo $review->getTranslatorIdFk()?></p>

        </div>
    </div>
<?php } ?>
</div>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="public/js/reviews.js"></script>

