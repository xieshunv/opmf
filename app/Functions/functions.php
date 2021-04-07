<?php
/**
 * ==============================================
 * 公共方法
 * ----------------------------------------------
 * PHP version 7 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshun <xieshun@lingxi360.com>
 * @copyright： @2021 http://www.lingxi360.com.com/
 * @version：   v1.0.0
 * @date:       2021-04-01 22:40
 */

/**
 * 登录用户信息
 * @return mixed
 */
if (!function_exists('login_user')) {
    function login_user()
    {
        return session()->get('login_user',[]);
    }
}

/**
 * 随机字符
 */
if (!function_exists('getRandomStr')) {
    function getRandomStr($len = 8)
    {
        $str = "";
        $str_pol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($str_pol) - 1;
        for ($i = 0; $i < $len; $i++) {
            $str .= $str_pol[mt_rand(0, $max)];
        }
        return $str;
    }
}

/**
 * 是否Json格式
 */
if (!function_exists('isJson')) {
    function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
