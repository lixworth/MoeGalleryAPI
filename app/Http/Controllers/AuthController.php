<?php
/**
 * Auth Controller
 * @author lixworth <lixworth@163.com>
 * @copyright LeeTask Dev Group.
 * @link https://leetask.cn
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function actionLogin(Request $request)
    {
        if (!$token = $this->jwt->attempt($request->only('name', 'password'))) {
            return [
                'error' => 40101
            ];
        }

        return [
            'error' => 0,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->jwt->factory()->getTTL() * 60
        ];
    }


    public function actionLogout()
    {
        Auth::logout();

        return ['error' => 0];
    }
}
