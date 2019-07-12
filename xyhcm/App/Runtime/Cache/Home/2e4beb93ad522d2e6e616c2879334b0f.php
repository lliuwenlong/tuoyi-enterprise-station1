<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>我的网站</title>
<meta name="keywords" content="我的网站" />
<meta name="description" content="" />
<script type="text/javascript" src="/Data/static/js/jquery-1.12.4.min.js" ></script>
<link rel="stylesheet" href="/Public/Home/default/js/FlexSlider/flexslider.css" type="text/css" />
<link href="/Public/Home/default/css/css.css?2017" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="/Public/Home/default/js/FlexSlider/jquery.flexslider-min.js"></script>
<script language="javascript" type="text/javascript">
	$(function(){
		$('.flexslider').flexslider({animation: "slide",itemMargin: 0,controlNav: false});
		
		getMarquee();
		function getMarquee() {			
			$('#ggao>span').fadeToggle(2000);			
			setTimeout(function(){
				getMarquee();
			}, 4000);
			
		}
	})
</script>
<?php
 $_flag = 0; switch ($_flag) { case 0: if (C('CFG_MOBILE_AUTO') == 1) { if (C('HTML_CACHE_ON') == true) { echo '<script type="text/javascript" src="/Data/static/js/mobile_auto.js"></script>'; } else { go_mobile(); } } break; case 1: go_mobile(); break; case 2: if (C('CFG_MOBILE_AUTO') == 1) { echo '<script type="text/javascript" src="/Data/static/js/mobile_auto.js"></script>'; } break; default: break; } ?>
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
<div class="warp-banner">
	<div id="banner" class="f_r">
		<div class="flexslider">
			<ul class="slides">
				<?php
 $_id = intval('1'); if (!empty($_id)) { if (0) { echo '<script type="text/javascript" src="'.U('Abc/shows', array('id' => $_id, 'flag' => 0)).'"></script>'; }else { echo get_abc($_id, 0); } } ?>
			</ul>
		</div>
	</div>
</div>

</div>

<div class="warp1 mt">
<div class="left f_l">
	<div class="f_l xyh-about">
		<?php
 $block = get_block('Introduction'); $block_content = ''; if ($block) { if ($block['block_type'] == 2) { if (!0) { $block_content = '<img src="'. $block['content'] .'" />'; }else { $block_content = $block['content']; } }else { if(0) { $block_content = str2sub(strip_tags($block['content']), 0, 0); }else { $block_content = $block['content']; } } } echo $block_content; ?>
	</div>

	<div class="mt">
		<h3 class="left_bt">搜索中心</h3>
		<div class="xbox left_box">
		<form id="SearchForm" name="SearchForm" method="post" action="/index.php?s=/Search/index.html		
		">
		<ul class="searchFormDiv">
			<li>
				<select name="model_id">
					<option value="0">全部</option>
					<?php
 $_table = explode('|', "model"); $_field = explode('|', "id,name"); $_joinwhere = array_filter(explode('|', "")); sort($_joinwhere); $_jointype = 'INNER'; $where = "id != 2"; if (empty($where)) { $where = ' 1 = 1'; } $_field_array = array(); foreach ($_table as $k => $v) { if (strtolower($v) == 'admin') { $_table = array(); break; } $_field_temp = empty($_field[$k])? array('*') : explode(',', $_field[$k]); foreach ($_field_temp as $k2 => $v2) { $v2 = trim($v2); $_field_temp[$k2] = strpos($v2, '(')? $v2 : $v. '.'. $v2; } $_field_array = array_merge($_field_array, $_field_temp); $_table[$k] = C('DB_PREFIX').$v.' '.$v; } if (!empty($_table)) { $_field_str = implode(',', $_field_array); if (!empty($_joinwhere)) { foreach ($_joinwhere as $k => $v) { $_temp = explode(':', $v); if (isset($_temp[1]) && in_array(strtoupper($_temp[1]), array('INNER','LEFT','RIGHT'))) { $_jointype = strtoupper($_temp[1]); } $_jointype .= ' JOIN'; $_joinwhere[$k] = $_jointype.' '.$_table[$k+1].' ON '.$_temp[0]; } } if (0 > 0) { if (count($_table) == 1) { $count = M()->table($_table[0])->where($where)->count(); }else { $count = M()->table($_table[0])->join($_joinwhere)->where($where)->count(); } $thisPage = new \Common\Lib\Page($count, 0); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "30"; } if (count($_table) == 1) { $_datatable = M()->table($_table[0])->field($_field_str)->where($where)->order("id")->limit($limit)->select(); }else { $_datatable = M()->table($_table[0])->field($_field_str)->join($_joinwhere)-> where($where)->order("id")->limit($limit)->select(); } } if (empty($_datatable)) { $_datatable = array(); } foreach($_datatable as $autoindex => $datatable): ?><option value="<?php echo ($datatable["id"]); ?>"><?php echo (str_replace('模型','',$datatable["name"])); ?></option><?php endforeach;?>
				</select>
			</li>
			<li>
				<input name="keyword" type="text" id="keyword"  value="请输入关键词" onfocus="if(this.value=='请输入关键词'){this.value='';}" onblur="if(this.value==''){this.value='请输入关键词';}" />		
			</li>
			<li>
				<input type="submit" value="查询" class="btn_blue"/>		
			</li>
		</ul>
		</form>
		</div>
	</div>		



		

