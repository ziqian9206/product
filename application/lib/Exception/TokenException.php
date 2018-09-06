<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/6
 * Time: 下午12:18
 */

namespace app\lib\Exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = "无效Token";
    public $errorCode = 10001;
}