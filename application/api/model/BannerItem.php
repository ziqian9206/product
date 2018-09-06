<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/4
 * Time: 上午10:56
 */

namespace app\api\model;


use think\Model;

class BannerItem extends BaseModel
{
    public function img(){
        //一对一 belongsto image和banner_item  本模型关联数据库的image，再关联img_ id   hasOne都是一对一,没有外键用
        return $this->belongsTo('Image','img_id','id');
    }
}