</div>

<div class="right f_r">
	<div class="mt">
		<div id="ggao"><b>最新公告：</b><span style="width: 600px; overflow: hidden;"><?php
 $where = array('end_time' => array('gt',date('Y-m-d H:i:s'))); if (0 > 0) { $count = M('announce')->where($where)->count(); $thisPage = new \Common\Lib\Page($count, 0); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "1"; } $_announcelist = M('announce')->where($where)->order("start_time DESC")->limit($limit)->select(); if (empty($_announcelist)) { $_announcelist = array(); } foreach($_announcelist as $autoindex => $announcelist): if(0) $announcelist['title'] = str2sub($announcelist['title'], 0, 0); if(100) $announcelist['content'] = str2sub(strip_tags($announcelist['content']), 100, 0); echo ($announcelist["content"]); endforeach;?></span></div>
	</div>
	<div class="mt">
	</div>

<?php
 $_typeid = intval('0'); $_type = 'son'; $_temp = explode(',', "10"); $_temp[0] = $_temp[0] > 0? $_temp[0] : 10; if (isset($_temp[1]) && intval($_temp[1]) > 0) { $_limit[0] = $_temp[0]; $_limit[1] = intval($_temp[1]); }else { $_limit[0] = 0; $_limit[1] = $_temp[0]; } if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if (1 == 1) { $__catlist = get_category(10); } else{ $__catlist = get_category(1); } if (0) { $__catlist = \Common\Lib\Category::getLevelOfModelId($__catlist, 0); } if (0 == 0) { $__catlist = \Common\Lib\Category::clearPageAndLink($__catlist); } if($_typeid == 0 || $_type == 'top') { $_catlist = \Common\Lib\Category::toLayer($__catlist); }else { if ($_type == 'self') { $_typeinfo = \Common\Lib\Category::getSelf($__catlist, $_typeid ); $_catlist = \Common\Lib\Category::toLayer($__catlist, 'child', $_typeinfo['pid']); }else { $_catlist = \Common\Lib\Category::toLayer($__catlist, 'child', $_typeid); } } foreach($_catlist as $autoindex => $catlist): if($autoindex < $_limit[0]) continue; if($autoindex >= ($_limit[1]+$_limit[0])) break; $catlist['url'] = get_url($catlist); ?><div class="rbox <?php if($autoindex%2 == 0): ?>f_l <?php else: ?> f_r<?php endif; ?> <?php if($autoindex > 1): ?>mt<?php endif; ?>">
