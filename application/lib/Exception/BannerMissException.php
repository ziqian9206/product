<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/8/30
 * Time: 下午11:43
 */

namespace app\lib\Exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = "请求不存在";
    public $errorCode = 40000;
}