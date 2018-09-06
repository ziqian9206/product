<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/4
 * Time: 上午11:29
 */

namespace app\api\model;


use think\Model;

class Image extends BaseModel
{
    //隐藏字段，不用返回客户端
    protected $hidden = ['id','from','delete_time','update_time'];
    public function getUrlAttr($url,$data){
        return $this->prefixImgUrl($url,$data);
    }
}