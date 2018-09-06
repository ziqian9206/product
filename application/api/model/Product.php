<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 上午12:27
 */

namespace app\api\model;
use think\Model;

class Product extends BaseModel
{
    protected $hidden = ['delete_time','update_time','main_img_id','pivot','from','category_id','create_time','summary'];


    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
    public function imgs(){
        return $this->hasMany('ProductImage','product_id','id');
    }
    public function properties(){
       return $this->hasMany('ProductProperty','product_id','id');
    }
    public static function getMostRecent($count){
        //独立数据库，不用关联
        $products = self::limit($count)->order('create_time desc')->select();
        return $products;
    }
    public static function getProductsByCategoryID($categoryID){
        $products = self::where('category_id','=',$categoryID)->select();
        return $products;
    }
    public static function getProductDetail($id){
        $products = self::with('imgs,properties')->find($id);
        return $products;
    }
}