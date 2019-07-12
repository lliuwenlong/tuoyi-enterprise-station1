<?php
/**
 *　                  oooooooooooo
 *
 *                  ooooooooooooooooo
 *                       o
 *                      o
 *                     o        o
 *                    oooooooooooo
 *
 *         ～～         ～～         　　～～
 *       ~~　　　　　~~　　　　　　　　~~
 * ~~～~~～~~　　　~~~～~~～~~～　　　~~~～~~～~~～
 * ·······              ~~XYHCMS~~            ·······
 * ·······  闲看庭前花开花落 漫随天外云卷云舒 ·······
 * ·············     www.xyhcms.com     ·············
 * ··················································
 * ··················································
 *
 * @Author: gosea <gosea199@gmail.com>
 * @Date:   2014-06-21 10:00:00
 * @Last Modified by:   gosea
 * @Last Modified time: 2017-11-11 09:46:25
 */
namespace Common\LibTag;

use Think\Template\TagLib;

//自定义标签库
class Yang extends TagLib {

	protected $tags = array(
		//自定义标签
		//文章列表
		'artlist'         => array(
			'attr'  => 'flag,typeid,arcid,titlelen,infolen,pointstart,pointend,orderby,keyword,fieldflag,limit,pagesize,pageroll,pagetheme', //attr 属性列表,arcid[new|20140413] 指定文档ID
			'close' => 1, // close 是否闭合（0 或者1 默认为1，表示闭合）
		),
		//产品列表分页
		'prolist'         => array(
			'attr'  => 'flag,typeid,arcid,titlelen,infolen,pointstart,pointend,orderby,keyword,fieldflag,limit,pagesize,pageroll,pagetheme',
			'close' => 1,
		),
		//图片列表分页
		'piclist'         => array(
			'attr'  => 'flag,typeid,arcid,titlelen,infolen,pointstart,pointend,orderby,keyword,fieldflag,limit,pagesize,pageroll,pagetheme',
			'close' => 1,
		),
		//软件列表分页
		'soflist'         => array(
			'attr'  => 'flag,typeid,arcid,titlelen,infolen,pointstart,pointend,orderby,keyword,fieldflag,limit,pagesize,pageroll,pagetheme',
			'close' => 1,
		),

		//通用列表
		'list'            => array(
			'attr'  => 'flag,typeid,titlelen,infolen,pointstart,pointend,orderby,keyword,fieldflag,limit,pagesize,pageroll,pagetheme',
			'close' => 1,
		),

		//全局搜索文档列表--20171018
		'slist'           => array(
			'attr'  => 'typeid,modelid,arcid,titlelen,infolen,pointstart,pointend,orderby,keyword,limit,pagesize,pageroll,pagetheme',
			'close' => 1,
		),

		//专题列表分页
		'spelist'         => array(
			'attr'  => 'flag,typeid,titlelen,infolen,pointstart,pointend,orderby,keyword,fieldflag,limit,pagesize,pageroll,pagetheme',
			'close' => 1,
		),

		//栏目
		'catlist'         => array(
			'attr'  => 'typeid,type,orderby,limit,flag,hideflag,modelid', //flag为是否全部显示,hideflag是否显示隐藏的(默认显示)
			'close' => 1,
		),

		//导航
		'navlist'         => array(
			'attr'  => 'typeid',
			'close' => 1,
		),

		//类名和链接
		'type'            => array(
			'attr'  => 'typeid,level',
			'close' => 1,
		),

		//栏目(类名)文档数
		'typenum'         => array(
			'attr'  => 'typeid',
			'close' => 0,
		),

		//user list
		'userlist'        => array(
			'attr'  => 'typeid,titlelen,infolen,orderby,limit,pagesize,pageroll,pagetheme', //attr 属性列表
			'close' => 1,
		),
		//announce list
		'announcelist'    => array(
			'attr'  => 'titlelen,infolen,orderby,limit,pagesize,pageroll,pagetheme', //attr 属性列表
			'close' => 1,
		),

		//tag列表
		'taglist'         => array(
			'attr'  => 'typeid,arcid,keyword,orderby,limit,pagesize,pageroll,pagetheme',
			'close' => 1,
		),

		//friendLink list--20171022
		'flink'           => array(
			'attr'  => 'type,titlelen,infolen,orderby,limit,pagesize,pageroll,pagetheme', //attr 属性列表
			'close' => 1,
		),

		//guestbook list
		'gbooklist'       => array(
			'attr'  => 'titlelen,infolen,orderby,limit, showflag, pagesize,pageroll,pagetheme', //attr 属性列表
			'close' => 1,
		),

		//v1.6 --Review list --20140813
		'reviewlist'      => array(
			'attr'  => 'modelid,arcid,type,userid,orderby,limit,showflag,pagesize,pageroll,pagetheme',
			'close' => 1,
		),

		//v1.6 --ad --20140821
		'abc'             => array(
			'attr'  => 'id,limit', //attr 属性列表
			'close' => 1,
		),

		'ad'              => array(
			'attr'  => 'id,flag', //attr 属性列表,flag[0|1],0为html,1为js
			'close' => 0,
		),

		'iteminfo'        => array(
			'attr'  => 'name,titlelen,limit',
			'close' => 1,
		),

		'freeblock'       => array(
			'attr'  => 'name,infolen,textflag',
			'close' => 0,
		),

		//v1.5 for blog  Archive
		'datelist'        => array(
			'attr'  => 'modelid,limit',
			'close' => 1,
		),
		//v1.5 for blog  Archive
		'archivelist'     => array(
			'attr'  => 'modelid,year,month,titlelen,infolen,orderby,limit,pagesize,pageroll,pagetheme',
			'close' => 1,
		),

		//v1.6 --通用数据表查询 --20140812
		'datatable'       => array(
			'attr'  => 'table,field,joinwhere,where,orderby,limit,pagesize,pageroll,pagetheme', //attr 属性列表,arcid[new|20140413] 指定文档ID
			'close' => 1, // close 是否闭合（0 或者1 默认为1，表示闭合）
		),

		'field'           => array(
			'attr'  => 'typeid,arcid,name,infolen,imgindex,imgwidth,imgheight', //imgindex,imgwidth,imgheight针对图片
			'close' => 0,
		),

		'position'        => array(
			'attr'  => 'typeid,ismobile,sname,surl,delimiter,hname',
			'close' => 0,
		),

		'cfg'             => array(
			'attr'  => 'name',
			'close' => 0,
		),

		'sitekeywords'    => array('close' => 0),
		'sitedescription' => array('close' => 0),
		'sitename'        => array('close' => 0),
		'sitetitle'       => array('close' => 0),
		'siteurl'         => array('close' => 0),

		'beian'           => array('close' => 0),
		'address'         => array('close' => 0),
		'phone'           => array('close' => 0),
		'copyright'       => array('close' => 0),
		'stats'           => array('close' => 0),

		'searchurl'       => array('close' => 0),
		'gbookurl'        => array('close' => 0),
		'gbookaddurl'     => array('close' => 0),
		'vcodeurl'        => array('close' => 0),
		'mobileauto'      => array(
			'attr'  => 'flag', //0自动,1是php,2是js
			'close' => 0,
		),

		'prev'            => array(
			'attr'  => 'titlelen,notitle,target', //attr 属性列表
			'close' => 0,
		),
		'next'            => array(
			'attr'  => 'titlelen,notitle,target', //attr 属性列表
			'close' => 0,
		),
		'click'           => array('close' => 0),
		'online'          => array('close' => 0),

	);

	//标签名前加下划线
	//文章列表
	public function _artlist($attr, $content) {
		////非debug参属性参数只处理 一次
		$typeid = tag_param_vars_string(isset($attr['typeid']) ? $attr['typeid'] : '-1'); //-1后面自动获取
		$flag   = empty($attr['flag']) ? '' : $attr['flag'];

		$arcid      = empty($attr['arcid']) ? '' : $attr['arcid']; //新增加20140413
		$titlelen   = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen    = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$pointstart = empty($attr['pointstart']) ? 0 : intval($attr['pointstart']);
		$pointend   = empty($attr['pointend']) ? 0 : intval($attr['pointend']);

		$orderby  = empty($attr['orderby']) ? 'point DESC,id DESC' : $attr['orderby'];
		$limit    = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize = empty($attr['pagesize']) ? '0' : $attr['pagesize'];
		$keyword  = tag_param_var(isset($attr['keyword']) ? $attr['keyword'] : '');

		$flag  = flag2sum($flag);
		$arcid = string2filter($arcid, ',', true);

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll']; //新增加20140513
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']); //新增加20140513

		$fieldflag = empty($attr['fieldflag']) ? 0 : 1; //2016 new add--by gosea
		$nofield   = $fieldflag ? '' : 'content';

		$str = <<<str
<?php
	\$_typeid = $typeid;
	\$_keyword = $keyword;
	\$_arcid = "$arcid";
	if(\$_typeid == -1) \$_typeid = I('get.cid', 0, 'intval');
	\$where = array('article.delete_status' => 0,'cate_status' => array('LT',2));
	if (!empty(\$_typeid)) {
		\$_typeid_arr = explode(',',\$_typeid);
		\$ids_arr = array();

		foreach(\$_typeid_arr as \$_typeid_key => \$_typeid_val) {
			\$_typeid_val = intval(\$_typeid_val);
			if (empty(\$_typeid_val)) {
				continue;
			}
			\$_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), \$_typeid_val, true);
			\$ids_arr = array_merge(\$ids_arr,\$_typeid_ids);
		}

