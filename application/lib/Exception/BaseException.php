<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/8/30
 * Time: 下午11:29
 */

namespace app\lib\Exception;

//第一种异常
use think\Exception;
use Throwable;

class BaseException extends \Exception
{
    //http状态码
    public $code=400;
    //错误具体信息
    public $msg="参数错误";
    //自定义错误码
    public $errorCode=10000;
    //基类中编写构造函数，支持可选参数赋值
    public function __construct($params=[])
    {
        //判断传入参数
        if(!is_array($params)){
            return ;
            throw new Exception('参数必须数组');
        }
        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if(array_key_exists('msg',$params)){
            $this->code = $params['msg'];
        }
        if(array_key_exists('errorCode',$params)){
            $this->code = $params['erroCode'];
        }
    }
}