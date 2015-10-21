<?php
/**
	 *初始化
	 *
	 **/
namespace Home\Model;
use Think\Model;
class IndexModel extends Model{
	protected $tableName = 'dlsgl_group';
	/**
	 *查询表
	 *$Table 表名称,$File查询的字段名称
	 **/
	public function index_area($tableName,$File){
		//实例化User模型
		$Area_group = M($tableName);
		//执行其他的数据操作
		return $Area_group->field($File)->select();
	}		
	/**
	 *联合查询数据表
	 *dp_info商铺表
	 **/
	public function Area_shop(){
		$Table_name=M('dp_info');		
		return $list=$Table_name->table('ecs_dp_info a,ecs_user_position b')->where("a.uid=b.u_id")->field('a.id,a.name,b.g_id')->select();
	} 
	/**
	 *查询商铺下的分类
	 **/
	 public function Shop_sort(){
	 	$all_sort=array();
		$Table_name=M('category');
		//查询一级分类
		$First_group = $Table_name->field('cat_id,cat_name,parent_id')->where('parent_id=0&&is_show=1')->order('sort_order asc')->select(); 
	 	//查询二级的
		foreach($First_group as $k=>$First_group_date){
			$Clidren_id=$First_group_date['cat_id'];
			$all_sort[$k]['cat_id']=$First_group_date['cat_id'];
			$all_sort[$k]['cat_name']=$First_group_date['cat_name'];
			$Second_group = $Table_name->field('cat_id,cat_name,parent_id')->where("parent_id=$Clidren_id&&is_show=1")->order('sort_order asc')->select(); 
			foreach($Second_group as $k_t=>$Second_group_date){
			//组合二级分类
				$all_sort[$k]['list'][]=array('cat_id'=>$Second_group_date['cat_id'],'cat_name'=>$Second_group_date['cat_name']);
			}
		}
		return $all_sort;
		
	 }
	 /**
	 *查询分类下的商品
	 **/
	 public function Goods_sort(){
	 	$Table_name=M('goods');
		//获取url变量
		$category_goods=isset($_GET['category_goods'])?$_GET['category_goods']:"";
		$type=isset($_GET['type'])?$_GET['type']:"";
		
		
		
		
	 }
	 
}