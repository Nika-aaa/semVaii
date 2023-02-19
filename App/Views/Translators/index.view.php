<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Translator $data */

//$data;

$translators = $data[0];
$services = $data[1];
$levels = $data[2];
$languages = $data[3];

?>


<?php ?>


<div class="" id="becomeTranslator">

    <div id="accordion">

<!--        //---------------------------first accordion-->
        <div class="card" id="displayBecomeTranslator">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Become a translator
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <form id="formBecomeTranslator" >
                        <div class="form-group">
                            <label for="name">Name</label>
                            <textarea type="text" class="form-control" rows="1" id="name" name="name" placeholder="Write a title for your blog post"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">email</label>
                            <textarea type="email" class="form-control" rows="1" id="email" name="email" placeholder="Write a title for your blog post"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="telephone">telephone</label>
                            <textarea type="phone" class="form-control" rows="1" id="telephone" name="telephone" placeholder="Write a title for your blog post"></textarea>
                        </div>
                        <br>

                        <br>
                        <p id="becomeTranslatorFeedback"></p>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


<!--        //---------------------------second accordion-->
        <div class="card" id="displayEditTranslator">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Edit translator info
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <form id="editInformation">
                        <div class="form-group">
                            <label for="nameEdit">Name</label>
                            <textarea type="text" class="form-control" rows="1" id="nameEdit" name="nameEdit"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="emailEdit">email</label>
                            <textarea type="email" class="form-control" rows="1" id="emailEdit" name="emailEdit"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="telephoneEdit">telephone</label>
                            <textarea type="phone" class="form-control" rows="1" id="telephoneEdit" name="telephoneEdit"></textarea>
                        </div>
                        <br>

                        <br>
                        <p id="editTranslatorFeedback"></p>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<!--        //---------------------------third accordion-->
        <div class="card" id="displayEditLanguages">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Edit languages and services
                    </button>
                </h5>
            </div>


            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">



<!--                    //translator services-->
<!--                    //------------------------------->
                    <p id="loadingDisplayServices">Loading your services</p>
                    <ul id="displayServices">

                    </ul>
<!--                    //translator services select-->
<!--                    //----------------------------------------->
                    <div>
                        <form>
                            <div class="form-group">
                                <label for="formServiceSelector">Select service you would like to add</label>
                                <select class="form-control custom-select" id="formServiceSelector">
                                    <?php foreach ($services as $service) { ?>
                                    <option value="<?php echo $service->getId() ?>" id="option-<?php echo $service->getId() ?>"> <?php echo $service->getService() ?></option>
                                    <?php } ?>
                                </select>
                                <button type="submit" class="btn btn-primary my-1" onclick="addService(event)">Submit</button>

                            </div>
                        </form>
                    </div>

<!--                    //translator languages-->
<!--                    //------------------------------------------->
                    <div>
                        <p id="loadingDisplayLanguages">Loading your languages</p>

                        <ul id="displayLanguages">

                        </ul>



                    </div>

<!--                    //translator languages select-->
<!--                    //------------------------------------------->
                    <form>
                        <div class="form-group">
                            <label for="formLanguageSelector">Select language you would like to add</label>
                            <select class="form-control custom-select" id="formLanguageSelector">
                                <?php foreach ($languages as $language) { ?>
                                    <option value="<?php echo $language->getId() ?>" id="optionLanguage-<?php echo $language->getId() ?>"> <?php echo $language->getlanguage() ?></option>
                                <?php } ?>
                            </select>
                            <select class="form-control custom-select" id="formLevelSelector">
                                <?php foreach ($levels as $level) { ?>
                                    <option value="<?php echo $level->getId() ?>" id="optionLevel-<?php echo $level->getId() ?>"> <?php echo $level->getLevel() ?></option>
                                <?php } ?>
                            </select>

                            <button type="submit" class="btn btn-primary my-1" onclick="addLanguage(event)">Submit</button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="public/js/translators.js"></script>

<!--//translator cards-->
<!--//--------------------------------------------------------------------------------------->

<div>
    <?php foreach ($translators as $translator) { ?>
        <div class="card my-3" id="<?php echo $translator->getId() ?>">
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo $translator->getName() ?></h5>
                <p class="card-text"> Languages: </p>
                <ul id="translatorLanguage-<?php echo $translator->getId() ?>">

                </ul>
                <p class="card-text" id="theirServices"> Services: </p>
                <ul id="translatorService-<?php echo $translator->getId() ?>">

                </ul>
                <p class="card-text"> <?php echo $translator->getEmail() ?></p>
                <p class="card-text"> <?php echo $translator->getTelephone() ?></p>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            getTranslatorServices(<?php echo $translator->getId() ?>);
            getTranslatorLanguages(<?php echo $translator->getId() ?>);
        </script>
    <?php } ?>
</div>


