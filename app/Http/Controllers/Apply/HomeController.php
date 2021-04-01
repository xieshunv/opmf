<?php

namespace  App\Http\Controllers\Apply;


class HomeController extends BaseApplyController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        dd('apply/home/index');
    }
}
