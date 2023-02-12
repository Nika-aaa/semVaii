<?php
$layout = 'auth';
/** @var Array $data */
?>


<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Registration</h5>

<!--                    <div class="text-center text-danger mb-3">-->
                        <?= @$data['message'] ?>
<!--                    </div>-->


                    <form class="form-registration" method="post" action="?c=auth&a=register">

<!--                        nickname-->
                        <div class="form-label-group mb-3">
                            <input name="nickname" type="text" id="nickname" class="form-control" placeholder="Nickname"
                                   required autofocus>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="passwordRegistration" type="password" id="passwordRegistration" class="form-control"
                                   placeholder="Password" required>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="passwordRegistrationRepeat" type="password" id="passwordRegistrationRepeat" class="form-control"
                                   placeholder="Repeat password" required>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="register">Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


