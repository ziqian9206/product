<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/8/30
 * Time: 下午11:15
 */

namespace app\lib\Exception;
use think\Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

//异常1.向用户返回信息，不需要日志baseException
//异常2.系统异常 需要日志

//抛出的异常跑到这
class ExceptionHandler extends Handle
{
    //异常通过render渲染，返回客户端
    //修改handle，config.php中覆盖父类

    public $code = 404;
    public $msg = "请求不存在";
    public $errorCode = 40000;

    public function render(\Exception $e){
        if($e instanceof BaseException){
            //如果是自定义异常，返回客户端消息，请求url路径、状态码、错误提示信息、errorcode
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else{
            //服务器内部错误
           //config('app_debug')从配置文件中读取数据，自定义返回自定义数据
            if(config('app_debug')){
                return parent::render($e);
            }else{
                $this->recordErrorlog($e);
                $this->code = 500;
                $this->msg = "服务器内部错误哎";
                $this->errorCode = 999;
            }

        }
        $request=Request::instance();
        $result = [
            'msg'=>$this->msg,
            'error_code' => $this->errorCode,
            'request_url'=>$request->url()
        ];
        return json($result,$this->code);
    }
    private function recordErrorlog(Exception $e){
        Log::init([
            "type"=>'File',
            'path'=>LOG_PATH,
            'level'=>['error']
        ]);
        Log::record($e->getMessage(),'error');
    }
}

//=>数组中key value对应关系
//->引用类型实例的方法和属性
//：：类中静态方法和静态属性的引用
//self是引用静态类名，$this是引用非静态类的实例名