		\$ids_arr = array_unique(\$ids_arr);

		if (!empty(\$ids_arr)) {
			\$where['article.cid'] = array('IN',\$ids_arr);
		}

	}


	if ($pointstart > 0 && $pointend > 0) {
		\$where['article.point'] = array('between',array($pointstart,$pointend));
	}else if ($pointstart > 0) {
		\$where['article.point'] = array('EGT', $pointstart);
	}else if ($pointend > 0) {
		\$where['article.point'] = array('ELT', $pointend);
	}

	if (\$_keyword != '') {
		\$where['article.title'] = array('like','%'.\$_keyword.'%');
	}
	if (!empty(\$_arcid)) {
		\$where['article.id'] = array('IN', \$_arcid);
	}

	if ($flag > 0) {
		\$where['_string'] = 'article.flag & $flag = $flag ';
	}

	//分页
	if ($pagesize > 0) {


		\$count = D2('ArcView','article')->where(\$where)->count();

		\$ename = I('e', '', 'htmlspecialchars,trim');
		if (!empty(\$ename) && C('URL_ROUTER_ON') == true) {
			\$param['p'] = I('p', 1, 'intval');
			\$param_action = '/'.\$ename;
		}else {
			\$param = array();
			\$param_action = '';
		}

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize, \$param, \$param_action);

		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();
	}else {
		\$limit = "$limit";
	}


	\$_artlist = D2('ArcView','article')->nofield('$nofield')->where(\$where)->order("$orderby")->limit(\$limit)->select();

	if (empty(\$_artlist)) {
		\$_artlist = array();
	}


	foreach(\$_artlist as \$autoindex => \$artlist):

	\$_jumpflag = (\$artlist['flag'] & B_JUMP) == B_JUMP? true : false;
	\$artlist['url'] = get_content_url(\$artlist['id'], \$artlist['cid'], \$artlist['ename'], \$_jumpflag, \$artlist['jump_url']);

	if($titlelen) \$artlist['title'] = str2sub(\$artlist['title'], $titlelen, 0);
	if($infolen) \$artlist['description'] = str2sub(\$artlist['description'], $infolen, 0);

?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//产品列表
	public function _prolist($attr, $content) {
		$typeid     = tag_param_vars_string(isset($attr['typeid']) ? $attr['typeid'] : '-1'); //-1后面自动获取
		$flag       = empty($attr['flag']) ? '' : $attr['flag'];
		$arcid      = empty($attr['arcid']) ? '' : $attr['arcid'];
		$titlelen   = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen    = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$pointstart = empty($attr['pointstart']) ? 0 : intval($attr['pointstart']);
		$pointend   = empty($attr['pointend']) ? 0 : intval($attr['pointend']);
		$orderby    = empty($attr['orderby']) ? 'point DESC,id DESC' : $attr['orderby'];
		$limit      = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize   = empty($attr['pagesize']) ? '0' : $attr['pagesize'];
		$keyword    = tag_param_var(isset($attr['keyword']) ? $attr['keyword'] : '');

		$flag  = flag2sum($flag);
		$arcid = string2filter($arcid, ',', true);

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$fieldflag = empty($attr['fieldflag']) ? 0 : 1;
		$nofield   = $fieldflag ? '' : 'content,picture_urls';

		$str = <<<str
<?php
	\$_typeid = $typeid;
	\$_keyword = $keyword;
	\$_arcid = "$arcid";
	if(\$_typeid == -1) \$_typeid = I('get.cid', 0, 'intval');

	\$where = array('product.delete_status' => 0,'cate_status' => array('LT',2));
	if (!empty(\$_typeid)) {
		\$_typeid_arr = explode(',',\$_typeid);
		\$ids_arr = array();

		foreach(\$_typeid_arr as \$_typeid_key => \$_typeid_val) {
			\$_typeid_val = intval(\$_typeid_val);
			if (empty(\$_typeid_val)) {
				continue;
			}

			\$_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), \$_typeid_val, true);
			\$ids_arr = array_merge(\$ids_arr,\$_typeid_ids);
		}
		\$ids_arr = array_unique(\$ids_arr);

		if (!empty(\$ids_arr)) {
			\$where['product.cid'] = array('IN',\$ids_arr);
		}

	}



	if ($pointstart > 0 && $pointend > 0) {
		\$where['product.point'] = array('between',array($pointstart,$pointend));
	}else if ($pointstart > 0) {
		\$where['product.point'] = array('EGT', $pointstart);
	}else if ($pointend > 0) {
		\$where['product.point'] = array('ELT', $pointend);
	}


	if (\$_keyword != '') {
		\$where['product.title'] = array('like','%'.\$_keyword.'%');
	}
	if (!empty(\$_arcid)) {
		\$where['product.id'] = array('IN', \$_arcid);
	}


	if ($flag > 0) {
		\$where['_string'] = 'product.flag & $flag = $flag ';
	}

	//分页
	if ($pagesize > 0) {


		\$count = D2('ArcView','product')->where(\$where)->count();

		\$ename = I('e', '', 'htmlspecialchars,trim');
		if (!empty(\$ename) && C('URL_ROUTER_ON') == true) {
			\$param['p'] = I('p', 1, 'intval');
			\$param_action = '/'.\$ename;
		}else {
			\$param = array();
			\$param_action = '';
		}

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize, \$param, \$param_action);

		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();
	}else {
		\$limit = "$limit";
	}


	\$_prolist = D2('ArcView','product')->nofield('$nofield')->where(\$where)->order("$orderby")->limit(\$limit)->select();

	if (empty(\$_prolist)) {
		\$_prolist = array();
	}


	foreach(\$_prolist as \$autoindex => \$prolist):
	\$_jumpflag = (\$prolist['flag'] & B_JUMP) == B_JUMP? true : false;
	\$prolist['url'] = get_content_url(\$prolist['id'], \$prolist['cid'], \$prolist['ename'], \$_jumpflag, \$prolist['jump_url']);


	if($titlelen) \$prolist['title'] = str2sub(\$prolist['title'], $titlelen, 0);
	if($infolen) \$prolist['description'] = str2sub(\$prolist['description'], $infolen, 0);
    if(isset(\$prolist['picture_urls'])) \$prolist['picture_urls'] = get_picture_array(\$prolist['picture_urls']);

?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//图片列表
	public function _piclist($attr, $content) {
		$typeid = tag_param_vars_string(isset($attr['typeid']) ? $attr['typeid'] : '-1'); //-1后面自动获取
		$flag   = empty($attr['flag']) ? '' : $attr['flag'];

		$arcid      = empty($attr['arcid']) ? '' : $attr['arcid'];
		$titlelen   = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen    = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$pointstart = empty($attr['pointstart']) ? 0 : intval($attr['pointstart']);
		$pointend   = empty($attr['pointend']) ? 0 : intval($attr['pointend']);
		$orderby    = empty($attr['orderby']) ? 'point DESC,id DESC' : $attr['orderby'];
		$limit      = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize   = empty($attr['pagesize']) ? '0' : $attr['pagesize'];
		$keyword    = tag_param_var(isset($attr['keyword']) ? $attr['keyword'] : '');

		$flag  = flag2sum($flag);
		$arcid = string2filter($arcid, ',', true);

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$fieldflag = empty($attr['fieldflag']) ? 0 : 1;
		$nofield   = $fieldflag ? '' : 'content,picture_urls';

		$str = <<<str
<?php
	\$_typeid = $typeid;
	\$_keyword = $keyword;
	\$_arcid = "$arcid";
	if(\$_typeid == -1) \$_typeid = I('cid', 0, 'intval');

	\$where = array('picture.delete_status' => 0,'cate_status' => array('LT',2));
	if (!empty(\$_typeid)) {
		\$_typeid_arr = explode(',',\$_typeid);
		\$ids_arr = array();

		foreach(\$_typeid_arr as \$_typeid_key => \$_typeid_val) {
			\$_typeid_val = intval(\$_typeid_val);
			if (empty(\$_typeid_val)) {
				continue;
			}

			\$_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), \$_typeid_val, true);
			\$ids_arr = array_merge(\$ids_arr,\$_typeid_ids);
		}

		\$ids_arr = array_unique(\$ids_arr);

		if (!empty(\$ids_arr)) {
			\$where['picture.cid'] = array('IN',\$ids_arr);
		}

	}

	if ($pointstart > 0 && $pointend > 0) {
		\$where['picture.point'] = array('between',array($pointstart,$pointend));
	}else if ($pointstart > 0) {
		\$where['picture.point'] = array('EGT', $pointstart);
	}else if ($pointend > 0) {
		\$where['picture.point'] = array('ELT', $pointend);
	}

	if (\$_keyword != '') {
		\$where['picture.title'] = array('like','%'.\$_keyword.'%');
	}
	if (!empty(\$_arcid)) {
		\$where['picture.id'] = array('IN', \$_arcid);
	}


	if ($flag > 0) {
		\$where['_string'] = 'picture.flag & $flag = $flag ';
	}

	//分页
	if ($pagesize > 0) {


		\$count = D2('ArcView','picture')->where(\$where)->count();

		\$ename = I('e', '', 'htmlspecialchars,trim');
		if (!empty(\$ename) && C('URL_ROUTER_ON') == true) {
			\$param['p'] = I('p', 1, 'intval');
			\$param_action = '/'.\$ename;
		}else {
			\$param = array();
			\$param_action = '';
		}

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize, \$param, \$param_action);

		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();
	}else {
		\$limit = "$limit";
	}


	\$_piclist = D2('ArcView','picture')->nofield('$nofield')->where(\$where)->order("$orderby")->limit(\$limit)->select();

	if (empty(\$_piclist)) {
		\$_piclist = array();
	}


	foreach(\$_piclist as \$autoindex => \$piclist):
	\$_jumpflag = (\$piclist['flag'] & B_JUMP) == B_JUMP? true : false;
	\$piclist['url'] = get_content_url(\$piclist['id'], \$piclist['cid'], \$piclist['ename'], \$_jumpflag, \$piclist['jump_url']);
	if($titlelen) \$piclist['title'] = str2sub(\$piclist['title'], $titlelen, 0);
	if($infolen) \$piclist['description'] = str2sub(\$piclist['description'], $infolen, 0);
    if(isset(\$piclist['picture_urls'])) \$piclist['picture_urls'] = get_picture_array(\$piclist['picture_urls']);

