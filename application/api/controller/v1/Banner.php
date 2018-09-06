<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/8/24
 * Time: 上午10:34
 */

namespace app\api\controller\v1;

//class Banner
//{
////    获取指定的banner信息。知道获取的哪里的banner，所以要$id
//    /**http://z.cn/Banner/1?XDEBUG_SESSION_START=16091 z.cn/api/v1/banner/1?
//     * @param $id Banner的Id号 ，
//     * 2.客户端参数，不可信，所以需要参数校验
//     * validate 独立验证、验证器
//     * 3.url /banner/id
//     * 4.http：get
//     * 5.require tp5内置规则
//     */
//    public function getBanner($id)
//    {
//
//        //input(get.name);input("post.age")
//        //要验证的数据
//        $data = [
//            'id' => $id
//            "name" => "vendor11111111111111",
//            'email' => 'vendorqq.com'
//        ];
//
//        $validate = new Validate([
//            'id' => ''
//            'name' => "require|max:10",
//            'email' => 'email'
//        ]);
//        //$validate = new \app\api\validate\TestValidate();
//        //tp5验证check  $result = $validate->check($data);
//        //var_dump是输出数组，echo输出字符串
//        // $result = $validate->batch()->check($data);
//        //var_dump($validate->getError());
//
//        (new \app\api\validate\IDMustBePositiveInt())->getCheck();
//        $c = 1;
//        $result = $validate -> batch()->check($data);
//
//        if($result){
//
//        }else{
//
//        }
//    }
//}
//异常：1.数据库异常没有正确结果，要对错误进行处理
//banner id不存在，异常捕获，处理，记录日志/修复异常，返回客户端错误


use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\Exception\BannerMissException;
use app\lib\Exception\BaseException;
use think\Exception;

class Banner{
    /**
     * @param $id
     * @throws \think\Exception
     */
    public  function getBanner($id){
        //判断是否为正整数
        (new IDMustBePositiveInt())->getCheck();

        //通过ID获取数据库里的数据 ，bannermodel返回模型对象。1.静态方法调用。2.实例化调用.模型查询最好用1静态调用方式
   // $banner = BannerModel::with(['items','items.img'])->find($id);


        $banner = BannerModel::getBannerById($id);


//        $banner = new BannerModel();
//        $banner = $banner->get($id);

        //查询方法 get(一个 模型) find(一个 db) all(一组 模型) select(一组 db)

       // $banner = BannerModel::getBannerById($id);自定义
        if(!$banner){
            //throw new BannerMissException();
            throw new BannerMissException();
        }
        //读取自定义配置文件 图片基地址和文件路径
       $c = config('setting.img_prefix');
        return $banner;
    }
}