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
    ->domain(env('PM_DOMAIN'))
    ->group(function ($routes) {
        //首页
        $routes->get('/', 'HomeController@index');
        //登陆页面
        $routes->get('/login', 'UserController@login');
        $routes->post('/do_login', 'UserController@doLogin');
        //退出系统
        $routes->get('/logout', 'UserController@logout');

    });
