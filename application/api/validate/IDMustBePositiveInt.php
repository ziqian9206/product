<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/8/30
 * Time: 上午10:36
 */

namespace app\api\validate;

use think\Validate;

class IDMustBePositiveInt extends BaseValidate
{
    protected $rule=[
        'id'=>'require|isPositiveInteger'
    ];
    //自定义验证规则
//    protected function isPositiveInteger($value,$rule='',$date='',$field=''){
//        //判断是否数字、整形、大于0，则id是正整数
//        if(is_numeric($value) && is_int($value + 0)&&($value+0)>0){
//            return true;
//        }else{
//            return $field."必须正整数";
//        }
//    }
    protected $message=[
            "id" =>"id必须是正整数"
        ];


}