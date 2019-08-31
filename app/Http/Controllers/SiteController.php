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
    public function install()
    {
        //数据模拟

        if(! Site::where('id',1)->first()){
           $site = new Site();
           $site->title = "MoeGallery Demo";
           $site->url = "http://39.106.162.170:8000/";
           $site->favicon = "https://avatars0.githubusercontent.com/u/41699451?s=200&v=4";
           $site->save();
        }
    }

    public function info()
    {
        $this->install();
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
