<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 下午6:15
 */

namespace app\api\model;

//self静态类
class User extends BaseModel
{
    public static function getOpenID($openid){
        $user = self::where('openid','=',$openid)->find();
        return $user;
    }
}