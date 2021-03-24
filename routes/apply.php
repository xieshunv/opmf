<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('web')
    ->domain(env('APPLY_DOMAIN'))
    ->group(function ($routes) {
        //首页
        $routes->get('/', 'HomeController@index');
});
