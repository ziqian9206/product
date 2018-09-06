<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 下午2:24
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule=[
        'count' => 'isPositiveInteger|between:1,15'
    ];
}