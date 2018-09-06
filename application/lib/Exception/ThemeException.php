<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 上午10:57
 */

namespace app\lib\Exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定主体不存在，请检查主题ID';
    public $errorCode = 30000;
}