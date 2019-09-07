<?php declare(strict_types=1);
/**
 * SiteController.php
 *
 * @date 2019/8/31 18:21
 * @author lixworth
 */


namespace App\Http\Controllers;



use App\Site;

class SiteController extends Controller
{
    public function info()
    {
        $site = Site::where('id',1)->first();

        return [
            'error' => 0,
            'data' => [
                'title' => $site->title,
                'url' => $site->url,
                'favicon' => $site->favicon,
            ],
            'debug' => env('APP_ENV')

        ];
    }


}