<h3 class="r_bt"><a href="<?php echo ($catlist["url"]); ?>">更多></a><span><?php echo ($catlist["name"]); ?></span></h3>
<div class="xbox" style="height:185px; overflow:hidden;">
	<ul class="sywz">
		<?php
 $_typeid = $catlist['id']; $_keyword = ''; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_table_name = ''; if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } if (empty($_table_name)) { $_selfcate = \Common\Lib\Category::getSelf(get_category(10), $_typeid_val); $_table_name = strtolower($_selfcate['table_name']); } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if ($_table_name == '') { $_table_name = 'article'; } $where = array($_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2)); if (!empty($ids_arr)) { $where[$_table_name.'.cid'] = array('IN',$ids_arr); } }else { $_table_name = 'article'; $where = array($_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2)); } if (0 > 0 && 0 > 0) { $where[$_table_name.'.point'] = array('between',array(0,0)); }else if (0 > 0) { $where[$_table_name.'.point'] = array('EGT', 0); }else if (0 > 0) { $where[$_table_name.'.point'] = array('ELT', 0); } if ($_keyword != '') { $where[$_table_name.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_table_name.'.flag & 0 = 0 '; } if (!empty($_table_name) && $_table_name != 'page') { if (0 > 0) { $count = D2('ArcView',"$_table_name")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_list = D2('ArcView',"$_table_name")->nofield('content,picture_urls')->where($where)->order("point DESC,id DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jump_url']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['picture_urls'])) $list['picture_urls'] = get_picture_array($list['picture_urls']); ?><li><span><?php echo (get_date($list["publish_time"],'Y-m-d')); ?></span><a href="<?php echo ($list["url"]); ?>" >[<?php echo ($list["cate_name"]); ?>]<?php echo ($list["title"]); ?></a></li><?php endforeach;?>
	</ul>
</div>
</div><?php endforeach;?>
<div class=" clear"></div>
</div>
<div class=" clear"></div>
</div>

<div class="warp1 mt">
		<h3 class="r_bt"><span>热门标签</span></h3>
		<div class="xbox">
		<ul class="sywz">
		
			<?php
 $_typeid = intval('0'); $_arcid = intval('0'); $_keyword = ''; $where = array(); if (!empty($_typeid)) { $where['ti.cid'] = $_typeid; } if (!empty($_typeid) && !empty($_arcid)) { $where['ti.arc_id'] = $_arcid; } if ($_keyword != '') { $where['t.tag_name'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $count = M('Tag')->alias('t')->field('t.tag_name,t.id,t.num,t.hit')->join('INNER JOIN __TAG_INDEX__ ti ON ti.tag_id = t.id')->where($where)->count('DISTINCT t.tag_name'); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_taglist = M('Tag')->alias('t')->distinct(true)->field('t.tag_name,t.id,t.num,t.hit')->join('INNER JOIN __TAG_INDEX__ ti ON ti.tag_id = t.id')->where($where)->order("sort ASC,id DESC")->limit($limit)->select(); if (empty($_taglist)) { $_taglist = array(); } foreach($_taglist as $autoindex => $taglist): if(C('URL_ROUTER_ON') == true) { $taglist['url'] = U('Tag/'.$taglist['tag_name'],''); }else { $taglist['url'] = U('Tag/shows', array('tname'=> $taglist['tag_name'])); } ?><a href="<?php echo ($taglist["url"]); ?>" target="_blank" class="tag-item"><?php echo ($taglist["tag_name"]); ?></a><?php endforeach;?>
		</ul>
		</div>
	</div>

<div class="warp1 mt">
<h3 class="r_bt"><span>产品展示</span></h3>
<div class="xbox" style="height:142px; overflow:hidden;">
<div id="demc">
    <div class="jdimg" id="my2Box">
      <ul id="my2Contnet">
		<?php
 $_typeid = '-1'; $_keyword = ''; $_arcid = ""; if($_typeid == -1) $_typeid = I('get.cid', 0, 'intval'); $where = array('product.delete_status' => 0,'cate_status' => array('LT',2)); if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if (!empty($ids_arr)) { $where['product.cid'] = array('IN',$ids_arr); } } if (0 > 0 && 0 > 0) { $where['product.point'] = array('between',array(0,0)); }else if (0 > 0) { $where['product.point'] = array('EGT', 0); }else if (0 > 0) { $where['product.point'] = array('ELT', 0); } if ($_keyword != '') { $where['product.title'] = array('like','%'.$_keyword.'%'); } if (!empty($_arcid)) { $where['product.id'] = array('IN', $_arcid); } if (0 > 0) { $where['_string'] = 'product.flag & 0 = 0 '; } if (0 > 0) { $count = D2('ArcView','product')->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_prolist = D2('ArcView','product')->nofield('content,picture_urls')->where($where)->order("point DESC,id DESC")->limit($limit)->select(); if (empty($_prolist)) { $_prolist = array(); } foreach($_prolist as $autoindex => $prolist): $_jumpflag = ($prolist['flag'] & B_JUMP) == B_JUMP? true : false; $prolist['url'] = get_content_url($prolist['id'], $prolist['cid'], $prolist['ename'], $_jumpflag, $prolist['jump_url']); if(0) $prolist['title'] = str2sub($prolist['title'], 0, 0); if(0) $prolist['description'] = str2sub($prolist['description'], 0, 0); if(isset($prolist['picture_urls'])) $prolist['picture_urls'] = get_picture_array($prolist['picture_urls']); ?><li><a href="<?php echo ($prolist["url"]); ?>"><img src="<?php echo ($prolist["litpic"]); ?>" alt="<?php echo ($prolist["title"]); ?>"/><span><?php echo ($prolist["title"]); ?></span></a></li><?php endforeach;?>	  
      </ul>
      <div class="clear"></div>

    </div>
  </div>
</div>
</div>

<div class="warp1 mt">
<h3 class="r_bt"><span>友情链接</span></h3>
<div class="xbox" id="yqlj">
<?php
 $_type = intval('-1'); if ($_type == 0) { $where = array('is_check'=> 0); }else if ($_type == 1) { $where = array('is_check'=> 1); } else { $where = array('id' => array('gt',0)); } if (0 > 0) { $count = M('link')->where($where)->count(); $thisPage = new \Common\Lib\Page($count, 0); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "20"; } $_flink = M('link')->where($where)->order("sort ASC")->limit($limit)->select(); if (empty($_flink)) { $_flink = array(); } foreach($_flink as $autoindex => $flink): ?><a href="<?php echo ($flink["url"]); ?>" target="_blank"><?php echo ($flink["name"]); ?></a><?php endforeach;?>
<div class="clear"></div>
</div>
</div>
<script language="javascript" src="/Public/Home/default/js/MSClass.js"></script>
<script type="text/javascript">
new Marquee(["my2Box","my2Contnet"],2,1,966,140,30,0,0);
</script>


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