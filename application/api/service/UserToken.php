<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 下午6:17
 */
//复杂业务,code要从小程序中调用
namespace app\api\service;
use app\api\model\User as UserModel;

use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;
use think\Model;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;
    function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);
    }

    public function get($code){
      //获得参数放到数据库里
       $result = curl_get($this->wxLoginUrl);
       $wxResult = json_decode($result,true);
       if(empty($wxResult)){
           throw new \think\Exception("获取openID和sessionKey异常");
       }else{
           // 建议用明确的变量来表示是否成功
           // 微信服务器并不会将错误标记为400，无论成功还是失败都标记成200
           // 这样非常不好判断，只能使用errcode是否存在来判断
           $loginFail = array_key_exists('errcode', $wxResult);
           if ($loginFail) {
               $this->processLoginError($wxResult);
           }
           else {
               return $this->grantToken($wxResult);
           }
       }

    }
    private function prepareCachedValue($wxResult,$uid){
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        $cachedValue['scope'] = 16;
        return $cachedValue;
    }

     private function grantToken($wxResult){
        //拿到openid，去数据库查找是否存在
         //存在则不处理，不存在则新增
         //z准备缓存数据，写入缓存
         //令牌返回客户端
         //key : 令牌 用令牌找到value：wxResult
         $openid =  $wxResult['openid'];
         $user = UserModel::getOpenID($openid);
         if($user){
             $uid = $user->id;
         }
         else{
             $uid = $this->newUser($openid);
         }
         $cachedValue=$this->prepareCachedValue($wxResult,$uid);
         $token = $this->saveTocache($cachedValue);
         return $token;
     }

     private function saveTocache($cachedValue){
        $key = self::generateToken();
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');

        $request = cache($key,$value,$expire_in);
        if(!$request){
            throw new TokenException([
                'msg'=>'服务器缓存异常',
                'errorCode'=>10005
            ]);
        }
        return $key;
     }
    private function newUser($openid){
        $user = UserModel::create([
            'openid'=>$openid
        ]);
        return $user->id;
    }
    private function processLoginError($wxResult){
        throw new WeChatException([
            //异常，微信返回一个json
           'msg'=>$wxResult['errmsg'],
            'errorCode' => $wxResult['errcode']
        ]);
    }
}