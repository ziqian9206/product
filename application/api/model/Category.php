<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 下午3:42
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time','update_time','create_time'];
    public function Img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
}