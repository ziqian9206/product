<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/4
 * Time: 下午6:25
 */

namespace app\api\model;


use think\Model;
//基类模型
class BaseModel extends Model
{
    protected function prefixImgUrl($value,$data){
        $finalUrl = $value;
        if($data['from'] == 1){
            $finalUrl = config('setting.img_prefix').$value;
        }
        //拼合路径
        return $finalUrl;
    }
}