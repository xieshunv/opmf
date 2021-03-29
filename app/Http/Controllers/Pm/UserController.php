<?php

namespace  App\Http\Controllers\Pm;


class UserController extends PmBaseController
{
    public function __construct()
    {

    }

    public function login()
    {
        session()->put('success', '修改成功');
        return view("pm.user.login")
            ->with([
                'option'=>[
                    'site_description'=>'',
                    'keywords'=>'',
                ],
            ]);
    }
}
