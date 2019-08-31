<?php declare(strict_types=1);
/**
 * FileController.php
 *
 * @date 2019/8/31 0:59
 * @author lixworth
 */


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class FileController extends Controller
{
    public function actionUpload(Request $request)
    {
        // TODO: 验证token...省略

        print_r($request->allFiles());

    }
}
