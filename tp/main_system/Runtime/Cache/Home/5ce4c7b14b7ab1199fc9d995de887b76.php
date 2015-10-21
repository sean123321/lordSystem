<?php if (!defined('THINK_PATH')) exit();?>{include file="weixin_index/public_header.html"}
	<style>
		
		.content{
			width:98%;
		}
			
		.menus a{
			color:#41403b;
			display:block;
			padding:10px;
		}
		
		/*
			外层table
		*/
		.content .parent_table{
			margin-top:10px;
		}

		/*
			内层table
		*/
		.content .parent_table .child_table{
			margin-left:5px;
		}

		/*
			所有td 内容 靠左
		*/
		.content .parent_table td{
			text-align:left;
		}

		/*
			促销价格样式
		*/
		.content .parent_table table .zx_price{
			color:red;
			font-size:14px;
			font-weight:bold;
		}

		/*
			促销价格存在时
			原价样式
		*/
		.content .parent_table table .zx_s_price{
			font-size:13px;
			color:#d6d6d6;
			text-decoration:line-through;
		}

		/*
			促销价格不存在时
			原价样式
		*/
		.content .parent_table table .s_price{
			font-size:14px;
			color:#F28E00;
		}

		/*
			商品名称
		*/
		.content .parent_table table .goods_name{
			font-weight:bold;
		}

		/*
			商品描述
		*/
		.content .parent_table table .desc{
			font-size:14px;
		}
	
	</style>

	<div class="cut"></div>
	<div class="nav">
		{include file="weixin_index/public_user_nav.html"}
	</div>
	<div class="content">
		<?php echo ($str); ?>
		{if $page!==''}
			<?php echo ($page); ?>
		{/if}
	</div>
	
</div>
<script>
function add_cart(sp_id,goods_id,is_zd){
	$.ajax({
		type:'POST',
		url:'<?php echo ($url); ?>wx_index.php?act=add_cart_ajax',
		data:{
			'sp_id':sp_id,
			'goods_id':goods_id,
			'is_zd':is_zd,
			'num':1,
		},
		dataType:'json',
		success:function(msg){
			if(msg.status==1){
				$('#num').html(msg.data.count_cart_numbers);
			}else if(msg.status>1){
				dialog_jump(msg.info,'');
			}else{
				dialog_jump('操作失败，请重新尝试','');
			}
		},
		error:function(){
			dialog_jump('未知错误','');
		}
	});
}
</script>
{include file="weixin_index/public_footer.html"}