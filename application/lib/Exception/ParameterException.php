<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/8/31
 * Time: 下午6:48
 */

namespace app\lib\Exception;

//参数异常
class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}