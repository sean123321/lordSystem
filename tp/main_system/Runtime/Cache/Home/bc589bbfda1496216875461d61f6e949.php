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

<div class="cut"></div>
	<div class="nav"></div>
	<div class="content">
		<ul>
			<?php if(is_array($group_addre)): $i = 0; $__LIST__ = $group_addre;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area_list): $mod = ($i % 2 );++$i;?><li>
				<span class="b_type"><?php echo ($area_list["name"]); ?></span>
				<span>
					<ul>
						<?php if(is_array($group_shop)): foreach($group_shop as $key=>$shop_date): if(in_array(($area_list['id']), is_array($shop_date['g_id'])?$shop_date['g_id']:explode(',',$shop_date['g_id']))): ?><li><a href="index.php/Home/Index/ShopSort/shop_id/<?php echo ($shop_date["id"]); ?>"><?php echo ($shop_date["name"]); ?></a></li><?php endif; endforeach; endif; ?>
					</ul>
				</span>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<div style="clear:both;height:70px;">
	</div>
</div>
</body>
</html>