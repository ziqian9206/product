<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/6
 * Time: 上午10:06
 */

namespace app\lib\Exception;


class WeChatException extends BaseException
{
    public $code = 400;
    public $msg = "微信接口调用失败";
    public $errorCode = 999;
}