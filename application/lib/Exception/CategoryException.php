<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 下午3:53
 */

namespace app\lib\Exception;


class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = "指定类目不存在，请检查参数";
    public $errorCode = 50000;
}