<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo ($title); ?>-我的网站</title>
<meta name="keywords" content="<?php echo ($keywords); ?>" />
<meta name="description" content="<?php echo ($description); ?>" />
<script type="text/javascript" src="/Data/static/js/jquery-1.12.4.min.js" ></script>
<link href="/Public/Home/default/css/css.css?2017" rel="stylesheet" type="text/css" />
</head>

<body>
<!--top -->
<div id="top">
<script type="text/javascript">
$(function(){
	var $chkurl = "<?php echo U('Public/loginChk');?>";
	$.get($chkurl,function(data){
		//alert(data);
		if (data.status == 1) {
			$('#top_login_ok').show();
			$('#top_login_no').hide();
			//$('#top_login_ok').find('span');
			$('#top_login_ok>span').html('欢迎您，'+data.nickname);
		}else {			
			$('#top_login_ok').hide();
			$('#top_login_no').show();
		}
	},'json');	
});
</script>
<div class="warp" id="herd">
	<div id="top_fla">
	</div>
	<div id="top_member">
		<!--<a href="<?php echo U(MODULE_NAME.'/Product/basket');?>">购物车</a>-->
		<div id="top_login_no">
		<a href="<?php echo U(MODULE_NAME.'/Public/register');?>">会员注册</a>	
		<a href="<?php echo U(MODULE_NAME.'/Public/login');?>">会员登录</a>	
		<span>欢迎您，游客！您可以选择</span>	
		</div>
		<div id="top_login_ok" style="display:none;">
		<a href="<?php echo U(MODULE_NAME.'/Member/index');?>">会员中心</a>	
		<a href="<?php echo U(MODULE_NAME.'/Public/logout');?>">安全退出</a>
		<span>欢迎您， </span>
		</div>
			
	</div>
	<div id="top_logo"><a href="http://www.gohosts.com:8081"></a></div>
