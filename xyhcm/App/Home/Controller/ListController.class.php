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
 * @Last Modified time: 2018-01-29 09:58:32
 */
namespace Home\Controller;

use Common\Lib\Category;

class ListController extends HomeCommonController {

	public function index() {

		$cid   = I('cid', 0, 'intval');
		$ename = I('e', '', 'htmlspecialchars,trim');

		$cate = get_category(10); //显示全部--包含隐藏

		if (!empty($ename)) { //ename不为空
			$self = Category::getSelfByEName($cate, $ename); //当前栏目信息
		} else {
			//$cid来判断

			$self = Category::getSelf($cate, $cid); //当前栏目信息
		}

		if (empty($self) || $self['type'] == 1) {
			// || $self['status'] == 4
			//栏目不存在||外链||4禁止访问;
			R('Home/Empty/_empty'); //404
			return;
		}

		$cid         = $self['id']; //当使用ename获取的时候，就要重新给$cid赋值，不然0
		$_GET['cid'] = $cid; //栏目ID
		$self['url'] = get_url($self);

		//访问权限
		$group_id = intval(get_cookie('group_id'));
		$group_id = (empty($group_id) || empty($this->uid)) ? 1 : $group_id; //1为游客
		//判断访问权限
		$access = M('categoryAccess')->where(array('cat_id' => $cid, 'flag' => 0, 'action' => 'visit'))->getField('role_id', true);
		//权限存在，则判断
		if (!empty($access) && !in_array($group_id, $access)) {
			$this->error('您没有访问该信息的权限！');
		}

		$this->assign('cate', $self);
		$this->assign('flag_son', Category::hasChild($cate, $cid)); //是否包含子类
		$this->assign('title', empty($self['seo_title']) ? $self['name'] : $self['seo_title']);
		$this->assign('keywords', $self['keywords']);
		$this->assign('description', $self['description']);
		$this->assign('cid', $cid);

		// $patterns = array('/^List_/', '/'.C('TMPL_TEMPLATE_SUFFIX').'$/');
		$patterns      = array('/' . C('TMPL_TEMPLATE_SUFFIX') . '$/');
		$replacements  = array('');
		$template_list = preg_replace($patterns, $replacements, $self['template_list']);

		if (empty($template_list)) {
			$this->error('模板不存在');
		}

		switch ($self['table_name']) {
		case 'page':
			{
				$cate            = M('Category')->Field('content')->find($cid);
				$self['content'] = $cate['content'];
				$this->assign('cate', $self);
				$this->display($template_list);
			}
			return;
			break;
		case 'otherModuleName':
			//$this->error('参数错误');
			$userOther = A(ucfirst($self['table_name']));
			$userOther->lists();
			return;
			break;
		default:
			$this->display($template_list);
			return;
			break;
		}

		$this->display();

	}

	public function map() {

		$this->assign('title', '网站地图');
		$this->assign('keywords', '网站地图');
		$this->assign('description', '网站地图');
		$this->display();
	}

}
