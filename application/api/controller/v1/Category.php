<?php
/**
 * Created by PhpStorm.
 * User: ziqianwang
 * Date: 2018/9/5
 * Time: 下午3:41
 */

namespace app\api\controller\v1;
use app\api\model\Category as CategoryModel;
use app\lib\Exception\CategoryException;

class Category
{
 public function getAllCategories(){
   $catetories = CategoryModel::all([],'img');
   if($catetories->isEmpty()){
       throw new CategoryException();
   }
   return $catetories;
 }
}