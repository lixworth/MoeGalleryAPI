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

$router->get('/profile', 'AuthController@actionProfile');
$router->post('/login', 'AuthController@actionLogin');
$router->post('/logout', 'AuthController@actionLogout');


$router->post('/upload', 'FileController@actionUpload');

$router->get('/siteinfo', 'SiteController@info');

