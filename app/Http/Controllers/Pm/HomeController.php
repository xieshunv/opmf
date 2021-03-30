<?php

namespace  App\Http\Controllers\Pm;


class HomeController extends PmBaseController
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('pm.home.index',[]);
    }
}
