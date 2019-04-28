<?php

namespace App\Http\Controllers\Goods;

use DemeterChain\C;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Goods;

class GoodsController extends Controller
{
    //定义静态属性 ，做递归
    protected static $arrCate;

    //主页下的分类跳转数据
    public function cateshops($id)
    {
        //分类
        $catemodel=new Cate;
        $cate=$catemodel->where('pid','=',0)->get();
        //商品
        $goodsmodel=new Goods;
        $this->getCateIdInfo($id);
        $arr=self::$arrCate;
        $data=$goodsmodel->where('is_up','=',1)->whereIn('cate_id',$arr)->orderBy('update_time','desc')->get();
        return view('allshops',['data'=>$data],['cate'=>$cate])
            ->with('id',$id);
    }

    //分类下的商品
    public function cateshop(Request $request)
    {
        $cate_id=$request->input('cate_id');
        $this->getCateIdInfo($cate_id);
        $cateId=self::$arrCate;
        $goodsmodel=new Goods;
        $data=$goodsmodel->where('is_up','=',1)->whereIn('cate_id',$cateId)->orderBy('update_time','desc')->get();
        return view('div',['data'=>$data]);
    }
    //递归查询主分类下子类
    private function getCateIdInfo($cate_id){
        //分类
        $catemodel=new Cate;
        $cateinfo=$catemodel->select('cate_id')->where('pid',$cate_id)->get();
        if(count($cateinfo)!=0){
            foreach ($cateinfo as $k =>$v){
                $cateid=$v->cate_id;
                $cateIds=$this->getCateIdInfo($cateid);
                self::$arrCate[]=$cateIds;
            }
        }else{
            return $cate_id;
        }
    }

    //点击排序搜索
    public function sortshop(Request $request)
    {
        $goodsmodel=new Goods;
        $cate_id=$request->input('cate_id');
        $type=$request->input('_type');
        $top=$request->input('top');
        if($top=='↑'){
            $top='asc';
        }else{
            $top='desc';
        }
        if($cate_id==0){
            $data=$goodsmodel->where('is_up','=',1)->orderBy($type,$top)->get();
        }else{
            $this->getCateIdInfo($cate_id);
            $cateId=self::$arrCate;
            $data=$goodsmodel->where('is_up','=',1)->whereIn('cate_id',$cateId)->orderBy($type,$top)->get();
        }
        return view('div',['data'=>$data]);
    }


}
