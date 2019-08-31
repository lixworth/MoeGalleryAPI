<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/** @var null $router */

$router->get('/login', 'AuthController@actionLogin');
$router->post('/login', 'AuthController@actionLogin');

$router->get('/register', 'AuthController@actionRegister');
$router->post('/register', 'AuthController@actionRegister');


$router->get('/logout', 'AuthController@actionLogout');
$router->post('/logout', 'AuthController@actionLogout');


$router->get('/upload', 'FileController@actionUpload');
$router->post('/upload', 'FileController@actionUpload');
