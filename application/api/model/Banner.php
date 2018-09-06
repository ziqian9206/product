<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/8/30
 * Time: 下午5:20
 */
//php think make:model api/Image 创建模型


namespace app\api\model;
use think\Db;
use think\Exception;
use think\Model;
use \app\api\model\BannerItem;

//banner_item 用过banner_id和banner表连在一起

//模型类名和数据库表名相同，就是对象的映射
class Banner extends BaseModel
{
    /** /**+回车
     * @param $id
     * @return string
     * protected $table = "数据库中表名"
     */

    public function items(){
        //hasMany('关联模型名','关联模型外键名','当前模型主键名',['模型别名定义']);
        return $this->hasMany('BannerItem','banner_id','id');
    }


    public static function getBannerById($id){

        //todo:根据bannerid 返回banner信息
//        try{
//            1/0;
//        }catch(Exception $ex){
//                throw $ex;
//        }
//
//        return "111";
        //return null;//null在rest是异常
        //id参数为数据库查询条件，调用数据库数据，

        //$result = Db::query('select * from banner_item where img_id=?',[3]);


        //查询数据集使用：find返回数组，select返回二维数组。
        //where（字段名，表达式，查询条件）。数组法。闭包(匿名函数where(function($query){$query->where('banner_id','=',$id)}))
//        $result = Db::table('banner_item')->where('banner_id',"=",$id)->select();
//        return $result;
        //$banner = BannerModel::with('items','items.img')->find($id);



        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
    }
}