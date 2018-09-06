<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 下午6:07
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code' =>'require|isNotEmpty'
    ];
    protected $message = [
        'code'=>'没有code不能校验Token'
    ];
}