<?php
/**
 * Auth Controller
 * @author lixworth <lixworth@163.com>
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
        if(! User::where('id',1)->first()){
            $user = new User();
            $user->name = "admin";
            $user->password = Hash::make("admin");
            $user->save();
        }
        if (!$token = $this->jwt->attempt($request->only('name', 'password'))) {
            return [
                'error' => 4012
            ];
        }

        return [
            'error' => 0,
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => $this->jwt->factory()->getTTL() * 60
            ]
        ];
    }

    public function actionProfile()
    {
        if(! Auth::check()){
           return response()->json(['error' => 4032],403);
        }
        return [
            'error' => 0,
            'data' => Auth::user()
        ];
    }


    public function actionLogout()
    {
        Auth::logout();

        return ['error' => 0];
    }
}
