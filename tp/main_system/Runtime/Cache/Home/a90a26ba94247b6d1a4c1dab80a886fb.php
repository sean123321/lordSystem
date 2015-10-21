<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<title>一家人购物网</title>
<link rel="stylesheet" type="text/css" href="/tp/main_system/Home/View/Index/css/index.css" />
<!-- ./js/jquery.1.8.2.js -->
<script type="text/javascript" src="/tp/main_system/Home/View/Index/js/jquery.1.8.2.js"></script>
<script type="text/javascript" src="/tp/main_system/Home/View/Index/js/layer.min.js"></script>
<script type="text/javascript" src="/tp/main_system/Home/View/Index/js/my_layer.js"></script>
<script type="text/javascript">
	//微信使用
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
		WeixinJSBridge.call('hideOptionMenu');
		WeixinJSBridge.call('hideToolbar');
	});
	
	/*
		弹框之确认框
		@param string content 需要提示的内容
		@param functiong ajax 执行的函数体 如 functon test(){alert(123);} dialog_confirm('测试确认框',test);
	*/
	function dialog_confirm(content,ajax){
		$.layer({
			type: 0,
			title:'提示消息',
			area: ['250px', 'auto'],
			fix:true,
			dialog: {
				btns: 2,
				btn: ['确定', '取消'],
				yes:function(index){
					ajax();
				},
				no:function(index){
					layer.close(index);
				},
				type: 0,
				msg: '<div style="margin-left:30px;">'+content+'</div>'
			}
		});
	}
</script>
</head>
<body>
<div id="main">
	<div class="head">
		<span class="logo"><a href="<?php echo ($url); ?>wx_index.php?act=index_list_w"><img src="./image/logo_res.gif" alt="logo" height="36"/></a></span>
		<span class="home"><a href="<?php echo ($url); ?>wx_index.php?act=dp_info"><img src="./image/home.gif" alt="home"/></a></span>
	</div>
<link rel="stylesheet" type="text/css" href="/tp/main_system/Home/View/Index/css/index_shop_group.css" />
	<div class="cut"></div>
	<div class="nav">
	<!--���õײ����ﳵҳ��-->
		<style>
		.menus{
			position:fixed;
			left:0px;
			bottom:0px;
			width:100%;
		}
		.menus a{
			color:#41403b;
			display:block;
			padding:10px;
		}
		.menus table{
			text-align:center;
		}
		.menus table{
			font-size:18px;
			line-height:25px;
		}
	</style>
	<span class="menus">
		<table width="100%" border="0" bgcolor="#cccccc" cellspacing="1" cellpadding="10">
		
			<td >
				<a href="<?php echo ($url); ?>wx_index.php?act=index_cp_list&zx=1">促销</a>
			</td>
			
			<td >
				<a href="<?php echo ($url); ?>wx_index.php?act=index_cp_list&category=1">全部</a>
			</td>
			
			<td >
				<a href="<?php echo ($url); ?>wx_index.php?act=index_cp_list&search=1">
					<img src="./image/2222.png" width="25"/>
				</a>
			</td>
			
			<td 
				onclick="location.href='<?php echo ($url); ?>wx_index.php?act=index_cp_list&cart=1'">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" valign="middle">
					<tr>
						<td width="50%" align="right" valign="middle">
							<img src="./image/1111.png" width="25"/>
						</td>
						<td width="50%" align="left" valign="top">
							(<span color="red" id="num"><?php echo ($shop_num); ?></span>)
						</td>
					</tr>
				</table>
			</td>
			
			<td>
				<a href="<?php echo ($url); ?>wx_index.php?act=ucenter">
					我的订单
				</a>
			</td>
			
		</table>
	</span>

	<!--���õײ����ﳵҳ��-->
	</div>
	<div class="content">
		<ul>
			<?php if(is_array($group_shop)): foreach($group_shop as $key=>$shop_date): ?><li>
				<span class="b_type"><b><?php echo ($shop_date["cat_name"]); ?></b></span>
				<span>
					<ul>
						<?php if(is_array($shop_date["list"])): foreach($shop_date["list"] as $key=>$Second_date): ?><li><a href="/tp/index.php/Home/Index/GoodsSort/category_goods/1/type/<?php echo ($Second_date["cat_id"]); ?>"><?php echo ($Second_date["cat_name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</span>
			</li><?php endforeach; endif; ?>
		</ul>
	</div>
	<div style="clear:both;height:70px;">
	</div>
</div>
</body>
</html>