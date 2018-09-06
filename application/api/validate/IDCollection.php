<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 上午9:14
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule =[
        'ids'=>"require|checkIDs"
    ];

    protected $message = [
        "ids"=>'ids参数必须以逗号分隔的多个正整数'
    ];
    protected function checkIDs($value){
        $values = explode(',',$value);
        if(empty($values)){
            return false;
        }
        foreach($values as $id){
            if(!$this->isPositiveInteger($id)){
                return false;
            }
        }

        return true;
    }
}