?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//软件下载列表
	public function _soflist($attr, $content) {
		$typeid = tag_param_vars_string(isset($attr['typeid']) ? $attr['typeid'] : '-1'); //-1后面自动获取
		$flag   = empty($attr['flag']) ? '' : $attr['flag'];

		$arcid      = empty($attr['arcid']) ? '' : $attr['arcid'];
		$titlelen   = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen    = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$pointstart = empty($attr['pointstart']) ? 0 : intval($attr['pointstart']);
		$pointend   = empty($attr['pointend']) ? 0 : intval($attr['pointend']);
		$orderby    = empty($attr['orderby']) ? 'point DESC,id DESC' : $attr['orderby'];
		$limit      = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize   = empty($attr['pagesize']) ? '0' : $attr['pagesize'];
		$keyword    = tag_param_var(isset($attr['keyword']) ? $attr['keyword'] : '');

		$flag  = flag2sum($flag);
		$arcid = string2filter($arcid, ',', true);

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$fieldflag = empty($attr['fieldflag']) ? 0 : 1;
		$nofield   = $fieldflag ? '' : 'content,picture_urls,update_log,down_link';

		$str = <<<str
<?php
	\$_typeid = $typeid;
	\$_keyword = $keyword;
	\$_arcid = "$arcid";
	if(\$_typeid == -1) \$_typeid = I('cid', 0, 'intval');

	\$where = array('soft.delete_status' => 0,'cate_status' => array('LT',2));
	if (!empty(\$_typeid)) {
		\$_typeid_arr = explode(',',\$_typeid);
		\$ids_arr = array();

		foreach(\$_typeid_arr as \$_typeid_key => \$_typeid_val) {
			\$_typeid_val = intval(\$_typeid_val);
			if (empty(\$_typeid_val)) {
				continue;
			}

			\$_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), \$_typeid_val, true);
			\$ids_arr = array_merge(\$ids_arr,\$_typeid_ids);
		}

		\$ids_arr = array_unique(\$ids_arr);

		if (!empty(\$ids_arr)) {
			\$where['soft.cid'] = array('IN',\$ids_arr);
		}

	}

	if ($pointstart > 0 && $pointend > 0) {
		\$where['soft.point'] = array('between',array($pointstart,$pointend));
	}else if ($pointstart > 0) {
		\$where['soft.point'] = array('EGT', $pointstart);
	}else if ($pointend > 0) {
		\$where['soft.point'] = array('ELT', $pointend);
	}

	if (\$_keyword != '') {
		\$where['soft.title'] = array('like','%'.\$_keyword.'%');
	}
	if (!empty(\$_arcid)) {
		\$where['soft.id'] = array('IN', \$_arcid);
	}

	if ($flag > 0) {
		\$where['_string'] = 'soft.flag & $flag = $flag ';
	}

	//分页
	if ($pagesize > 0) {


		\$count = D2('ArcView','soft')->where(\$where)->count();

		\$ename = I('e', '', 'htmlspecialchars,trim');
		if (!empty(\$ename) && C('URL_ROUTER_ON') == true) {
			\$param['p'] = I('p', 1, 'intval');
			\$param_action = '/'.\$ename;
		}else {
			\$param = array();
			\$param_action = '';
		}

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize, \$param, \$param_action);

		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();
	}else {
		\$limit = "$limit";
	}


	\$_soflist = D2('ArcView','soft')->nofield('$nofield')->where(\$where)->order("$orderby")->limit(\$limit)->select();

	if (empty(\$_soflist)) {
		\$_soflist = array();
	}


	foreach(\$_soflist as \$autoindex => \$soflist):
	\$_jumpflag = (\$soflist['flag'] & B_JUMP) == B_JUMP? true : false;
	\$soflist['url'] = get_content_url(\$soflist['id'], \$soflist['cid'], \$soflist['ename'], \$_jumpflag, \$soflist['jump_url']);
	if($titlelen) \$soflist['title'] = str2sub(\$soflist['title'], $titlelen, 0);
	if($infolen) \$soflist['description'] = str2sub(\$soflist['description'], $infolen, 0);
    if(isset(\$soflist['picture_urls'])) \$soflist['picture_urls'] = get_picture_array(\$soflist['picture_urls']);

?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//标签名前加下划线
	//文章列表
	public function _list($attr, $content) {
		$typeid = tag_param_vars_string(isset($attr['typeid']) ? $attr['typeid'] : '-1'); //-1后面自动获取
		$flag   = empty($attr['flag']) ? '' : $attr['flag'];

		$titlelen   = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen    = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$pointstart = empty($attr['pointstart']) ? 0 : intval($attr['pointstart']);
		$pointend   = empty($attr['pointend']) ? 0 : intval($attr['pointend']);
		$orderby    = empty($attr['orderby']) ? 'point DESC,id DESC' : $attr['orderby'];
		$limit      = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize   = empty($attr['pagesize']) ? '0' : $attr['pagesize'];
		$keyword    = tag_param_var(isset($attr['keyword']) ? $attr['keyword'] : '');

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$flag = flag2sum($flag);

		$fieldflag = empty($attr['fieldflag']) ? 0 : 1;
		$nofield   = $fieldflag ? '' : 'content,picture_urls';

		$str = <<<str
<?php
	\$_typeid = $typeid;
	\$_keyword = $keyword;
	if(\$_typeid == -1) \$_typeid = I('cid', 0, 'intval');

	\$_table_name = '';
	if (!empty(\$_typeid)) {
		\$_typeid_arr = explode(',',\$_typeid);
		\$ids_arr = array();

		foreach(\$_typeid_arr as \$_typeid_key => \$_typeid_val) {
			\$_typeid_val = intval(\$_typeid_val);
			if (empty(\$_typeid_val)) {
				continue;
			}
			if (empty(\$_table_name)) {
				\$_selfcate = \Common\Lib\Category::getSelf(get_category(10), \$_typeid_val);
				\$_table_name = strtolower(\$_selfcate['table_name']);
			}


			\$_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), \$_typeid_val, true);
			\$ids_arr = array_merge(\$ids_arr,\$_typeid_ids);
		}

		\$ids_arr = array_unique(\$ids_arr);

		if (\$_table_name == '') {
			\$_table_name = 'article';
		}
		\$where = array(\$_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2));

		if (!empty(\$ids_arr)) {
			\$where[\$_table_name.'.cid'] = array('IN',\$ids_arr);
		}

	}else {
		\$_table_name = 'article';
		\$where = array(\$_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2));
	}



	if ($pointstart > 0 && $pointend > 0) {
		\$where[\$_table_name.'.point'] = array('between',array($pointstart,$pointend));
	}else if ($pointstart > 0) {
		\$where[\$_table_name.'.point'] = array('EGT', $pointstart);
	}else if ($pointend > 0) {
		\$where[\$_table_name.'.point'] = array('ELT', $pointend);
	}

	if (\$_keyword != '') {
		\$where[\$_table_name.'.title'] = array('like','%'.\$_keyword.'%');
	}


	if ($flag > 0) {
		\$where['_string'] = \$_table_name.'.flag & $flag = $flag ';
	}

	if (!empty(\$_table_name) && \$_table_name != 'page') {

		//分页
		if ($pagesize > 0) {

			\$count = D2('ArcView',"\$_table_name")->where(\$where)->count();

			\$ename = I('e', '', 'htmlspecialchars,trim');
			if (!empty(\$ename) && C('URL_ROUTER_ON') == true) {
				\$param['p'] = I('p', 1, 'intval');
				\$param_action = '/'.\$ename;
			}else {
				\$param = array();
				\$param_action = '';
			}

			\$thisPage = new \Common\Lib\Page(\$count, $pagesize, \$param, \$param_action);


			//设置显示的页数
			\$thisPage->rollPage = $pageroll;
			\$thisPage->setConfig('theme',"$pagetheme");
			\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
			\$page = \$thisPage->show();

		}else {
			\$limit = "$limit";
		}

		\$_list = D2('ArcView',"\$_table_name")->nofield('$nofield')->where(\$where)->order("$orderby")->limit(\$limit)->select();
		if (empty(\$_list)) {
			\$_list = array();
		}
	}else {
		\$_list = array();
	}


	//Load('extend');//调用msubstr()

	foreach(\$_list as \$autoindex => \$list):

	\$_jumpflag = (\$list['flag'] & B_JUMP) == B_JUMP? true : false;
	\$list['url'] = get_content_url(\$list['id'], \$list['cid'], \$list['ename'], \$_jumpflag, \$list['jump_url']);
	if($titlelen) \$list['title'] = str2sub(\$list['title'], $titlelen, 0);
	if($infolen) \$list['description'] = str2sub(\$list['description'], $infolen, 0);
    if(isset(\$list['picture_urls'])) \$list['picture_urls'] = get_picture_array(\$list['picture_urls']);

