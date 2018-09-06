<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/8/30
 * Time: 下午12:24
 */

namespace app\api\validate;

use app\lib\Exception\ParameterException;
use think\Request;
use think\Validate;
use think\Exception;

//如果要获取当前的请求信息，可以使用\think\Request类，$request = Request::instance();
class BaseValidate extends Validate
{
    public function getCheck(){
        //获取http传入的变量参数
        //对参数做检验,是否为正
        $request = Request::instance();
        $params = $request->param();
        $result = $this->batch()->check($params);
        if(!$result){
            $e = new ParameterException([
                'msg'=>$this->error，
            ]);
            throw $e;
//            $error = $this->error;
//            throw new Exception($error);
        }

        return true;

    }

    protected function isPositiveInteger($value,$rule='',$date='',$field=''){
        //判断是否数字、整形、大于0，则id是正整数
        if(is_numeric($value) && is_int($value + 0)&&($value+0)>0){
            return true;
        }else{
            return $field."必须正整数";
        }
    }
}

//$this->error是validate验证器中拿到的信息
//面向对象，实例化初始化操作