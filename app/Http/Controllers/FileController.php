<?php declare(strict_types=1);
/**
 * FileController.php
 *
 * @date 2019/8/31 0:59
 * @author lixworth
 */


namespace App\Http\Controllers;


use App\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function actionUpload(Request $request)
    {
        // TODO: 验证token...省略

        print_r($request->allFiles());

    }

    public function actionDelete()
    {

    }

    public function getFileMd5()
    {

    }

    public function actionShowImage($file_id,$md5)
    {
        $file = File::where('id',$file_id)->first();

        if($file){
            if($md5 == $file->md5){
                $header = ['Content-Type'=>'image/jpeg'];
                return response()->make(Storage::get($file->file), 200, $header);
            }
        }

        return abort(404);
    }
    public function actionTest(Response $response)
    {

    }
}
