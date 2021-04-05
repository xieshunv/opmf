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
    const USERNAME_EMPTY = '用户名不能为空';
    const PASSWROD_EMPTY = '密码不能为空';
    const CAPTCHA_EMPTY = '验证码不能为空';
    const CAPTCHA_ERR = '验证码错误';
    const USER_PASS_ERR = '用户名或密码错误';
    const USER_LOGIN_INFO = '用户登录成功';

    const PARAM_ERR = '访问异常,缺少';
    const AJAX_SUCCESS = 'Success';

    const FORM_TITLE_EMPTY = '表单名能为空';
    const FORM_MODULE_EMPTY = '类型或别名能为空';

    const SAVE_SUCCESS = '保存成功';
}
