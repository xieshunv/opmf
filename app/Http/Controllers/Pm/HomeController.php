<?php

namespace  App\Http\Controllers\Pm;


use Illuminate\Support\Facades\DB;

class HomeController extends BasePmController
{
    public function __construct()
    {

    }

    public function index()
    {
        //session()->put('success', '修改成功');
        $ret = DB::table('users')->get();
        dd($ret);
        return view('pm.home.index',[]);
    }
}
