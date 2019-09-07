<?php declare(strict_types=1);
/**
 * GalleryController.php
 *
 * @date 2019/9/6 22:10
 * @author lixworth
 */


namespace App\Http\Controllers;




use App\File;
use App\Gallery;

class GalleryController extends Controller
{

    public function actionGetGalleries()
    {

        $results = Gallery::orderBy('updated_at', 'desc')->simplePaginate(5);
        $items = $results->items();
        foreach ($items as $item){
            $images = json_decode($item->images);

            $images_url = array();
            foreach ($images as $image) {
                $file = File::where('id',$image)->first();
                if($file) {
                    array_push($images_url, url('image/' . $image . "/" . $file['md5']));
                }else{
                    array_push($images_url,null);
                }
            }
            $item->images = $images_url;
        }
        $result = [
            "error" => 0,
            "info" => [
                "page" => $results->currentPage(),
                "has_more_pages" => $results->hasMorePages()
            ],
            "data" => $items,
        ];
        return $result;
    }
}
