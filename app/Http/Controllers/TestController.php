<?php

namespace App\Http\Controllers;


class TestController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        dd('/test/index');
    }
}
