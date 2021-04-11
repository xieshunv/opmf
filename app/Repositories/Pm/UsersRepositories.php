<?php

/**
 * ==============================================
 * pm端 账户相关操作
 * ----------------------------------------------
 * PHP version 7 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshunv <xieshun@lingxi360.cn>
 * @copyright： @2021 http://www.lingxi360.cn/
 * @version：   v1.0.0
 * @date:       2021/4/1 10:06 下午
 */

namespace App\Repositories\Pm;

use App\Models\Users;
use App\Message\Tips;
use Carbon\Carbon;
use App\Repositories\BaseRepositories;
use App\Exceptions\OpmfException;

class UsersRepositories extends BaseRepositories
{
    /**
     * 密码 secret
     */
    public const SECRET_KEY = '@4!@#$%@';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  用户登陆
     * @param array $user
     * @throws OpmfException
     */
    public function doLoginRep(array $user)
    {
        //用户是否存在
        $userInfo = Users::query()
            ->where([
                'email' => $user['username'],
                'password' => $this->genPassword($user['password']),
                'is_enabled' => 'Y'
            ])
            ->first();
        if (empty($userInfo)) {
            throw  new OpmfException(Tips::USER_PASS_ERR);
        }

        //更新登录信息
        $setInfo = [
            'last_at' => Carbon::now(),
            'last_ip' => request()->ip()
        ];
        Users::query()->where(['id' => $userInfo['id']])->update($setInfo);
        // 将信息保存到SESSION
        session()->put('login_user', $userInfo->toArray());
        session()->put('success', Tips::USER_LOGIN_INFO);

        return true;
    }

    /**
     * @param String $pwd
     * @return string
     */
    public function genPassword(string $pwd)
    {
        return md5($pwd . self::SECRET_KEY);
    }
}
