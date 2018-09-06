<?php

namespace app\api\controller\v1;

use app\api\validate\IDCollection;
use app\api\validate\IDMustBePositiveInt;
use app\lib\Exception\ThemeException;
use think\Controller;
use think\Request;
use app\api\model\Theme as ThemeModel;

//z.cn/api/v1/theme?ids=0.1,2,3&XDEBUG_SESSION_START=11678

class Theme extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     * @url /theme?ids=id1,id2....
     * return一组theme模型
     */
    public function getSimpleList($ids=''){
        //异常，调用base异常的 getcheck
        (new IDCollection()) -> getCheck();
        $id = explode(',',$ids);
        $result = ThemeModel::with('topicImg,headImg')->select($ids);
        if($result->isEmpty()){
            throw new ThemeException();
        }
        return $result;
    }
    public function getComplexOne($id){
        (new IDMustBePositiveInt())->getCheck();
        $theme = ThemeModel::getThemeWithProducts($id);
        if(!$theme){
            throw new ThemeException();
        }
        return $theme;
    }
}
