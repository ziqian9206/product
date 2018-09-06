<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/6
 * Time: 下午4:06
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['delete_time','img_id','product_id'];
    public function imgUrl(){
        return $this->belongsTo('Image','img_id','id');
    }
}