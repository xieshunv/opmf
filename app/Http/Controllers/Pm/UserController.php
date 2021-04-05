<?php
/**
 * ==============================================
 * 用户管理
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

use App\Repositories\Pm\UsersRepositories;
use App\Exceptions\OpmfException;
use Illuminate\Support\Facades\Log;
use App\Message\Tips;

class UserController extends BasePmController
{
    /**
     * @var UsersRepositories
     */
    private $usersRep;

    public function __construct()
    {
        parent::__construct();
        $this->usersRep = app(UsersRepositories::class);
    }

    /**
     * 用户登陆页
     */
    public function login()
    {
        if (login_user()) {
            return redirect('/');
        }
        return view("pm.user.login", [
            'ref'=>request()->get('ref','/')
        ]);
    }

    /**
     * 登陆验证
     */
    public function sign()
    {
        //接收参数
        $param = request()->only('password', 'username', 'captcha');
        //验证规则
        $rules = ['username' => 'required', 'password' => 'required', 'captcha' => 'required'];
        //提示信息
        $messages = [
            'username.*' => Tips::USERNAME_EMPTY,
            'password.*' => Tips::PASSWROD_EMPTY,
            'captcha.*' => Tips::CAPTCHA_EMPTY
        ];

        $checkRet = $this->paramValidate($param, $rules, $messages, $errorMsg);
        if (false === $checkRet) {
            session()->put('error', $errorMsg);
            return redirect('/login');
        }

        //验证码
        if (!captcha_check($param['captcha'])) {
            session()->put('error', Tips::CAPTCHA_ERR);
            return redirect('/login');
        }

        //校验用户名和密码
        try {
            $this->usersRep->doLoginRep($param);
            $ref = request()->get('ref','/');
            return redirect($ref);
        } catch (OpmfException $e) {
            $messages = $e->getMessage();
            Log::warning('[Pm UserController] sign warning', [
                'messages' => $messages,
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            session()->put('error', $messages);
            return redirect('/login');
        }
    }

    /**
     * 个人设置
     */
    public function profile()
    {
    }

    public function profileSave()
    {
    }

    /**
     * 修改密码
     */
    public function pwd()
    {

    }

    public function pwdSave()
    {

    }

    /**
     * 退出系统
     */
    public function logout()
    {
        //清除session
        session()->forget('login_user');
        //跳转到登录页
        return redirect('/login');
    }

}
