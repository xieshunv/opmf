<?php

/**
 * ==============================================
 * 消息文本类
 * ----------------------------------------------
 * PHP version 7 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshunv <xieshun@lingxi360.cn>
 * @copyright： @2021 http://www.lingxi360.cn/
 * @version：   v1.0.0
 * @date:       2021/4/1 10:34 下午
 */

namespace App\Message;

class Tips
{
    public const USERNAME_EMPTY = '用户名不能为空';
    public const PASSWROD_EMPTY = '密码不能为空';
    public const CAPTCHA_EMPTY = '验证码不能为空';
    public const CAPTCHA_ERR = '验证码错误';
    public const USER_PASS_ERR = '用户名或密码错误';
    public const USER_LOGIN_INFO = '用户登录成功';

    public const PARAM_ERR = '访问异常,缺少';
    public const AJAX_SUCCESS = 'Success';

    public const FORM_TITLE_EMPTY = '表单名能为空';
    public const FORM_MODULE_EMPTY = '类型或别名能为空';

    public const SAVE_SUCCESS = '保存成功';
    public const SAVE_ERROR = '保存失败';
    public const DELETE_SUCCESS = '删除成功';
    public const DELETE_ERROR = '删除失败';
}
