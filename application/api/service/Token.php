<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/6
 * Time: 上午11:42
 */
namespace app\api\service;
class Token
{
    public static function generateToken()
    {
        $randChar = getRandChar(32);
        //时间戳，tp5内置方法
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //盐，随机字符串
        $tokenSalt = config('secure.token_salt');

        //md5加密
        return md5($randChar.$timestamp.$tokenSalt);
    }
}