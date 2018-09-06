<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 下午3:05
 */

namespace app\lib\Exception;


class ProductException
{
    public $code = 404;
    public $msg = "指定的商品不存在，请检查参数";
    public $errorCode = 20000;
}