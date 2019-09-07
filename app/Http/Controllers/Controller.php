<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        Install::install(); //install模拟数据
    }
}
