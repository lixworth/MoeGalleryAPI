<?php declare(strict_types=1);
/**
 * Install.php
 *
 * @date 2019/9/7 19:30
 * @author lixworth
 */


namespace App\Http\Controllers;


use App\File;
use App\Gallery;
use App\Site;
use Illuminate\Support\Facades\Storage;

class Install
{
    public function actionInstall()
    {
        self::install();
    }

    public static function install()
    {
        //Site
        if (!Site::where('id', 1)->first()) {
            $site = new Site();
            $site->title = "MoeGallery Demo";
            $site->url = "http://39.106.162.170:8000/";
            $site->favicon = "https://avatars0.githubusercontent.com/u/41699451?s=200&v=4";
            $site->save();
        }
        //File
        if (!File::where('id', 1)->first()) {
            $result = array();
            foreach (Storage::allFiles() as $file) { //模拟将storage所有文件写入数据库
                $result[$file] = [
                    "name" => $file,
                    "md5" => md5_file(__DIR__ . '/../../../storage/app/public/' . $file),
                    "size" => filesize(__DIR__ . '/../../../storage/app/public/' . $file),
                    "install" => false
                ];
            }

            foreach ($result as $item) {
                $file = new File();
                $file->file = $item['name'];
                $file->md5 = $item['md5'];
                $file->size = $item['size'];
                if ($file->save()) {
                    $item['install'] = true; //不知道为啥一直是false
                }
            }
        }
        //Gallery
        if (!Gallery::where('id', 1)->first()) {
            $gallery = new Gallery();
            $gallery->title = "崩坏降临";
            $gallery->description = "人类,你们的存在就是错误。战争、欺骗、嫉妒、贪婪，你们曾让我失去了所有。但今天 我将吞噬一切！因为我,就是崩坏！";
            $gallery->tags = json_encode(["游戏", "动漫", "崩坏"]);
            $gallery->images = json_encode([11, 7, 8, 9, 10]);
            $gallery->save();
        }
        if (!Gallery::where('id', 2)->first()) {
            $gallery = new Gallery();
            $gallery->title = "图集一";
            $gallery->description = "无论走到哪里，都应该记住，过去都是假的，回忆是一条没有尽头的路，一切以往的春天都不复存在，就连那最坚韧而又狂乱的爱情归根结底也不过是一种转瞬即逝的现实，";
            $gallery->tags = json_encode(["游戏", "动漫"]);
            $gallery->images = json_encode([1, 2, 3, 4, 5, 6]);
            $gallery->save();
        }
    }


    public static $auth = [
        "name" => "admin",
        "password" => "admin"
    ];
}
