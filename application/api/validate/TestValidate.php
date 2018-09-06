<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/8/30
 * Time: 上午9:20
 */

namespace app\api\validate;
use think\Validate;

class TestValidate extends Validate
{
    public $rule = [
      'name' => 'require|max:10',
      'email' =>'email'
    ];
}



//引入其他模块：$validate = new \app\api\validate\TestValidate();