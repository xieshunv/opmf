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

Route::middleware(['web', 'check.login'])
    ->domain(env('PM_DOMAIN'))
    ->group(function ($routes) {
        //首页
        $routes->get('/', 'HomeController@index');
        //个人资料
        $routes->get('/profile/edit', 'UserController@profile');
        $routes->get('/profile/save', 'HomeController@profileSave');
        //修改密码
        $routes->get('/pwd/edit', 'UserController@pwd');
        $routes->get('/pwd/save', 'HomeController@pwdSave');


    });

//登陆页面
Route::get('/login', 'UserController@login');
Route::post('/sign', 'UserController@sign');
//退出系统
Route::get('/logout', 'UserController@logout');
