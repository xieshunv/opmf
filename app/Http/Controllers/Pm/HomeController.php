<?php

namespace  App\Http\Controllers\Pm;


class HomeController extends PmBaseController
{
    public function __construct()
    {

    }

    public function index()
    {
        session()->put('success', '修改成功');
        return view('pm.home.index',[]);
    }
}
