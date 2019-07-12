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
 * @Last Modified time: 2017-11-11 13:47:39
 */

namespace Manage\Controller;

use Common\Lib\Category;

class ClearHtmlController extends CommonController {

	public function index() {
		$home_html_on   = get_cfg_value('HOME_HTML_CACHE_ON');
		$mobile_html_on = get_cfg_value('MOBILE_HTML_CACHE_ON');
		$html_cache_on  = false;
		if ($home_html_on || $mobile_html_on) {
			$html_cache_on = true;
		}

		$this->assign('type', '更新静态缓存');
		$this->assign('html_cache_on', $html_cache_on);
		$this->display();
	}

	//一键更新静态缓存html
	public function all() {

		if (IS_POST) {
			$ret = del_cache_html('', true);
			if (!$ret) {
				$info = '更新完成！部分更新失败，请重试！';
				$this->error($info);
			} else {
				$info = '更新完成！';
				$this->success($info, U('ClearHtml/all'));
			}

			exit();
		}

		$this->assign('type', '一键更新|静态缓存');
		$this->display();
	}

	//更新首页静态缓存html
	public function home() {

		if (IS_POST) {
			$ret = del_cache_html('Index_index', false, 'index:index');
			if (!$ret) {
				$info = '更新完成！部分更新失败，请重试！';
				$this->error($info);
			} else {
				$info = '更新完成！';
				$this->success($info, U('ClearHtml/home'));
			}
			exit();
		}

		$this->assign('type', '更新首页|静态缓存');
		$this->display('all');
	}

	//更新栏目静态缓存html
	public function lists() {

		if (IS_POST) {
			$isall = I('get.isall', 0, 'intval');
			$ret   = true;
			if ($isall) {
				$ret = del_cache_html('List', true, '');
			} else {
				$idArr = I('key', array(), '');
				$cate  = M('category')->where(array('id' => array('IN', $idArr), 'type' => 0))->field(array('id', 'ename'))->select();
				foreach ($cate as $v) {
					//更新静态缓存
					$ret = $ret && del_cache_html('List/index_' . $v['id'] . '_', false, 'list:index');
					$ret = $ret && del_cache_html('List/index_' . $v['ename'], false, 'list:index'); //还有只有名称
				}

			}

			if (!$ret) {
				$info = '更新完成！部分更新失败，请重试！';
				$this->error($info);
			} else {
				$info = '更新完成！';
				$this->success($info, U('ClearHtml/lists'));
			}

			exit();
		}

		//$cate = get_category();
		$cate = D('CategoryView')->nofield('content')->where(array('category.type' => 0))->order('category.sort,category.id')->select();
		$cate = Category::toLevel($cate, '&nbsp;&nbsp;&nbsp;&nbsp;', 0);

		$this->assign('cate', $cate);
		$this->assign('type', '更新栏目|静态缓存');
		$this->display('all');
	}

	//更新内容页静态缓存html
	public function shows() {

		if (IS_POST) {
			$isall = I('get.isall', 0, 'intval');
			$ret   = true;
			if ($isall) {
				$ret = del_cache_html('Show', true, '');
			} else {
				$idArr = I('key', array(), '');
				$cate  = D('CategoryView')->where(array('category.id' => array('IN', $idArr), 'type' => 0))->field(array('id', 'ename', 'table_name'))->select();
				foreach ($cate as $v) {
					//更新静态缓存
					$ret = $ret && del_cache_html('Show/index_' . $v['id'] . '_', false, 'show:index');
					$ret = $ret && del_cache_html('Show/index_' . $v['ename'], false, 'show:index'); //还有只有名称
				}

			}

			if (!$ret) {
				$info = '更新完成！部分更新失败，请重试！';
				$this->error($info);
			} else {
				$info = '更新完成！';
				$this->success($info, U('ClearHtml/shows'));
			}

			exit();
		}

		//$cate = get_category();
		$cate = D('CategoryView')->where(array('category.type' => 0))->order('category.sort,category.id')->select();
		$cate = Category::toLevel($cate, '&nbsp;&nbsp;&nbsp;&nbsp;', 0);

		$this->assign('cate', $cate);
		$this->assign('type', '更新内容页(文档)|静态缓存');
		$this->display('all');
	}

	//更新专题静态缓存html
	public function special() {

		if (IS_POST) {
			$isall = I('get.isall', 0, 'intval');
			if ($isall) {
				$ret = del_cache_html('Special', true, '');
			} else {
				$ret = del_cache_html('Special/index', false, 'special:index');
			}
			if (!$ret) {
				$info = '更新完成！部分更新失败，请重试！';
				$this->error($info);
			} else {
				$info = '更新完成！';
				$this->success($info, U('ClearHtml/special'));
			}

			exit();
		}

		$this->assign('type', '更新专题|静态缓存');
		$this->display('all');
	}

}
