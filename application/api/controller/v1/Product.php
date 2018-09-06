<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 下午2:22
 */

namespace app\api\controller\v1;
use app\api\model\Product as ProductModel;
//z.cn/api/v1/product/recent?count=1&XDEBUG_SESSION_START=18382

use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;

class Product
{
    public function getRecent($count=15){
        (new Count())->getCheck();
        $products = ProductModel::getMostRecent($count);
        if($products->isEmpty()){
            throw new ProductException();
        }

        $products = $products -> hidden(['summary']);
        return $products;
    }
    public function getAllInCategory($id){
        (new IDMustBePositiveInt())->getCheck();
        $products = ProductModel::getProductsByCategoryID($id);
        if($products->isEmpty()){
            throw new ProductException();
        }
        return $products;
    }
    public function getOne($id){
        (new IDMustBePositiveInt())->getCheck();
        $product = ProductModel::getProductDetail($id);
        if($product){
            throw new ProductException();
        }
        return $product;
    }
}