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
        $routes->post('/profile/save', 'HomeController@profileSave');
        //修改密码
        $routes->get('/profile/pwd', 'UserController@pwd');
        $routes->post('/profile/save/pwd', 'HomeController@pwdSave');
        //表单列表
        $routes->get('/form', 'FormController@index');
        //表单 添加/编辑
        $routes->get('/form/edit', 'FormController@formEdit');
        //ajax 通过Program_id获取当前项目期ID
        $routes->get('/form/circle_id', 'FormController@ajaxGetProgramCircleId');
        //表单 保存
        $routes->post('/form/save', 'FormController@formSave');
        //表单预览
        $routes->get('/form/preview', 'FormController@preview');
        //表单字段列表
        $routes->get('/items', 'ItemsController@index');
        $routes->get('/items/delete', 'ItemsController@delete');
        //添加 编辑字段
        $routes->get('/items/edit', 'ItemsController@edit');
        $routes->post('/items/save', 'ItemsController@save');

    });

//登陆页面
Route::get('/login', 'UserController@login');
Route::post('/sign', 'UserController@sign');
//退出系统
Route::get('/logout', 'UserController@logout');

