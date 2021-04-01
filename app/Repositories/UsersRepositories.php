<?php
/**
 * ==============================================
 * 文件描述
 * ----------------------------------------------
 * PHP version 7 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshunv <xieshun@lingxi360.cn>
 * @copyright： @2021 http://www.lingxi360.cn/
 * @version：   v1.0.0
 * @date:       2021/4/1 10:06 下午
 */
namespace  App\Repositories;

use App\Models\Users;
use App\Message\Tips;
use App\Exceptions\OpmfException;

class UsersRepositories extends BaseRepositories
{
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
        throw  new OpmfException('该手机已注册，请登录');
    }

}
