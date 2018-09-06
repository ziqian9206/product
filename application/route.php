<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];
use think\Route;
Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello', 'sample/Test/hello');
Route::get('hello/:name', 'index/hello');

//banner模块
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');
//模块名/控制器名.类名/模块方法

Route::get('api/:version/theme','api/:version.Theme/getSimpleList');

Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');

Route::get('api/:version/product/recent','api/:version.Product/getRecent');
Route::get('api/:version/product/by_category','api/:version.Product/getAllInCategory');
Route::get('api/:version/product/:id','api/:version.Product/getOne');

Route::get('api/:version/category/all','api/:version.Category/getAllCategories');

Route::post('api/:version/Token/user','api/:version.Token/getToken');

return [

];
//路由动态注册和配置
//路由表达式，路由地址，请求类型，路由参数，变量规则
//url方法
//PATH_INFO 混合模式 强制使用路由