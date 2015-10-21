<?php
namespace Home\Controller;
use Home\Model\IndexModel;
use Think\Controller;
class IndexController extends Controller {
	 /**
	 *读取区域下的商店
	 *继承Model下的区域方法
	 **/
	 public function index(){
	 	//实例话函数
     	$Index_area=new \Home\Model\IndexModel();
		//把取得区域赋值给模板
		$this->group_addre=$Index_area->Index_area('dlsgl_group','id,name');
		$this->group_shop=$Index_area->Area_shop();
      	$this->display();
    }
	/**
	 *读取商店
	 *继承Model下的区域方法
	 **/
	 public function ShopSort(){
	 	//实例话函数
     	$Index_area=new \Home\Model\IndexModel();
		//把取得区域赋值给模板
		$this->group_shop=$Index_area->Shop_sort();
		$this->display();
    }
	/**
	 *读取分类下的商品
	 *继承Model下的分类商品方法
	 **/
	  public function GoodsSort(){
	 	//实例话函数
     	$Index_area=new \Home\Model\IndexModel();
		//把取得区域赋值给模板
		$this->group_Goods=$Index_area->Goods_sort();
		$this->display();
    }
   	
}