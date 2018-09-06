<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 下午6:05
 */



//controller Token  Model User/UserToken  validate TokenGet
namespace app\api\controller\v1;

use app\api\validate\TokenGet;
use app\api\service\UserToken;
class Token
{
    public function getToken($code=''){
        (new TokenGet())->getCheck();
        $ut = new UserToken($code);
        $token = $ut->get();
        return[
         'token'=>$token
        ];
    }
}

//申请令牌 ，支付，发货