?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//全局搜索文档列表
	public function _slist($attr, $content) {
		$typeid  = tag_param_vars_string(isset($attr['typeid']) ? $attr['typeid'] : '0'); //-1后面自动获取
		$modelid = tag_param_var(isset($attr['modelid']) ? $attr['modelid'] : '0');

		$arcid      = empty($attr['arcid']) ? '' : $attr['arcid']; //新增加20140413
		$titlelen   = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen    = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$pointstart = empty($attr['pointstart']) ? 0 : intval($attr['pointstart']);
		$pointend   = empty($attr['pointend']) ? 0 : intval($attr['pointend']);

		$orderby   = empty($attr['orderby']) ? 'id DESC' : $attr['orderby'];
		$limit     = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize  = empty($attr['pagesize']) ? '0' : $attr['pagesize'];
		$keyword   = tag_param_var(isset($attr['keyword']) ? $attr['keyword'] : '');
		$arcid     = string2filter($arcid, ',', true);
		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$str = <<<str
<?php
	\$_typeid = $typeid;
	\$_modelid = intval($modelid);
	\$_keyword = $keyword;
	\$_arcid = "$arcid";

	\$where = array('search_all.delete_status' => 0,'cate_status' => array('LT',2));
	if (!empty(\$_typeid)) {
		\$_typeid_arr = explode(',',\$_typeid);
		\$ids_arr = array();

		foreach(\$_typeid_arr as \$_typeid_key => \$_typeid_val) {
			\$_typeid_val = intval(\$_typeid_val);
			if (empty(\$_typeid_val)) {
				continue;
			}

			\$_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), \$_typeid_val, true);
			\$ids_arr = array_merge(\$ids_arr,\$_typeid_ids);
		}

		\$ids_arr = array_unique(\$ids_arr);

		if (!empty(\$ids_arr)) {
			\$where['search_all.cid'] = array('IN',\$ids_arr);
		}
	}

	if(!empty(\$_modelid)) {
		\$where['search_all.model_id'] = \$_modelid;
	}



	if ($pointstart > 0 && $pointend > 0) {
		\$where['search_all.point'] = array('between',array($pointstart,$pointend));
	}else if ($pointstart > 0) {
		\$where['search_all.point'] = array('EGT', $pointstart);
	}else if ($pointend > 0) {
		\$where['search_all.point'] = array('ELT', $pointend);
	}

	if (\$_keyword != '') {
		\$where['search_all.title'] = array('like','%'.\$_keyword.'%');
	}
	if (!empty(\$_arcid)) {
		\$where['search_all.arc_id'] = array('IN', \$_arcid);
	}


	//分页
	if ($pagesize > 0) {


		\$count = D2('ArcView','search_all')->where(\$where)->count();

		\$ename = I('e', '', 'htmlspecialchars,trim');
		if (!empty(\$ename) && C('URL_ROUTER_ON') == true) {
			\$param['p'] = I('p', 1, 'intval');
			\$param_action = '/'.\$ename;
		}else {
			\$param = array();
			\$param_action = '';
		}

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize, \$param, \$param_action);

		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();
	}else {
		\$limit = "$limit";
	}


	\$_slist = D2('ArcView','search_all')->where(\$where)->order("$orderby")->limit(\$limit)->select();

	if (empty(\$_slist)) {
		\$_slist = array();
	}


	foreach(\$_slist as \$autoindex => \$slist):

	\$_jumpflag = !empty(\$slist['jump_url'])? true : false;
	\$slist['url'] = get_content_url(\$slist['arc_id'], \$slist['cid'], \$slist['ename'], \$_jumpflag, \$slist['jump_url']);

	if($titlelen) \$slist['title'] = str2sub(\$slist['title'], $titlelen, 0);
	if($infolen) \$slist['description'] = str2sub(\$slist['description'], $infolen, 0);

?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//专题列表
	public function _spelist($attr, $content) {
		$typeid = tag_param_vars_string(isset($attr['typeid']) ? $attr['typeid'] : '0', ',', '0'); //
		$flag   = empty($attr['flag']) ? '' : $attr['flag'];

		$titlelen   = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen    = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$pointstart = empty($attr['pointstart']) ? 0 : intval($attr['pointstart']);
		$pointend   = empty($attr['pointend']) ? 0 : intval($attr['pointend']);
		$orderby    = empty($attr['orderby']) ? 'point DESC,id DESC' : $attr['orderby'];
		$limit      = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize   = empty($attr['pagesize']) ? '0' : $attr['pagesize'];
		$keyword    = tag_param_var(isset($attr['keyword']) ? $attr['keyword'] : '');

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$flag = flag2sum($flag);

		$fieldflag = empty($attr['fieldflag']) ? 0 : 1;
		$nofield   = $fieldflag ? '' : 'content';

		$str = <<<str
<?php
	\$_typeid = $typeid;
	\$_keyword = $keyword;

	\$where = array('special.delete_status' => 0, 'cate_status' => array('LT',2));
	if (!empty(\$_typeid)) {
		\$_typeid_arr = explode(',',\$_typeid);
		\$ids_arr = array();

		foreach(\$_typeid_arr as \$_typeid_key => \$_typeid_val) {
			\$_typeid_val = intval(\$_typeid_val);
			if (empty(\$_typeid_val)) {
				continue;
			}

			\$_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), \$_typeid_val, true);
			\$ids_arr = array_merge(\$ids_arr,\$_typeid_ids);
		}

		\$ids_arr = array_unique(\$ids_arr);

		if (!empty(\$ids_arr)) {
			\$where['special.cid'] = array('IN',\$ids_arr);
		}

	}

	if ($pointstart > 0 && $pointend > 0) {
		\$where['special.point'] = array('between',array($pointstart,$pointend));
	}else if ($pointstart > 0) {
		\$where['special.point'] = array('EGT', $pointstart);
	}else if ($pointend > 0) {
		\$where['special.point'] = array('ELT', $pointend);
	}

	if (\$_keyword != '') {
		\$where['special.title'] = array('like','%'.\$_keyword.'%');
	}


	if ($flag > 0) {
		\$where['_string'] = 'special.flag & $flag = $flag ';
	}


	//分页
	if ($pagesize > 0) {


		\$count = D('SpecialView')->where(\$where)->count();

		\$ename = I('e', '', 'htmlspecialchars,trim');
		if (!empty(\$ename) && C('URL_ROUTER_ON') == true) {
			\$param['p'] = I('p', 1, 'intval');
			\$param_action = '/'.\$ename;
		}else {
			\$param = array();
			\$param_action = '';
		}

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize, \$param, \$param_action);

		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();

	}else {
		\$limit = "$limit";
	}

	\$_spelist = D('SpecialView')->nofield('$nofield')->where(\$where)->order("$orderby")->limit(\$limit)->select();
	if (empty(\$_spelist)) {
		\$_spelist = array();
	}


	foreach(\$_spelist as \$autoindex => \$spelist):

	if ((\$spelist['flag'] & B_JUMP)  && !empty(\$spelist['jump_url'])) {
        \$spelist['url'] = \$spelist['jump_url'];
    }else {
    	//开启路由
	    if(C('URL_ROUTER_ON') == true) {
	        \$spelist['url'] = U('Special/'.\$spelist['id'],'');
	    }else {
	        \$spelist['url']  = U('Special/shows', array('id'=> \$spelist['id']));

	    }

	    //\$spelist['url'] = get_content_url(\$spelist['id'], \$spelist['cid'], \$spelist['ename'], \$_jumpflag, \$spelist['jump_url']);
    }



	if($titlelen) \$spelist['title'] = str2sub(\$spelist['title'], $titlelen, 0);
	if($infolen) \$spelist['description'] = str2sub(\$spelist['description'], $infolen, 0);

