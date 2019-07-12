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
 $_typeid = '-1'; $_keyword = ''; $_arcid = ""; if($_typeid == -1) $_typeid = I('get.cid', 0, 'intval'); $where = array('article.delete_status' => 0,'cate_status' => array('LT',2)); if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if (!empty($ids_arr)) { $where['article.cid'] = array('IN',$ids_arr); } } if (0 > 0 && 0 > 0) { $where['article.point'] = array('between',array(0,0)); }else if (0 > 0) { $where['article.point'] = array('EGT', 0); }else if (0 > 0) { $where['article.point'] = array('ELT', 0); } if ($_keyword != '') { $where['article.title'] = array('like','%'.$_keyword.'%'); } if (!empty($_arcid)) { $where['article.id'] = array('IN', $_arcid); } if (0 > 0) { $where['_string'] = 'article.flag & 0 = 0 '; } if (0 > 0) { $count = D2('ArcView','article')->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_artlist = D2('ArcView','article')->nofield('content')->where($where)->order("point DESC,id DESC")->limit($limit)->select(); if (empty($_artlist)) { $_artlist = array(); } foreach($_artlist as $autoindex => $artlist): $_jumpflag = ($artlist['flag'] & B_JUMP) == B_JUMP? true : false; $artlist['url'] = get_content_url($artlist['id'], $artlist['cid'], $artlist['ename'], $_jumpflag, $artlist['jump_url']); if(16) $artlist['title'] = str2sub($artlist['title'], 16, 0); if(0) $artlist['description'] = str2sub($artlist['description'], 0, 0); ?><li><a href="<?php echo ($artlist["url"]); ?>"><?php echo ($artlist["title"]); ?></a></li><?php endforeach;?>
	</ul>
	</div>
	</div>	
</div>
<div class="right f_r">
	<h3 class="nybt"><i>您当前的位置：<?php
 $_sname = ''; $_surl = ''; $_hname = ''; $_typeid = intval('-1'); if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid == 0 && $_sname == '') { $_sname = isset($title) ? $title : ''; } echo get_position($_typeid, $_sname, $_surl, 0, "",$_hname); ?> </i><span><?php echo ($cate["name"]); ?></span></h3>
	<div class="xbox wzzw"> 
<div class="biaoti" align="center"><?php echo ($content["title"]); ?></div>
<div style="border:1px solid #FFE0B4; background:#ffeed5; text-align:center;">发布时间:<?php echo (get_date($content["publish_time"],'Y-m-d')); ?> 丨 阅读次数:<?php
 if (!empty($id) && !empty($table_name)) { if (C('HTML_CACHE_ON') == true) { echo '<script type="text/javascript" src="'.U('Public/click', array('id' => $id, 'tn' => $table_name)).'"></script>'; } else { echo get_click($id, $table_name); } } ?> </div>
	<div class="wzzw lh">
	<?php echo ($content["content"]); ?>
	</div>
 <div class="fenye1" style="text-align:left;">↑上一篇：<?php
 if(empty($content['id']) || empty($content['cid']) || empty($cate['table_name']) ) { echo 'Parameter error'; } else { $_vo= D2('ArcView', $cate['table_name'])->where(array($cate['table_name'].'.delete_status' => 0, 'cid' => $content['cid'], 'id' => array('lt',$content['id'])))->order('id desc')->find(); if ($_vo) { $_jumpflag = ($_vo['flag'] & B_JUMP) == B_JUMP? true : false; $_vo['url'] = get_content_url($_vo['id'], $_vo['cid'], $_vo['ename'], $_jumpflag, $_vo['jump_url']); if(0) $_vo['title'] = str2sub($_vo['title'], 0, 0); echo '<a href="'. $_vo['url'] .'">'. $_vo['title'] .'</a>'; } else { echo "第一篇"; } } ?><br/>↓下一篇：<?php
 if(empty($content['id']) || empty($content['cid']) || empty($cate['table_name']) ) { echo 'Parameter error'; } else { $_vo= D2('ArcView',$cate['table_name'])->where(array($cate['table_name'].'.delete_status' => 0, 'cid' => $content['cid'], 'id' => array('gt',$content['id'])))->order('id ASC')->find(); if ($_vo) { $_jumpflag = ($_vo['flag'] & B_JUMP) == B_JUMP? true : false; $_vo['url'] = get_content_url($_vo['id'], $_vo['cid'], $_vo['ename'], $_jumpflag, $_vo['jump_url']); if(0) $_vo['title'] = str2sub($_vo['title'], 0, 0); echo '<a href="'. $_vo['url'] .'">'. $_vo['title'] .'</a>'; } else { echo "最后一篇"; } } ?> </div>

    <!--comment -->
    <?php if($comment_flag == 1): ?><div class="comment-box">
        <h3>评论(<span class="review-count">0</span>)</h3>
		
        <div class="more-comment">
            后面还有<span id="more_count"></span>条评论，<a href="javascript:get_review();">点击查看>></a>
        </div>
        <form action="<?php echo U(MODULE_NAME.'/Review/add');?>" method="post" class="comment-item" id="reviewForm"  autocomplete="off">
		<a name="reply_" id="reply_"></a>
        	<input type="hidden" name="post_id" value="<?php echo ($content["id"]); ?>"/>
        	<input type="hidden" name="model_id" value="<?php echo ($cate["model_id"]); ?>" />
        	<input type="hidden" name="title" value="<?php echo ($content["title"]); ?>"/>
        	<input type="hidden" name="review_id" value="0" />
        	<span class="avatar"><img src="<?php echo get_avatar(get_cookie('face'),30);?>" alt="" id="my_avatar"></span>
        	<div class="comment-bd" id="review">
        		<div class="comment-textarea">
					<textarea name="content" placeholder="我也来说两句..."></textarea>
				</div>

				<?php if(C('cfg_verify_review') == 1): ?><div class="comment-vcode">
					
					<input type="text" name="vcode" class="inp_small" />
					<img src="/index.php?s=/Public/verify.html" id="VCode" onclick="javascript:changeVcode(this);" />
				</div><?php endif; ?>
			</div>
            <div class="comment-ft">
				<input type="submit" class="btn_blue" value="评论&nbsp;[&nbsp;Ctrl+Enter&nbsp;]">
			</div>
        </form>
        
        <div class="login-tip" style="display:none;">
            您可以选择 <a href="<?php echo U(MODULE_NAME. '/Public/login');?>">登录</a> | <a href="<?php echo U(MODULE_NAME. '/Public/register');?>">立即注册</a>
        </div>
    </div>
    <script type="text/javascript" src="/Public/Home/default/js/review.js"></script>
    <script type="text/javascript" language="javascript"> 
        var get_review_url = "<?php echo U(MODULE_NAME.'/Review/getlist');?>";
        var post_review_url = "<?php echo U(MODULE_NAME.'/Review/add');?>";   
		function changeVcode(obj){
			$("#VCode").attr("src",'/index.php?s=/Public/verify.html'+ '#'+Math.random());
			return false;
		}
	</script><?php endif; ?>
    <!--comment end-->

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