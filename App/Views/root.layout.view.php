<?php
use App\Core\IAuthenticator;


/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>

<!doctype html>
<html lang="en">

<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="public/css/styl.css">
</head>

<body>
<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark p-1 fixed-top">

    <a href="?c=homepage" class="navbar-brand padding_left disappear">TRANSLATORIA</a>

    <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navLinks">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a href="?c=homepage" class="nav-link padding_left">HOME</a>
            </li>
            <li class="nav-item">
                <a href="?c=whatwedo" class="nav-link padding_left">WHAT WE DO</a>
            </li>
            <li class="nav-item">
                <a href="?c=blog" class="nav-link padding_left">BLOG</a>
            </li>
            <li class="nav-item">
                <a href="?c=reviews" class="nav-link padding_left">TESTIMONIALS</a>
            </li>
            <li class="nav-item">
                <a href="?c=translators" class="nav-link padding_left">OUR TRANSLATORS</a>
            </li>

            <?php if (!$auth->isLogged()) { ?>
                <li class="nav-item">
                    <a href="?c=auth" class="nav-link padding_left">LOGIN</a>
                </li>


            <?php } else { ?>
                <li class="nav-item">
                    <a href="?c=auth&a=logout" class="nav-link padding_left">LOGOUT</a>
                </li>

                <li id="login">
                    <b id="loginDisplay"><?= $auth->getLoggedUserName() ?></b>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>


    <div class="web-content">
        <?= $contentHTML ?>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>

</html>
