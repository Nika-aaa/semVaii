<head>
    <!--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
    <!---->
    <!--    <script src="public/js/reviews.js"></script>-->
</head>

<div class="container">
    <div class="row">
        <div class="col-10 col-xs-10 col-sm-12 col-md-10  mx-auto">


            <?php
            /** @var \App\Core\IAuthenticator $auth */
//            /** @var \App\Models\Translator[] $translators */
            /** @var \App\Models\Review[] $data */

            $reviews = $data[0];
            $translators = $data[1];




            if ($auth->isLogged()) { ?>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Add a new review
                    </button>
                </div>

                <div class="collapse" id="collapseExample">
                    <div class="card card-body darkerBackground">

                        <form id="add-review-form">
                            <div class="form-group">
                                <label for="reviewTitle" class="bold">Title of your review</label>
                                <textarea class="form-control" id="reviewTitle" name="reviewTitle" rows="1"></textarea>
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <label for="reviewText" class="bold"> Text</label>
                                <textarea class="form-control" id="reviewText" name="reviewText" rows="1"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="percentage" class="bold" >Satisfaction with the service (%)</label>
                                    <select name="rating" id="rating" class="form-control">
                                        <?php for ($i = 0; $i <= 100; $i++) { ?>
                                            <option value="<?php echo $i ?>" id="percentage-<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="translatorName" class="bold">Name of your translator</label>
                                    <select class="form-control" id="translatorName" name="translatorName">
                                        <?php
//                                        $translators = \App\Models\Translator::getAll();
                                        foreach ($translators as $translator) {
                                            echo '<option value="'.$translator->getId().'">'.$translator->getName().'</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-primary mt-5">Submit</button>
                                </div>
                            <p id="formFeedback" class="text-center"></p>

                        </form>
                    </div>
                </div>

            <?php } ?>


            <div id="cards" >

                <?php foreach ($reviews as $review) { ?>
                    <?php //foreach (array_reverse($data) as $review) { ?>
                    <div class="card my-3" >
                        <div class="card-body">
                            <p class="card-text border-bottom text-center"> <?php echo $review->getDate() ?></p>

                            <blockquote class="blockquote text-center border-bottom">
                                <h4><?php echo $review->getTitle() ?></h4>
                                <footer class="blockquote-footer"><?php echo $review->getAuthor() ?></footer>
                            </blockquote>

                            <p class="card-text"> <?php echo $review->getText() ?> </p>
                            <p class="card-text"> How satisfied the customer was: <?php echo $review->getPercentageSatisfaction()?></p>
                            <p class="card-text"> Who was their translator: <?php echo \App\Models\Translator::getOne($review->getTranslatorIdFk())->getName()?></p>

                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="public/js/reviews.js"></script>