</div>
<!--menu -->
<div id="menu">
	<ul>
		<li><a href="http://www.gohosts.com:8081">首 页</a></li>
		<?php
 $_typeid = intval('0'); if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_navlist = get_category(1); if($_typeid == 0) { $_navlist = \Common\Lib\Category::toLayer($_navlist); }else { $_navlist = \Common\Lib\Category::toLayer($_navlist, 'child', $_typeid); } foreach($_navlist as $autoindex => $navlist): $navlist['url'] = get_url($navlist); ?><li><a href='<?php echo ($navlist["url"]); ?>'><?php echo ($navlist["name"]); ?></a>
			<?php if(!empty($navlist['child'])): ?><div class="sub-menu">
					<?php if(is_array($navlist['child'])): $i = 0; $__LIST__ = $navlist['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href='<?php echo (get_url($vo)); ?>'><?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div><?php endif; ?>
		</li><?php endforeach;?>
	</ul>
</div>

<div class="warp1 mt">
	<div id="ggao"><b>最新公告：</b><span><marquee><?php
 $where = array('end_time' => array('gt',date('Y-m-d H:i:s'))); if (0 > 0) { $count = M('announce')->where($where)->count(); $thisPage = new \Common\Lib\Page($count, 0); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "1"; } $_announcelist = M('announce')->where($where)->order("start_time DESC")->limit($limit)->select(); if (empty($_announcelist)) { $_announcelist = array(); } foreach($_announcelist as $autoindex => $announcelist): if(0) $announcelist['title'] = str2sub($announcelist['title'], 0, 0); if(100) $announcelist['content'] = str2sub(strip_tags($announcelist['content']), 100, 0); echo ($announcelist["content"]); endforeach;?></marquee></span></div>
</div>
<div class="clear"></div>

</div>

<div class="content">
	<div class="warp1 mt">

<div class="left f_l">

	<?php if($flag_son): ?><h3 class="flbt">栏目列表</h3>
	<div class="xbox">
	<ul class="fllb">
		<?php
 $_typeid = intval($cid); $_type = 'son'; $_temp = explode(',', "10"); $_temp[0] = $_temp[0] > 0? $_temp[0] : 10; if (isset($_temp[1]) && intval($_temp[1]) > 0) { $_limit[0] = $_temp[0]; $_limit[1] = intval($_temp[1]); }else { $_limit[0] = 0; $_limit[1] = $_temp[0]; } if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if (1 == 1) { $__catlist = get_category(10); } else{ $__catlist = get_category(1); } if (0) { $__catlist = \Common\Lib\Category::getLevelOfModelId($__catlist, 0); } if (1 == 0) { $__catlist = \Common\Lib\Category::clearPageAndLink($__catlist); } if($_typeid == 0 || $_type == 'top') { $_catlist = \Common\Lib\Category::toLayer($__catlist); }else { if ($_type == 'self') { $_typeinfo = \Common\Lib\Category::getSelf($__catlist, $_typeid ); $_catlist = \Common\Lib\Category::toLayer($__catlist, 'child', $_typeinfo['pid']); }else { $_catlist = \Common\Lib\Category::toLayer($__catlist, 'child', $_typeid); } } foreach($_catlist as $autoindex => $catlist): if($autoindex < $_limit[0]) continue; if($autoindex >= ($_limit[1]+$_limit[0])) break; $catlist['url'] = get_url($catlist); ?><li><a href="<?php echo ($catlist["url"]); ?>"><?php echo ($catlist["name"]); ?></a></li><?php endforeach;?>
	</ul>
	</div>
	<div class="mt"></div>
	<?php else: ?>
	<?php if($cate['pid'] > 0): ?><h3 class="flbt">栏目列表</h3>
	<div class="xbox">
	<ul class="fllb">
		<?php
 $_typeid = intval($cate['pid']); $_type = 'son'; $_temp = explode(',', "10"); $_temp[0] = $_temp[0] > 0? $_temp[0] : 10; if (isset($_temp[1]) && intval($_temp[1]) > 0) { $_limit[0] = $_temp[0]; $_limit[1] = intval($_temp[1]); }else { $_limit[0] = 0; $_limit[1] = $_temp[0]; } if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if (1 == 1) { $__catlist = get_category(10); } else{ $__catlist = get_category(1); } if (0) { $__catlist = \Common\Lib\Category::getLevelOfModelId($__catlist, 0); } if (1 == 0) { $__catlist = \Common\Lib\Category::clearPageAndLink($__catlist); } if($_typeid == 0 || $_type == 'top') { $_catlist = \Common\Lib\Category::toLayer($__catlist); }else { if ($_type == 'self') { $_typeinfo = \Common\Lib\Category::getSelf($__catlist, $_typeid ); $_catlist = \Common\Lib\Category::toLayer($__catlist, 'child', $_typeinfo['pid']); }else { $_catlist = \Common\Lib\Category::toLayer($__catlist, 'child', $_typeid); } } foreach($_catlist as $autoindex => $catlist): if($autoindex < $_limit[0]) continue; if($autoindex >= ($_limit[1]+$_limit[0])) break; $catlist['url'] = get_url($catlist); ?><li><a href="<?php echo ($catlist["url"]); ?>"><?php echo ($catlist["name"]); ?></a></li><?php endforeach;?>
	</ul>
	</div>
	<div class="mt"></div><?php endif; endif; ?>

	<div class="">
	<h3 class="left_bt">联系我们</h3>
	<div class="xbox left_contactbox">
	  <p>联系地址：昆明北京路<br />
	  电话：0871-66666</p>
	</div>
	</div>

	<div class="mt">
	<h3 class="left_bt">最新文章</h3>
	<div class="xbox left_box" id="abt">
	<ul class="sywz">
	
	<?php
 $_typeid = '-1'; $_keyword = ''; $_arcid = ""; if($_typeid == -1) $_typeid = I('get.cid', 0, 'intval'); $where = array('article.delete_status' => 0,'cate_status' => array('LT',2)); if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if (!empty($ids_arr)) { $where['article.cid'] = array('IN',$ids_arr); } } if (0 > 0 && 0 > 0) { $where['article.point'] = array('between',array(0,0)); }else if (0 > 0) { $where['article.point'] = array('EGT', 0); }else if (0 > 0) { $where['article.point'] = array('ELT', 0); } if ($_keyword != '') { $where['article.title'] = array('like','%'.$_keyword.'%'); } if (!empty($_arcid)) { $where['article.id'] = array('IN', $_arcid); } if (0 > 0) { $where['_string'] = 'article.flag & 0 = 0 '; } if (0 > 0) { $count = D2('ArcView','article')->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "6"; } $_artlist = D2('ArcView','article')->nofield('content')->where($where)->order("point DESC,id DESC")->limit($limit)->select(); if (empty($_artlist)) { $_artlist = array(); } foreach($_artlist as $autoindex => $artlist): $_jumpflag = ($artlist['flag'] & B_JUMP) == B_JUMP? true : false; $artlist['url'] = get_content_url($artlist['id'], $artlist['cid'], $artlist['ename'], $_jumpflag, $artlist['jump_url']); if(16) $artlist['title'] = str2sub($artlist['title'], 16, 0); if(0) $artlist['description'] = str2sub($artlist['description'], 0, 0); ?><li><a href="<?php echo ($artlist["url"]); ?>"><?php echo ($artlist["title"]); ?></a></li><?php endforeach;?>
	</ul>
	</div>
	</div>	
