<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class HomepageController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
    }
}