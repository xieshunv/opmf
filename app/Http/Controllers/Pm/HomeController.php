<?php
/**
 * ==============================================
 * 管理端 main
 * ----------------------------------------------
 * PHP version 7 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshun <xieshun@lingxi360.com>
 * @copyright： @2021 http://www.lingxi360.com.com/
 * @version：   v1.0.0
 * @date:       2021-04-01 21:20
 */

namespace App\Http\Controllers\Pm;

use Illuminate\Support\Facades\DB;

class HomeController extends BasePmController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //session()->put('success', '修改成功');
        $ret = DB::table('users')->get();
        dd($ret);
        return view('pm.home.index', []);
    }
}