</div>
<div class="right f_r">
	<h3 class="nybt"><i>您当前的位置：<?php
 $_sname = ''; $_surl = ''; $_hname = ''; $_typeid = intval('-1'); if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid == 0 && $_sname == '') { $_sname = isset($title) ? $title : ''; } echo get_position($_typeid, $_sname, $_surl, 0, "",$_hname); ?> </i><span><?php echo ($cate["name"]); ?></span></h3>
	<div class="xbox wzzw ">
	
	<ul class="wzli">	
	<?php
 $_typeid = $cid; $_keyword = ''; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_table_name = ''; if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } if (empty($_table_name)) { $_selfcate = \Common\Lib\Category::getSelf(get_category(10), $_typeid_val); $_table_name = strtolower($_selfcate['table_name']); } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if ($_table_name == '') { $_table_name = 'article'; } $where = array($_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2)); if (!empty($ids_arr)) { $where[$_table_name.'.cid'] = array('IN',$ids_arr); } }else { $_table_name = 'article'; $where = array($_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2)); } if (0 > 0 && 0 > 0) { $where[$_table_name.'.point'] = array('between',array(0,0)); }else if (0 > 0) { $where[$_table_name.'.point'] = array('EGT', 0); }else if (0 > 0) { $where[$_table_name.'.point'] = array('ELT', 0); } if ($_keyword != '') { $where[$_table_name.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_table_name.'.flag & 0 = 0 '; } if (!empty($_table_name) && $_table_name != 'page') { if (15 > 0) { $count = D2('ArcView',"$_table_name")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 15, $param, $param_action); $thisPage->rollPage = 4; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_list = D2('ArcView',"$_table_name")->nofield('content,picture_urls')->where($where)->order("point DESC,id DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jump_url']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['picture_urls'])) $list['picture_urls'] = get_picture_array($list['picture_urls']); ?><li><span><?php echo (get_date($list["publish_time"],'Y-m-d')); ?></span><a href="<?php echo ($list["url"]); ?>"><?php echo ($list["title"]); ?></a></li><?php endforeach;?>
	
	</ul>
	<!--分页 -->
	<div class="scott mt"><?php echo ($page); ?>
	<div class="clear"></div>
	</div>
	
	</div>
	</div>
<div class=" clear"></div>
</div>
</div>

<div class="warp1 mt" id="bottom">
	<a href="http://www.gohosts.com:8081">我的网站</a>版权所有
	<br />
	联系地址：昆明北京路  电话：0871-66666<br />
	Copyright © 2014-2014 XYHCMS. 行云海软件 版权所有 <a href="http://www.0871k.com" target="_blank">Power by XYHCMS</a>
</div>
<?php
 echo '<script type="text/javascript" src="'.U(MODULE_NAME. '/Public/online').'"></script>'; ?>

</body>
</html>