?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//当前栏目名称
	public function _type($attr, $content) {
		$typeid = tag_param_var(isset($attr['typeid']) ? $attr['typeid'] : '0');
		$level  = isset($attr['level']) ? $attr['level'] : 'self'; //self 自己(默认),top 顶级，parent父级

		$str = <<<str
<?php

	\$_typeid = intval($typeid);
	\$_level = "$level";
	\$_category_all = get_category(0);

	if (\$_level == 'parent') {
		\$type = \Common\Lib\Category::getParent(\$_category_all, \$_typeid, 1);
	} else if (\$_level == 'top') {
		\$type = \Common\Lib\Category::getParent(\$_category_all, \$_typeid, 2);
	} else {
		\$type = \Common\Lib\Category::getSelf(\$_category_all, \$_typeid);
	}
	if (!empty(\$type)):
	\$type['url'] = get_url(\$type);
?>
str;
		$str .= $content;
		$str .= '<?php endif;?>';
		return $str;

	}

	//栏目的文档数
	public function _typenum($attr, $content) {
		$typeid = isset($attr['typeid']) ? tag_param_vars_string($attr['typeid']) : 0;
		$str    = <<<str
<?php

	echo get_category_count("$typeid");//param is const
?>
str;

		return $str;

	}

	//导航
	public function _catlist($attr, $content) {
		$typeid   = tag_param_vars_string(isset($attr['typeid']) ? $attr['typeid'] : '-1'); //变量--只接收一个栏目ID
		$type     = empty($attr['type']) ? 'son' : $attr['type']; //son表示下级栏目,self表示同级栏目,top顶级栏目(top忽略typeid)
		$flag     = !isset($attr['flag']) || $attr['flag'] == '' ? 1 : intval($attr['flag']); //0(不显示链接和单页),1(全部显示--默认)
		$hideflag = !isset($attr['hideflag']) || $attr['hideflag'] == '' ? 1 : intval($attr['hideflag']); //0(不显示隐藏的),1(显示隐藏--默认)

		$orderby = empty($attr['orderby']) ? 'id DESC' : $attr['orderby'];
		$limit   = empty($attr['limit']) ? '10' : $attr['limit'];
		$modelid = empty($attr['modelid']) ? 0 : intval($attr['modelid']);
		$str     = <<<str
<?php
	\$_typeid = intval($typeid);
	\$_type = '$type';
	\$_temp = explode(',', "$limit");
	\$_temp[0] = \$_temp[0] > 0? \$_temp[0] : 10;
	if (isset(\$_temp[1]) && intval(\$_temp[1]) > 0) {
		\$_limit[0] = \$_temp[0];
		\$_limit[1] = intval(\$_temp[1]);
	}else {
		\$_limit[0] = 0;
		\$_limit[1] = \$_temp[0];
	}


	if(\$_typeid == -1) \$_typeid = I('cid', 0, 'intval');

	if ($hideflag == 1) {
		\$__catlist = get_category(10);//status 0,1
	} else{
		\$__catlist = get_category(1);//status 1
	}


	if ($modelid) {
		\$__catlist = \Common\Lib\Category::getLevelOfModelId(\$__catlist, $modelid);
	}


	if ($flag == 0) {
		\$__catlist = \Common\Lib\Category::clearPageAndLink(\$__catlist);
	}

	//\$type为top,忽略$typeid
	if(\$_typeid == 0 || \$_type == 'top') {
		\$_catlist  = \Common\Lib\Category::toLayer(\$__catlist);
	}else {
		//同级分类
		if (\$_type == 'self') {
			\$_typeinfo  = \Common\Lib\Category::getSelf(\$__catlist, \$_typeid );
			//if (\$_typeinfo['pid'] != 0) {
				\$_catlist  = \Common\Lib\Category::toLayer(\$__catlist, 'child', \$_typeinfo['pid']);
			//}
		}else {
			//son，子类列表
			\$_catlist  = \Common\Lib\Category::toLayer(\$__catlist, 'child', \$_typeid);
		}
	}

	foreach(\$_catlist as \$autoindex => \$catlist):
	if(\$autoindex < \$_limit[0]) continue;
	if(\$autoindex >= (\$_limit[1]+\$_limit[0])) break;
	\$catlist['url'] = get_url(\$catlist);
?>
str;

		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//导航
	public function _navlist($attr, $content) {
		$typeid = tag_param_vars_string(isset($attr['typeid']) ? $attr['typeid'] : '-1'); //不能用empty,0,'','0',会认为true
		$str    = <<<str
<?php
	\$_typeid = intval($typeid);
	if(\$_typeid == -1) \$_typeid = I('cid', 0, 'intval');
	\$_navlist = get_category(1);

	if(\$_typeid == 0) {
		\$_navlist  = \Common\Lib\Category::toLayer(\$_navlist);
	}else {
		\$_navlist  = \Common\Lib\Category::toLayer(\$_navlist, 'child', \$_typeid);
	}

	foreach(\$_navlist as \$autoindex => \$navlist):
		\$navlist['url'] = get_url(\$navlist);
?>
str;

		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//user list
	public function _userlist($attr, $content) {
		$typeid   = !isset($attr['typeid']) || trim($typeid) == '' ? '0' : tag_param_vars_string($attr['typeid']);
		$titlelen = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen  = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$orderby  = empty($attr['orderby']) ? 'id DESC' : $attr['orderby'];
		$limit    = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize = empty($attr['pagesize']) ? '0' : $attr['pagesize'];

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$str = <<<str
<?php
	\$_typeid = "$typeid";
	if (\$_typeid>0) {
		\$where = array('member.is_lock' => 0, 'member.group_id'=> \$_typeid);
	}else {
		\$where = array('member.is_lock' => 0);
	}

	//分页
	if ($pagesize > 0) {


		\$count = D('MemberView')->where(\$where)->count();

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize);

		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();
	}else {
		\$limit = "$limit";
	}


	\$_userlist = D('MemberView')->nofield('password,encrypt')->where(\$where)->order("$orderby")->limit(\$limit)->select();
	if (empty(\$_userlist)) {
		\$_userlist = array();
	}

	foreach(\$_userlist as \$autoindex => \$userlist):
	//开启路由
	if(C('URL_ROUTER_ON') == true) {
		\$userlist['url'] = U('u/'. \$userlist['id']);
	}else {
		\$userlist['url'] = U('Public/user', array('id'=> \$userlist['id']));
	}


?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//announce list
	public function _announcelist($attr, $content) {
		$titlelen = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen  = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$orderby  = empty($attr['orderby']) ? 'start_time DESC' : $attr['orderby'];
		$limit    = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize = empty($attr['pagesize']) ? '0' : $attr['pagesize'];

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$str = <<<str
<?php

	\$where = array('end_time' => array('gt',date('Y-m-d H:i:s')));


	//分页
	if ($pagesize > 0) {


		\$count = M('announce')->where(\$where)->count();

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize);


		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();
	}else {
		\$limit = "$limit";
	}


	\$_announcelist = M('announce')->where(\$where)->order("$orderby")->limit(\$limit)->select();
	if (empty(\$_announcelist)) {
		\$_announcelist = array();
	}

	foreach(\$_announcelist as \$autoindex => \$announcelist):

	if($titlelen) \$announcelist['title'] = str2sub(\$announcelist['title'], $titlelen, 0);
	if($infolen) \$announcelist['content'] = str2sub(strip_tags(\$announcelist['content']), $infolen, 0);//清除html再截取


?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//tag标签
	public function _taglist($attr, $content) {
		$typeid  = tag_param_var(isset($attr['typeid']) ? $attr['typeid'] : '0'); //只接受一个栏目
		$arcid   = tag_param_var(isset($attr['arcid']) ? $attr['arcid'] : '0');
		$keyword = tag_param_var(isset($attr['keyword']) ? $attr['keyword'] : '');

		$orderby  = empty($attr['orderby']) ? 'sort ASC,id DESC' : $attr['orderby'];
		$limit    = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize = empty($attr['pagesize']) ? '0' : $attr['pagesize'];

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$str = <<<str
<?php
	\$_typeid = intval($typeid);
	\$_arcid = intval($arcid);
	\$_keyword = $keyword;

	\$where = array();
	if (!empty(\$_typeid)) {
		\$where['ti.cid'] = \$_typeid;
	}

	if (!empty(\$_typeid) && !empty(\$_arcid)) {
		\$where['ti.arc_id'] = \$_arcid;
	}

	if (\$_keyword != '') {
		\$where['t.tag_name'] = array('like','%'.\$_keyword.'%');
	}




	//分页
	if ($pagesize > 0) {


		\$count = M('Tag')->alias('t')->field('t.tag_name,t.id,t.num,t.hit')->join('INNER JOIN __TAG_INDEX__ ti ON ti.tag_id = t.id')->where(\$where)->count('DISTINCT t.tag_name');

		\$ename = I('e', '', 'htmlspecialchars,trim');
		if (!empty(\$ename) && C('URL_ROUTER_ON') == true) {
			\$param['p'] = I('p', 1, 'intval');
			\$param_action = '/'.\$ename;
		}else {
			\$param = array();
			\$param_action = '';
		}

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize, \$param, \$param_action);

		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();

	}else {
		\$limit = "$limit";
	}

	\$_taglist = M('Tag')->alias('t')->distinct(true)->field('t.tag_name,t.id,t.num,t.hit')->join('INNER JOIN __TAG_INDEX__ ti ON ti.tag_id = t.id')->where(\$where)->order("$orderby")->limit(\$limit)->select();
	if (empty(\$_taglist)) {
		\$_taglist = array();
	}



	foreach(\$_taglist as \$autoindex => \$taglist):


    	//开启路由
	    if(C('URL_ROUTER_ON') == true) {
	        \$taglist['url'] = U('Tag/'.\$taglist['tag_name'],'');
	    }else {
	        \$taglist['url']  = U('Tag/shows', array('tname'=> \$taglist['tag_name']));
	    }




?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//friend Link list
	public function _flink($attr, $content) {
		$type     = tag_param_vars_string(isset($attr['type']) ? $attr['type'] : '-1');
		$titlelen = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen  = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$orderby  = empty($attr['orderby']) ? 'sort ASC' : $attr['orderby'];
		$limit    = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize = empty($attr['pagesize']) ? '0' : $attr['pagesize'];

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$str = <<<str
<?php
	\$_type = intval($type);
	if (\$_type == 0) {
		\$where = array('is_check'=> 0);
	}else if (\$_type == 1) {
		\$where = array('is_check'=> 1);
	} else {
		\$where = array('id' => array('gt',0));
	}

	//分页
	if ($pagesize > 0) {


		\$count = M('link')->where(\$where)->count();

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize);


		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();
	}else {
		\$limit = "$limit";
	}


	\$_flink = M('link')->where(\$where)->order("$orderby")->limit(\$limit)->select();
	if (empty(\$_flink)) {
		\$_flink = array();
	}

	foreach(\$_flink as \$autoindex => \$flink):



?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//guestbook list
	public function _gbooklist($attr, $content) {
		$titlelen = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen  = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$orderby  = empty($attr['orderby']) ? 'id DESC' : $attr['orderby'];
		$showflag = empty($attr['showflag']) ? 0 : intval($attr['showflag']);
		$limit    = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize = empty($attr['pagesize']) ? '0' : $attr['pagesize'];

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$str = <<<str
<?php
	\$where = array();
	//是否全部显示
	if ($showflag != 1) {
		\$where['status'] = 1;//已审核
	}


	//分页
	if ($pagesize > 0) {


		\$count = M('guestbook')->where(\$where)->count();

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize);


		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();
	}else {
		\$limit = "$limit";
	}


	\$_gbooklist = M('guestbook')->where(\$where)->order("$orderby")->limit(\$limit)->select();
	if (empty(\$_gbooklist)) {
		\$_gbooklist = array();
	}

	foreach(\$_gbooklist as \$autoindex => \$gbooklist):



?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//Review list
	public function _reviewlist($attr, $content) {
		$modelid = tag_param_var(isset($attr['modelid']) ? $attr['modelid'] : '0');
		$arcid   = tag_param_var(isset($attr['arcid']) ? $attr['arcid'] : '0');
		$userid  = tag_param_var(isset($attr['userid']) ? $attr['userid'] : '0');

		$orderby  = empty($attr['orderby']) ? 'id DESC' : $attr['orderby'];
		$limit    = empty($attr['limit']) ? '10' : $attr['limit'];
		$showflag = empty($attr['showflag']) ? 0 : intval($attr['showflag']);

		$pagesize  = empty($attr['pagesize']) ? '0' : $attr['pagesize'];
		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$str = <<<str
<?php
	\$_modelid = intval($modelid);
	\$_arcid = intval($arcid);
	\$_userid = intval($userid);

	\$where = array();
	if ($showflag != 1) {
		\$where['status'] = 1;//已审核
	}


	if (\$_modelid > 0) {
		\$where['model_id'] = \$_modelid;
	}
	if (\$_arcid > 0) {
		\$where['post_id'] = \$_arcid ;
	}

	if (\$_userid > 0) {
		\$where['user_id'] = \$_userid ;
	}


	//树形风格，多维数组
	if ($type == 1) {
		\$where['pid'] = 0;
	}




	//分页
	if ($pagesize > 0) {


		\$count = D('CommentView')->where(\$where)->count();

		\$thisPage = new \Common\Lib\Page(\$count, $pagesize);


		//设置显示的页数
		\$thisPage->rollPage = $pageroll;
		\$thisPage->setConfig('theme',"$pagetheme");
		\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
		\$page = \$thisPage->show();
	}else {
		\$limit = "$limit";
	}

	\$_reviewlist = D('CommentView')->where(\$where)->order("$orderby")->limit(\$limit)->select();
	if (!\$_reviewlist) {
		\$_reviewlist = array();
	}

	//$type ,pid >0
	if ($type == 1 && !empty(\$_reviewlist)) {
		\$pid_array = array();
		foreach (\$_reviewlist as \$k => \$v) {
			\$pid_array[] = \$v['id'];
			\$_reviewlist[\$k]['child'] = array();//后面就不用初始化
		}
		\$where = array('pid' => array('IN', \$pid_array));
		\$_review_child = D('CommentView')->where(\$where)->select();
		if (\$_review_child) {
			foreach (\$_reviewlist as \$k => \$v) {

				foreach (\$_review_child as \$k2 => \$v2) {
					if (\$v['id'] == \$v2['pid']) {
						\$_reviewlist[\$k]['child'][] = \$v2;
						unset(\$_review_child[\$k2]); //删除已经认领元素,减少内循环
					}
				}
			}
		}



	}

	foreach(\$_reviewlist as \$autoindex => \$reviewlist):



?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//abc[ad]
	public function _abc($attr, $content) {
		$id    = tag_param_var(isset($attr['id']) ? $attr['id'] : '0');
		$limit = empty($attr['limit']) ? '0' : $attr['limit'];

		$str = <<<str
<?php
	\$_id = intval($id);

	\$where = array('aid'=> \$_id, 'status' => 1);
	\$limit = "$limit";

	\$abc_cate = M('abc')->find(\$_id);
	if (\$abc_cate) {
		\$limit = empty(\$limit) ? \$abc_cate['num'] : \$limit;
		\$where['start_time'] = array('lt', date('Y-m-d H:i:s'));
		\$where['end_time'] = array('gt', date('Y-m-d H:i:s'));
		\$_abc = M('abcDetail')->where(\$where)->order('sort')->limit(\$limit)->select();
	}else {
		\$_abc = array();
	}




	if (empty(\$_abc)) {
		\$_abc = array();
	}

	foreach(\$_abc as \$autoindex => \$abc):
		\$abc['width'] = \$abc_cate['width'];
		\$abc['height'] = \$abc_cate['height'];



?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//ad[ad]
	public function _ad($attr, $content) {
		$id   = tag_param_var(isset($attr['id']) ? $attr['id'] : '0');
		$flag = empty($attr['flag']) ? '0' : $attr['flag'];

		$str = <<<str
<?php
	\$_id = intval($id);

	if (!empty(\$_id)) {

		//js输出
		if ($flag) {
			echo '<script type="text/javascript" src="'.U('Abc/shows', array('id' => \$_id, 'flag' => $flag)).'"></script>';
		}else {
			echo get_abc(\$_id, $flag);
		}

	}


?>
str;
		return $str;

	}

	//iteminfo List
	public function _iteminfo($attr, $content) {
		$name     = tag_param_var(isset($attr['name']) ? $attr['name'] : '');
		$titlelen = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$limit    = empty($attr['limit']) ? '10' : $attr['limit'];

		$str = <<<str
<?php
	\$_item_name = $name;
	if (\$_item_name == '') {
		\$_iteminfo= array();
	}else {
		\$_iteminfo = get_item(\$_item_name);
	}



	foreach(\$_iteminfo as \$autoindex => \$iteminfo):
	if($titlelen>0) \$iteminfo = str2sub(\$iteminfo, $titlelen);

?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	public function _freeblock($attr, $content) {
		$name     = tag_param_var(isset($attr['name']) ? $attr['name'] : '');
		$infolen  = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$textflag = empty($attr['textflag']) ? 0 : 1;

		$name = trim(htmlspecialchars($name));
		$str  = <<<str
<?php

	\$block = get_block($name);
	\$block_content = '';
	if (\$block) {
		if (\$block['block_type'] == 2) {
			if (!$textflag) {
				\$block_content = '<img src="'. \$block['content'] .'" />';
			}else {
				\$block_content = \$block['content'];
			}

		}else {
			if($infolen) {
				\$block_content = str2sub(strip_tags(\$block['content']), $infolen, 0);//清除html再截取
			}else {
				\$block_content = \$block['content'];
			}
		}
	}
	echo \$block_content;


?>
str;

		return $str;
	}

	//for blog
	public function _datelist($attr, $content) {
		$modelid = tag_param_var(!empty($attr['modelid']) ? $attr['modelid'] : '1');
		$limit   = empty($attr['limit']) ? '10' : $attr['limit'];

		$str = <<<str
<?php
	\$_modelid = intval($modelid);
	\$_datelist = get_datelist(\$_modelid);
	\$_temp = explode(',', "$limit");
	\$_temp[0] = \$_temp[0] > 0? \$_temp[0] : 10;
	if (isset(\$_temp[1]) && intval(\$_temp[1]) > 0) {
		\$_limit[0] = \$_temp[0];
		\$_limit[1] = intval(\$_temp[1]);
	}else {
		\$_limit[0] = 0;
		\$_limit[1] = \$_temp[0];
	}


	foreach(\$_datelist as \$autoindex => \$datelist):
	if(\$autoindex < \$_limit[0]) continue;
	if(\$autoindex >= (\$_limit[1]+\$_limit[0])) break;
	\$datelist['url'] = U('Archive/index', array('model_id' => \$_modelid, 'year' => \$datelist['arc_year'],'month' => \$datelist['arc_month']));
?>
str;

		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//archive for blog
	public function _archivelist($attr, $content) {
		$modelid = tag_param_var(!empty($attr['modelid']) ? $attr['modelid'] : '1'); //1 == artlist
		$year    = tag_param_var(isset($attr['year']) ? $attr['year'] : '0');
		$month   = tag_param_var(isset($attr['month']) ? $attr['month'] : '0');

		$titlelen = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$infolen  = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$orderby  = empty($attr['orderby']) ? 'publish_time DESC' : $attr['orderby'];
		$limit    = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize = empty($attr['pagesize']) ? '0' : $attr['pagesize'];

		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']);

		$str = <<<str
<?php
	\$_modelid	= intval($modelid);
	\$_year		= intval($year);
	\$_month	= intval($month);

	\$_table_name = M('model')->where(array('id' => \$_modelid))->getField('table_name');


	if (!empty(\$_table_name) && \$_table_name != 'page') {

		\$where = array(\$_table_name.'.delete_status' => 0);
		if ($year > 0 && \$_month > 0) {
			\$_firstday = "\$_year-\$_month-1 00:00:00";
			\$_lastday = date('Y-m-d 23:59:59', strtotime("\$_firstday +1 month -1 day"));
			\$where['publish_time'] = array('between',array(\$_firstday,\$_lastday));

		}
		//分页
		if ($pagesize > 0) {


			\$count = D2('ArcView',"\$_table_name")->where(\$where)->count();
			\$thisPage = new \Common\Lib\Page(\$count, $pagesize);
			\$ename = I('e', '', 'htmlspecialchars,trim');

			//设置显示的页数
			\$thisPage->rollPage = $pageroll;
			\$thisPage->setConfig('theme',"$pagetheme");
			\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
			\$page = \$thisPage->show();

		}else {
			\$limit = "$limit";
		}

		\$_archivelist = D2('ArcView',"\$_table_name")->where(\$where)->order("$orderby")->limit(\$limit)->select();
		if (empty(\$_archivelist)) {
			\$_archivelist = array();
		}
	}else {
		\$_archivelist = array();
	}
	\$archivelist_time = array();
	foreach(\$_archivelist as \$autoindex => \$archivelist):

	\$_jumpflag = (\$archivelist['flag'] & B_JUMP) == B_JUMP? true : false;
	\$archivelist['url'] = get_content_url(\$archivelist['id'], \$archivelist['cid'], \$archivelist['ename'], \$_jumpflag, \$archivelist['jump_url']);
	if($titlelen) \$archivelist['title'] = str2sub(\$archivelist['title'], $titlelen, 0);
	if($infolen) \$archivelist['description'] = str2sub(\$archivelist['description'], $infolen, 0);
	\$_tmp_year = date('Y', strtotime(\$archivelist['publish_time']));
	\$_tmp_month = date('m', strtotime(\$archivelist['publish_time']));

	if (isset(\$archivelist_time['year']) && \$_tmp_year == \$archivelist_time['year'] && \$_tmp_month == \$archivelist_time['month']) {
		\$archivelist_time['flag'] = 0;
	}else{

		\$archivelist_time = array('year' => \$_tmp_year,
								'month' => \$_tmp_month,
								'flag' => 1);
	}
?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//通用数据表查询
	public function _datatable($attr, $content) {
		////非debug参属性参数只处理 一次
		$table     = empty($attr['table']) ? 'article' : $attr['table'];
		$field     = empty($attr['field']) ? '' : $attr['field'];
		$joinwhere = empty($attr['joinwhere']) ? '' : $attr['joinwhere']; //where:LEFT
		$where     = empty($attr['where']) ? '' : $attr['where'];
		$orderby   = empty($attr['orderby']) ? '' : $attr['orderby'];
		$limit     = empty($attr['limit']) ? '10' : $attr['limit'];
		$pagesize  = empty($attr['pagesize']) ? '0' : $attr['pagesize'];

		$table     = string2filter($table, '|');
		$pageroll  = empty($attr['pageroll']) ? '5' : $attr['pageroll'];
		$pagetheme = empty($attr['pagetheme']) ? ' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' : htmlspecialchars_decode($attr['pagetheme']); //新增加20140513

		$str = <<<str
<?php
	\$_table = explode('|', "$table");
	\$_field = explode('|', "$field");
	\$_joinwhere = array_filter(explode('|', "$joinwhere"));//表个数-1//清除空数组
	sort(\$_joinwhere); //sort()重建索引
	\$_jointype = 'INNER';//连接方式[INNER|LEFT|RIGHT]，默认是INNER
	\$where = "$where";

	if (empty(\$where)) {
		\$where = ' 1 = 1';
	}


	\$_field_array = array();
	foreach (\$_table as \$k => \$v) {
		if (strtolower(\$v) == 'admin') {
			\$_table = array();
			break;//不允许查询admin
		}
		\$_field_temp = empty(\$_field[\$k])? array('*') : explode(',', \$_field[\$k]);
		foreach (\$_field_temp as \$k2 => \$v2) {
			\$v2 = trim(\$v2);
			//strpos是否包含count(),sum()等函数，标志为:(
			\$_field_temp[\$k2] = strpos(\$v2, '(')? \$v2 : \$v. '.'. \$v2;
		}
		\$_field_array = array_merge(\$_field_array, \$_field_temp);

		\$_table[\$k] = C('DB_PREFIX').\$v.' '.\$v;
	}

	if (!empty(\$_table)) {

		\$_field_str = implode(',', \$_field_array);
		if (!empty(\$_joinwhere)) {
			foreach (\$_joinwhere as \$k => \$v) {
				\$_temp = explode(':', \$v);
				if (isset(\$_temp[1]) && in_array(strtoupper(\$_temp[1]), array('INNER','LEFT','RIGHT'))) {
					\$_jointype = strtoupper(\$_temp[1]);
				}
				\$_jointype .= ' JOIN';
				\$_joinwhere[\$k] = \$_jointype.' '.\$_table[\$k+1].' ON '.\$_temp[0];
			}
		}



		//分页
		if ($pagesize > 0) {


			if (count(\$_table) == 1) {
				\$count = M()->table(\$_table[0])->where(\$where)->count();
			}else {
				\$count = M()->table(\$_table[0])->join(\$_joinwhere)->where(\$where)->count();
			}
			\$thisPage = new \Common\Lib\Page(\$count, $pagesize);


			//设置显示的页数

			\$thisPage->rollPage = $pageroll;
			\$thisPage->setConfig('theme',"$pagetheme");
			\$limit = \$thisPage->firstRow. ',' .\$thisPage->listRows;
			\$page = \$thisPage->show();
		}else {
			\$limit = "$limit";
		}

		if (count(\$_table) == 1) {
			\$_datatable = M()->table(\$_table[0])->field(\$_field_str)->where(\$where)->order("$orderby")->limit(\$limit)->select();
		}else {
			\$_datatable = M()->table(\$_table[0])->field(\$_field_str)->join(\$_joinwhere)->
			where(\$where)->order("$orderby")->limit(\$limit)->select();
		}

	}

	if (empty(\$_datatable)) {
		\$_datatable = array();
	}


	foreach(\$_datatable as \$autoindex => \$datatable):

?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;

	}

	//调用栏目或内容的指定字段
	public function _field($attr, $content) {
		$typeid = tag_param_var(isset($attr['typeid']) ? $attr['typeid'] : '0'); //只接收一个栏目ID
		$arcid  = tag_param_var(isset($attr['arcid']) ? $attr['arcid'] : '0');
		$name   = tag_param_var(isset($attr['name']) ? $attr['name'] : '');

		$infolen   = empty($attr['infolen']) ? 0 : intval($attr['infolen']);
		$imgindex  = empty($attr['imgindex']) ? 0 : intval($attr['imgindex']);
		$imgwidth  = empty($attr['imgwidth']) ? 0 : intval($attr['imgwidth']);
		$imgheight = empty($attr['imgheight']) ? 0 : intval($attr['imgheight']);

		$str = <<<str
<?php
	\$_typeid = intval($typeid);
	\$_arcid = intval($arcid);
	\$_fieldname = $name;
	\$_tempstr = '';
	if (\$_typeid>0 && !empty(\$_fieldname)) {

		\$_selfcate = \Common\Lib\Category::getSelf(get_category(10), \$_typeid);
		\$_table_name = strtolower(\$_selfcate['table_name']);

		if (\$_table_name == 'page' || \$_arcid == 0) {
			\$_tempstr = M('category')->where(array('id' => \$_typeid))->getField(\$_fieldname);
		}elseif (!empty(\$_selfcate )) {
			\$_tempstr = M(\$_table_name)->where(array('id' => \$_arcid))->getField(\$_fieldname);
			if (\$_fieldname == 'picture_urls' || \$_fieldname == 'litpic') {
				if (empty(\$_tempstr)) {
					\$_tempstr = get_picture('', $imgwidth, $imgheight);
				}elseif (\$_fieldname == 'litpic') {
					\$_tempstr = get_picture(\$_tempstr, $imgwidth, $imgheight);
				}elseif (\$_fieldname == 'picture_urls') {
						\$_picture_urls_arr = explode('|||', \$_tempstr);
						\$_picture_urls  = array();
						foreach (\$_picture_urls_arr as \$v) {
							\$temp_arr = explode('$$$', \$v);
							if (!empty(\$temp_arr[0])) {
								\$_picture_urls[] = array(
									'url' => \$temp_arr[0],
									'alt' => \$temp_arr[1]
								);
							}
						}
					if(!isset(\$_picture_urls[$imgindex]['url'])) \$_picture_urls[$imgindex]['url'] = '';
					\$_tempstr = get_picture(\$_picture_urls[$imgindex]['url'],$imgwidth, $imgheight);
				}
			}

		}
		if ($infolen >0 && !empty(\$_tempstr)) {
			\$_tempstr = str2sub(strip_tags(\$_tempstr), $infolen, 0);//清除html再截取
		}

	}

	echo \$_tempstr;

?>
str;

		return $str;

	}

	/**/
	public function _position($attr, $content) {
		//非debug参数只处理 一次
		$typeid    = tag_param_vars_string(isset($attr['typeid']) ? $attr['typeid'] : '-1'); //-1后面自动获取//只接收一个栏目ID
		$sname     = tag_param_var(isset($attr['sname']) ? $attr['sname'] : '');
		$surl      = tag_param_var(isset($attr['surl']) ? $attr['surl'] : '');
		$hname     = tag_param_var(isset($attr['hname']) ? $attr['hname'] : ''); //首页名称
		$ismobile  = empty($attr['ismobile']) ? 0 : 1;
		$delimiter = isset($attr['delimiter']) ? trim($attr['delimiter']) : '';

		$str = <<<str
<?php
		\$_sname = $sname;
		\$_surl = $surl;
		\$_hname = $hname;
		\$_typeid = intval($typeid);
		if(\$_typeid == -1) \$_typeid = I('cid', 0, 'intval');

		if (\$_typeid == 0 &&  \$_sname == '') {
			\$_sname = isset(\$title) ? \$title : '';
		}
		echo get_position(\$_typeid, \$_sname, \$_surl, $ismobile, "$delimiter",\$_hname);

?>
str;

		return $str;
	}

	/*config */
	public function _cfg($attr, $content) {
		$name = isset($attr['name']) ? trim($attr['name']) : '';
		if (empty($name)) {
			return '';
		}
		$name = strtoupper($name);
		return get_cfg_value($name);

	}

	public function _prev($attr, $content) {
		$titlelen = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$notitle  = isset($attr['notitle']) ? trim($attr['notitle']) : '第一篇';
		$target   = isset($attr['target']) ? trim($attr['target']) : '';
		$target   = empty($target) ? '' : ' target="' . $target . '"';
		$str      = <<<str
<?php

	if(empty(\$content['id']) || empty(\$content['cid']) || empty(\$cate['table_name']) ) {
		echo 'Parameter error';
	} else {
		//上一条记录
        \$_vo= D2('ArcView', \$cate['table_name'])->where(array(\$cate['table_name'].'.delete_status' => 0, 'cid' => \$content['cid'], 'id' => array('lt',\$content['id'])))->order('id desc')->find();

        if (\$_vo) {

			\$_jumpflag = (\$_vo['flag'] & B_JUMP) == B_JUMP? true : false;
        	\$_vo['url'] = get_content_url(\$_vo['id'], \$_vo['cid'], \$_vo['ename'], \$_jumpflag, \$_vo['jump_url']);
			if($titlelen) \$_vo['title'] = str2sub(\$_vo['title'], $titlelen, 0);
			echo '<a href="'. \$_vo['url'] .'"$target>'. \$_vo['title'] .'</a>';
        } else {
        	echo "$notitle";
        }
	}

?>
str;

		return $str;
	}

	public function _next($attr, $content) {
		$titlelen = empty($attr['titlelen']) ? 0 : intval($attr['titlelen']);
		$notitle  = isset($attr['notitle']) ? trim($attr['notitle']) : '最后一篇';
		$target   = isset($attr['target']) ? trim($attr['target']) : '';
		$target   = empty($target) ? '' : ' target="' . $target . '"';
		$str      = <<<str
<?php
	if(empty(\$content['id']) || empty(\$content['cid']) || empty(\$cate['table_name']) ) {
		echo 'Parameter error';
	} else {
		//下一条记录
        \$_vo= D2('ArcView',\$cate['table_name'])->where(array(\$cate['table_name'].'.delete_status' => 0, 'cid' => \$content['cid'], 'id' => array('gt',\$content['id'])))->order('id ASC')->find();

        if (\$_vo) {

			\$_jumpflag = (\$_vo['flag'] & B_JUMP) == B_JUMP? true : false;
        	\$_vo['url'] = get_content_url(\$_vo['id'], \$_vo['cid'], \$_vo['ename'], \$_jumpflag, \$_vo['jump_url']);
			if($titlelen) \$_vo['title'] = str2sub(\$_vo['title'], $titlelen, 0);
			echo '<a href="'. \$_vo['url'] .'"$target>'. \$_vo['title'] .'</a>';
        } else {
        	echo "$notitle";
        }
	}

?>
str;

		return $str;
	}

	//针对内容页
	public function _click($attr, $content) {

		$str = <<<str
<?php

	if (!empty(\$id) && !empty(\$table_name)) {


		//开启静态缓存
		if (C('HTML_CACHE_ON') == true) {
			echo '<script type="text/javascript" src="'.U('Public/click', array('id' => \$id, 'tn' => \$table_name)).'"></script>';
		}
		else {
			echo get_click(\$id, \$table_name);
		}


	}

?>
str;
		return $str;
	}

	//Online[QQ]
	public function _online($attr, $content) {
		$mode = get_cfg_value('ONLINE_CFG_MODE');

		if ($mode != 1) {
			return '';
		}

		$str = <<<str
<?php
	echo '<script type="text/javascript" src="'.U(MODULE_NAME. '/Public/online').'"></script>';
?>

str;
		return $str;
	}

	public function _sitename($attr, $content) {
		return C('CFG_WEBNAME');
	}

	public function _sitetitle($attr, $content) {
		return C('CFG_WEBTITLE');
	}

	public function _siteurl($attr, $content) {
		return C('CFG_WEBURL');
	}

	public function _sitekeywords($attr, $content) {
		return C('CFG_KEYWORDS');
	}

	public function _sitedescription($attr, $content) {
		return C('CFG_DESCRIPTION');
	}

	public function _beian($attr, $content) {
		return C('CFG_BEIAN');
	}
	public function _address($attr, $content) {
		return C('CFG_ADDRESS');
	}

	public function _phone($attr, $content) {
		return C('CFG_PHONE');
	}
	public function _copyright($attr, $content) {
		return C('CFG_POWERBY');
	}
	public function _stats($attr, $content) {
		return C('CFG_STATS');
	}

	public function _searchurl($attr, $content) {
		return U('Search/index');
	}

	public function _gbookurl($attr, $content) {
		return U('Guestbook/index');
	}

	public function _gbookaddurl($attr, $content) {
		return U('Guestbook/add');
	}
	public function _vcodeurl($attr, $content) {

		//return U(MODULE_NAME.'/Public/verify', '');//解决IIS伪，问题
		return U('Public/verify', '');
	}

	public function _mobileauto($attr, $content) {
		$flag = empty($attr['flag']) ? 0 : intval($attr['flag']);

		$str = <<<str
<?php
		\$_flag = $flag;
		switch (\$_flag) {
			case 0:
				if (C('CFG_MOBILE_AUTO') == 1) {
					//开启静态缓存
					if (C('HTML_CACHE_ON') == true) {
						echo '<script type="text/javascript" src="__DATA__/static/js/mobile_auto.js"></script>';
					}
					else {
						go_mobile();
					}
				}
				break;
			case 1:
				go_mobile();
				break;
			case 2:
				if (C('CFG_MOBILE_AUTO') == 1) {
					echo '<script type="text/javascript" src="__DATA__/static/js/mobile_auto.js"></script>';
				}
				break;

			default:
				break;
		}


?>
str;

		return $str;
	}

}
