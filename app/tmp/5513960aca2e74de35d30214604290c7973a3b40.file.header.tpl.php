<?php /* Smarty version Smarty-3.1.15, created on 2014-05-18 11:51:11
         compiled from "E:\WWW\tucao\app\view\lib\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:257453782e2f4b0a61-58566434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5513960aca2e74de35d30214604290c7973a3b40' => 
    array (
      0 => 'E:\\WWW\\tucao\\app\\view\\lib\\header.tpl',
      1 => 1400212287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '257453782e2f4b0a61-58566434',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53782e2f4fae04_08794340',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53782e2f4fae04_08794340')) {function content_53782e2f4fae04_08794340($_smarty_tpl) {?>	
		<!--头部开始-->
		<div class="header nolog-header" id="header">
	<div class="my-header">
		<div class="my-header-logo">
			<div class="my-header-logo-top"></div>
			<div class="my-header-logo-main">
				<a target="_self" href="http://www.daygua.com/" onfocus="this.blur()"><img title="天瓜" src="/static/images/dayguaLogo.png"></a>
			</div>
			<div class="my-header-logo-bottom"></div>
		</div>
		<div class="my-header-nav">
			<a target="_self" href="http://www.daygua.com/" onfocus="this.blur()" class="a hdr-link cur">首页</a>
	    	<a target="_self" href="http://www.daygua.com/top" onfocus="this.blur()" class="a hdr-link ">阅读排行</a>
	    	<a target="_self" href="http://www.daygua.com/random" onfocus="this.blur()" class="a hdr-link">随缘</a>
		</div>
		<div class="my-header-point">
			<div class="my-header-point-top">
				<div class="top-point">
					<div class="main-point-left">
						<div class="point-num" id="point-counter">116,075.00</div>
						<div class="point-zan">次点赞</div>
					</div>
					<div class="main-point-right">
						<div class="point-button">
							<button id="point_myzan" onfocus="this.blur()" onclick="pointCount(&#39;point&#39;)" type="button" class="point-Myzan"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="my-header-point-bottom">
				<div class="bottom-point">
					<div class="main-point-left">
						<div class="point-num" id="collect-counter">102,950.00</div>
						<div class="point-zan">次收藏</div>
					</div>
					<div class="main-point-right">
						<div class="point-button">
							<button id="point_mycollect" onfocus="this.blur()" onclick="pointCount(&#39;collect&#39;)" type="button" class="point-Mycollect"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>		<!--头部结束-->
<?php }} ?>
